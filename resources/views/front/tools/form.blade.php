<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .phone {
        animation: pulse 1s infinite
    }

    @keyframes pulse {
        0% {
            transform: rotate(0);
        }

        10% {
            transform: rotate(10deg);
        }

        20% {
            transform: rotate(-10deg);
        }

        30% {
            transform: rotate(10deg);
            transform: scale(1.2);
        }

        40% {
            transform: rotate(-10deg);
        }

        100% {
            transform: rotate(0);
        }
    }


    .pulsating-circle::before {
        content: "";
        position: absolute;
        display: block;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background-color: rgb(0, 153, 255);
        animation: pulse-ring 1s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        z-index: -1;
    }

    @keyframes pulse-ring {
        0% {
            transform: scale(.33);
        }

        80%,
        100% {
            opacity: 0;
        }
    }

    .error {
        background: #ffdada;
        color: red;
        padding: 4px 8px;
        margin: 4px 0;
        border-radius: 6px;
        font-size: 12px;
    }

    .success {
        background: #6dff71;
        color: rgb(22 78 34);
        padding: 4px 8px;
        margin: 4px 0;
        border-radius: 6px;
        font-size: 14px;
        text-align: justify;
        line-height: 1.7;
    }
</style>

<div style="display: none; justify-content: center;align-items: center;height: 100vh; width: 100%;position: absolute; z-index: 999;background: #ccc; opacity: .8;"
    id="form-popup">
    <div
        style="width: 30%; height: auto;background: white;box-shadow: 0px 0px 10px 6px #bfbfbf; border-radius: 6px; opacity: 1;">
        <div style="display: flex; justify-content: end; padding: 10px 0;width: 100%;">
            <svg style="cursor: pointer" onclick="document.getElementById("form-popup").style.display="none"" width="20px"
                height="20px" viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="11" x2="11" y2="1" stroke="black" stroke-width="2" />
                <line x1="1" y1="1" x2="11" y2="11" stroke="black" stroke-width="2" />
            </svg>
        </div>

        <div
            style="padding: 10px 20px;display: flex;align-items: center;justify-content: center;flex-direction: column">
            <input
                style="width: 100%; border: none; background: #eee; padding: 10px; border-radius: 6px; outline: none; margin-bottom: 8px;"
                type="text" placeholder="Name" id="name">
            <input
                style="width: 100%; border: none; background: #eee; padding: 10px; border-radius: 6px; outline: none; margin-bottom: 8px;"
                type="email" placeholder="Email" id="email">
            <input
                style="width: 100%; border: none; background: #eee; padding: 10px; border-radius: 6px; outline: none; margin-bottom: 8px;"
                type="tel" placeholder="Phone" id="phone">
            <button id="register-btn" type="button"
                style="margin:10px 0;cursor: pointer; border: none;border-radius: 10px;padding: 10px 20px;background: rgb(198, 255, 198);color: rgb(22, 156, 62)">Request
                a call back</button>
            <div style="width:100%" id="errors"></div>
        </div>
    </div>
</div>

<div style="position: fixed;bottom: 2.5rem;right: 2.5rem;cursor: pointer" onclick="form_popup_toggle()">
    <span class="pulsating-circle"
        style="width: 70px;height: 70px;border-radius: 50%;display: flex;align-items: center;justify-content: center;background: rgb(0, 153, 255)">
        <svg class="phone" width="30px" height="30px" fill="#ffffff" version="1.1" id="Capa_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 891.024 891.024"
            xml:space="preserve" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <path
                        d="M2.8,180.875c46.6,134,144.7,286.2,282.9,424.399c138.2,138.2,290.4,236.301,424.4,282.9c18.2,6.3,38.3,1.8,52-11.8 l92.7-92.7l21.6-21.6c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.4c-19.5-19.5-51.2-19.5-70.7,0l-38.899,38.9 c-20.2,20.2-52.4,22.2-75,4.6c-44.7-34.8-89-73.899-131.9-116.8c-42.9-42.9-82-87.2-116.8-131.9c-17.601-22.6-15.601-54.7,4.6-75 l38.9-38.9c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.5c-19.5-19.5-51.2-19.5-70.7,0l-21.6,21.6l-92.7,92.7 C1,142.575-3.5,162.675,2.8,180.875z">
                    </path>
                </g>
            </g>
        </svg>
    </span>
</div>
<script>
    function form_popup_toggle() {
        var x = document.getElementById("form-popup");
        if (x.style.display === "none") {
            x.style.display = "flex";
        } else {
            x.style.display = "none";
        }
    };

    $("#register-btn").click(function() {
        $('#errors').html('Processing ...');
        var url = window.location.href;
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        $.ajax({
            url: "{{ route('save-info') }}",
            data: {
                "url": url,
                "token": "{{ $token }}",
                "name": name,
                "email": email,
                "phone": phone,
            },
            type: "GET",
            success: function(result) {
                $('#errors').html('');

                if (result.error) {
                    $.each(result.error, function(i, err) {
                        $('<div>', {
                            class: 'error',
                        }).appendTo('#errors').text(err);
                    });
                } else {
                    if (result.status == 'SUCCESS') {
                        $('<div>', {
                            class: 'success',
                        }).appendTo('#errors').text(
                            'Your information has been successfully registered, we will contact you in 10 seconds.'
                        );
                        $('#name').val('');
                        $('#email').val('');
                        $('#phone').val('');
                    }
                }


            }
        });
    });
</script>