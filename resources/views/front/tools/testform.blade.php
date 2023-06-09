<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<style>
    .hlri_phone {
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
        background-color: rgb(123 55 255);
        animation: pulse-ring 1s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        z-index: -1
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
        font-size: 12px
    }

    .success {
        background: #6dff71;
        color: rgb(22 78 34);
        padding: 4px 8px;
        margin: 4px 0;
        border-radius: 6px;
        font-size: 14px;
        text-align: justify;
        line-height: 1.7
    }

    .intl-tel-input {
        width: 100%
    }

    .hlri-wrap-popup {
        display: none;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 9999;
        font-family: sans-serif
    }

    .hlri-popup-body {
        width: auto;
        height: auto;
        background: white;
        box-shadow: 0px 0px 10px 6px #74747438;
        border-radius: 6px;
        max-width: 460px;
    }

    .hlri-close-button {
        display: flex;
        justify-content: end;
        padding-top: 10px;
        width: 100%;
        border-bottom: 2px solid #f1f1f1;
        margin-bottom: 10px
    }

    .hlri-popup-content {
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column
    }

    .hlri-popup-titr {
        padding-bottom: 12px;
        text-align: center;
        font-weight: bold
    }

    .hlri-popup-input {
        width: 100%;
        border: none;
        background: #eee;
        padding: 10px;
        border-radius: 6px;
        outline: none;
        margin-bottom: 8px
    }

    .hlri-popup-wrap-button {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: .5rem
    }

    .hlri-popup-button-register {
        margin: 10px 0;
        cursor: pointer;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        background: rgb(198, 255, 198);
        color: rgb(22, 156, 62);
        font-family: sans-serif;
        font-size: 13px;
        text-align: center
    }

    .hlri-popup-button-call {
        margin: 10px 0;
        cursor: pointer;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        background: rgb(198 231 255);
        color: rgb(22 100 156);
        text-decoration: none;
        font-family: sans-serif;
        font-size: 13px;
        text-align: center
    }

    @media only screen and (max-width: 767px) {
        .hlri-popup-wrap-button {
            flex-direction: column;
            margin: 10px 0
        }

        .hlri-popup-button-register {
            margin: 0;
            width: 100%
        }

        .hlri-popup-button-call {
            margin: 0;
            width: 100%
        }
    }
</style>
<div class="hlri-wrap-popup" id="form-popup">
    <div class="hlri-popup-body">

        <div class="hlri-close-button"><svg style="cursor:pointer" onclick="closepopup()" width="20px" height="20px"
                viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="11" x2="11" y2="1" stroke="black" stroke-width="2" />
                <line x1="1" y1="1" x2="11" y2="11" stroke="black" stroke-width="2" />
            </svg></div>
        <div class="hlri-popup-content">

            <div class="form-block hlri-popup-content">
                <div class="hlri-popup-titr">Would you like us to call you back? </div><input class="hlri-popup-input"
                    type="text" placeholder="Name" id="hlri_name" style="width: calc(100% - 20px);"><input
                    class="hlri-popup-input" type="email" placeholder="Email" id="hlri_email"
                    style="width: calc(100% - 20px);"><input class="hlri-popup-input" style="padding-left:52px"
                    type="tel" placeholder="Phone" id="hlri_phone">
                <div class="hlri-popup-wrap-button"><a id="register-btn" class="hlri-popup-button-register">Request a
                        call-back</a> Or <a id="hlri_call" class="hlri-popup-button-call">Call Now (647) 424-1119</a>
                </div>
            </div>


            <section class="wrap-sign-in" style="display: none">
                <div style="font-size: 13px;margin-bottom: 10px">a verification code has been sent to <span
                        style="color: #8667ff; font-weight: bold;" id="current-phone"></span>, please enter the code
                    below</div>
                <div class="sign-in-form">
                    <div class="verify-form">
                        <small class="send-mobile fs-10"></small>
                        <input type="number" class="hlri-popup-input verify-code" placeholder="Enter verify code">
                        <button class="hlri-popup-button-register" id="btn-verify">Verify</button>
                        <div class="timer-code" style="font-size: 12px; color: #999;margin: 10px 0">It will be sent in
                            <span class="js-timeout">2:00</span> minutes
                        </div>
                        <small class="send-again"
                            style="color: #596ed7;display: none;cursor: pointer;margin: 10px 0">Resend
                            Code</small>
                    </div>
                </div>
            </section>


            <div style="width:100%" id="errors"></div>

        </div>
    </div>
</div>
<div style="position:fixed;bottom:2.5rem;right:2.5rem;cursor:pointer;z-index:999" onclick="form_popup_toggle()"><span
        class="pulsating-circle"
        style="width:70px;height:70px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:rgb(123 55 255)"><svg
            class="hlri_phone" width="30px" height="30px" fill="#ffffff" version="1.1" id="Capa_1"
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
        </svg></span></div>
<script>
    var phoneUser = '';

    function form_popup_toggle() {
        var e = document.getElementById("form-popup");
        e.style.display = "flex"
    };

    function closepopup() {
        var e = document.getElementById("form-popup");
        e.style.display = "none"
    };
    $("#register-btn").click(function() {
        $("#errors").html("Processing ...");
        var params = (new URL(document.location)).searchParams,
            e = window.location.href,
            r = $("#hlri_name").val(),
            l = $("#hlri_email").val(),
            o = $("#hlri_phone").val();
        $.ajax({
            url: "{{ route('save-info') }}",
            data: {
                "url": e,
                "token": "{{ $token }}",
                "name": r,
                "email": l,
                "phone": o,
                "source": params.get("utm_source"),
                "medium": params.get("utm_medium"),
                "term": params.get("utm_term"),
                "content": params.get("utm_content"),
                "campaign": params.get("utm_campaign"),
                "custom_source": params.get("custom_source")
            },
            type: "GET",
            success: function(e) {
                $("#errors").html("");
                if (e.error) {
                    $.each(e.error, function(e, r) {
                        $("<div>", {
                            class: "error",
                        }).appendTo("#errors").text(r)
                    })
                } else {
                    if (e.confirm == "SUCCESS") {
                        phoneUser = $("#hlri_phone").val();
                        $('#current-phone').text(phoneUser);
                        $('.form-block').hide();
                        $('.wrap-sign-in').css('display', 'block');
                        countdown();
                    }
                }
            }
        })
    });
    $("#hlri_phone").intlTelInput({
        onlyCountries: ["ca"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
    });
    $("#hlri_call").click(function() {
        var e = $("#hlri_name").val(),
            r = $("#hlri_email").val(),
            l = $("#hlri_phone").val();
        if (e == "" && r == "" && l == "") {
            $(this).attr("href", "tel:6474241119")
        } else {
            $.ajax({
                url: "{{ route('crm-info') }}",
                data: {
                    "url": url,
                    "token": "{{ $token }}",
                    "name": e,
                    "email": r,
                    "phone": l,
                },
                type: "GET",
                success: function(e) {
                    $("#errors").html("");
                    if (e.error) {
                        $.each(e.error, function(e, r) {
                            $("<div>", {
                                class: "error",
                            }).appendTo("#errors").text(r)
                        })
                    } else {
                        if (e.status == "SUCCESS") {
                            $("<div>", {
                                class: "success",
                            }).appendTo("#errors").text(
                                "Your information has been successfully registered, we will contact you in 10 minutes"
                            );
                            $("#hlri_name").val("");
                            $("#hlri_email").val("");
                            $("#hlri_phone").val("");
                        }
                    }
                }
            })
        }
    });

    var interval;

    function countdown() {
        clearInterval(interval);
        interval = setInterval(function() {
            var timer = $('.js-timeout').html();
            timer = timer.split(':');
            var minutes = timer[0];
            var seconds = timer[1];
            seconds -= 1;
            if (minutes < 0) return;
            else if (seconds < 0 && minutes != 0) {
                minutes -= 1;
                seconds = 59;
            } else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

            $('.js-timeout').html(minutes + ':' + seconds);

            if (minutes == 0 && seconds == 0) {
                clearInterval(interval);
                $('.timer-code').css('display', 'none');
                $('.send-again').css('display', 'block');
            }
        }, 1000);
    }

    $('.send-again').click(function() {
        $('.timer-code').css('display', 'block');
        $('.send-again').css('display', 'none');
        $('.js-timeout').text("2:00");
        countdown();
        $.ajax({
            url: "{{ route('resendCode') }}",
            data: {
                "phone": phoneUser,
            },
            type: "GET",
            success: function(e) {
                $("#errors").html("");
                if (e.error) {
                    $.each(e.error, function(e, r) {
                        $("<div>", {
                            class: "error",
                        }).appendTo("#errors").text(r)
                    })
                } else {
                    if (e.status == "SUCCESS") {
                        if (e.status == "SUCCESS") {
                            $("<div>", {
                                class: "success",
                            }).appendTo("#errors").text(
                                "Code has been sent"
                            );
                        }
                    }
                }
            }
        })
    });

    $('#btn-verify').click(function() {
        $("#errors").html("Processing ...");
        $.ajax({
            url: "{{ route('confirmPhone') }}",
            data: {
                "code": $('.verify-code').val(),
                "phone": phoneUser,
            },
            type: "GET",
            success: function(e) {
                $("#errors").html("");
                if (e.error) {
                    $.each(e.error, function(e, r) {
                        $("<div>", {
                            class: "error",
                        }).appendTo("#errors").text(r)
                    })
                } else {
                    if (e.status == "SUCCESS") {
                        if (e.status == "SUCCESS") {
                            $("<div>", {
                                class: "success",
                            }).appendTo("#errors").text(
                                "Your information has been successfully registered, we will contact you in a few minutes"
                            );

                            setTimeout(() => {
                                var e = document.getElementById("form-popup");
                                e.style.display = "none"
                                $('.form-block').css('display', 'block');
                                $('.wrap-sign-in').css('display', 'none');
                                $('#errors').text("");
                                $("#hlri_name").val("");
                                $("#hlri_email").val("");
                                $("#hlri_phone").val("");
                                $('.verify-code').val("")
                            }, 5000);
                        }
                    }
                }
            }
        })
    });
</script>
