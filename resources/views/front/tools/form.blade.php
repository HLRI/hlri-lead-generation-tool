document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
document.write('');
document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">');
document.write('<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>');
document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>');
document.write('<style>');
document.write('    .hlri_phone {');
document.write('        animation: pulse 1s infinite');
document.write('    }');
document.write('');
document.write('    @keyframes pulse {');
document.write('        0% {');
document.write('            transform: rotate(0);');
document.write('        }');
document.write('');
document.write('        10% {');
document.write('            transform: rotate(10deg);');
document.write('        }');
document.write('');
document.write('        20% {');
document.write('            transform: rotate(-10deg);');
document.write('        }');
document.write('');
document.write('        30% {');
document.write('            transform: rotate(10deg);');
document.write('            transform: scale(1.2);');
document.write('        }');
document.write('');
document.write('        40% {');
document.write('            transform: rotate(-10deg);');
document.write('        }');
document.write('');
document.write('        100% {');
document.write('            transform: rotate(0);');
document.write('        }');
document.write('    }');
document.write('');
document.write('');
document.write('    .pulsating-circle::before {');
document.write('        content: "";');
document.write('        position: absolute;');
document.write('        display: block;');
document.write('        width: 140px;');
document.write('        height: 140px;');
document.write('        border-radius: 50%;');
document.write('        background-color: rgb(123 55 255);');
document.write('        animation: pulse-ring 1s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;');
document.write('        z-index: -1;');
document.write('    }');
document.write('');
document.write('    @keyframes pulse-ring {');
document.write('        0% {');
document.write('            transform: scale(.33);');
document.write('        }');
document.write('');
document.write('        80%,');
document.write('        100% {');
document.write('            opacity: 0;');
document.write('        }');
document.write('    }');
document.write('');
document.write('    .error {');
document.write('        background: #ffdada;');
document.write('        color: red;');
document.write('        padding: 4px 8px;');
document.write('        margin: 4px 0;');
document.write('        border-radius: 6px;');
document.write('        font-size: 12px;');
document.write('    }');
document.write('');
document.write('    .success {');
document.write('        background: #6dff71;');
document.write('        color: rgb(22 78 34);');
document.write('        padding: 4px 8px;');
document.write('        margin: 4px 0;');
document.write('        border-radius: 6px;');
document.write('        font-size: 14px;');
document.write('        text-align: justify;');
document.write('        line-height: 1.7;');
document.write('    }');
document.write('');
document.write('    .intl-tel-input {');
document.write('        width: 100%;');
document.write('    }');
document.write('');
document.write('    .hlri-wrap-popup {');
document.write('        display: none;');
document.write('        justify-content: center;');
document.write('        align-items: center;');
document.write('        height: 100vh;');
document.write('        width: 100%;');
document.write('        position: fixed;');
document.write('        z-index: 9999;');
document.write('        font-family: sans-serif;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-body {');
document.write('        width: auto;');
document.write('        height: auto;');
document.write('        background: white;');
document.write('        box-shadow: 0px 0px 10px 6px #74747438;');
document.write('        border-radius: 6px;');
document.write('    }');
document.write('');
document.write('    .hlri-close-button {');
document.write('        display: flex;');
document.write('        justify-content: end;');
document.write('        padding-top: 10px;');
document.write('        width: 100%;');
document.write('        border-bottom: 2px solid #f1f1f1;');
document.write('        margin-bottom: 10px;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-content {');
document.write('        padding: 10px 20px;');
document.write('        display: flex;');
document.write('        align-items: center;');
document.write('        justify-content: center;');
document.write('        flex-direction: column');
document.write('    }');
document.write('');
document.write('    .hlri-popup-titr {');
document.write('        padding-bottom: 12px;');
document.write('        text-align: center;');
document.write('        font-weight: bold;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-input {');
document.write('        width: 100%;');
document.write('        border: none;');
document.write('        background: #eee;');
document.write('        padding: 10px;');
document.write('        border-radius: 6px;');
document.write('        outline: none;');
document.write('        margin-bottom: 8px;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-wrap-button {');
document.write('        display: flex;');
document.write('        justify-content: center;');
document.write('        align-items: center;');
document.write('        gap: .5rem;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-button-register {');
document.write('        margin: 10px 0;');
document.write('        cursor: pointer;');
document.write('        border: none;');
document.write('        border-radius: 10px;');
document.write('        padding: 10px 20px;');
document.write('        background: rgb(198, 255, 198);');
document.write('        color: rgb(22, 156, 62);');
document.write('        font-family: sans-serif;');
document.write('        font-size: 13px;');
document.write('        text-align: center;');
document.write('    }');
document.write('');
document.write('    .hlri-popup-button-call {');
document.write('        margin: 10px 0;');
document.write('        cursor: pointer;');
document.write('        border: none;');
document.write('        border-radius: 10px;');
document.write('        padding: 10px 20px;');
document.write('        background: rgb(198 231 255);');
document.write('        color: rgb(22 100 156);');
document.write('        text-decoration: none;');
document.write('        font-family: sans-serif;');
document.write('        font-size: 13px;');
document.write('        text-align: center;');
document.write('    }');
document.write('');
document.write('    @media only screen and (max-width: 767px) {');
document.write('        .hlri-popup-wrap-button {');
document.write('            flex-direction: column;');
document.write('            margin: 10px 0;');
document.write('        }');
document.write('');
document.write('        .hlri-popup-button-register {');
document.write('            margin: 0;');
document.write('            width: 100%;');
document.write('        }');
document.write('');
document.write('        .hlri-popup-button-call {');
document.write('            margin: 0;');
document.write('            width: 100%;');
document.write('        }');
document.write('    }');
document.write('</style>');
document.write('');
document.write('<div class="hlri-wrap-popup" id="form-popup">');
document.write('    <div class="hlri-popup-body">');
document.write('        <div class="hlri-close-button">');
document.write('            <svg style="cursor: pointer" onclick="closepopup()" width="20px" height="20px" viewPort="0 0 12 12"');
document.write('                version="1.1" xmlns="http://www.w3.org/2000/svg">');
document.write('                <line x1="1" y1="11" x2="11" y2="1" stroke="black" stroke-width="2" />');
document.write('                <line x1="1" y1="1" x2="11" y2="11" stroke="black" stroke-width="2" />');
document.write('            </svg>');
document.write('        </div>');
document.write('');
document.write('        <div class="hlri-popup-content">');
document.write('            <div class="hlri-popup-titr">Would you like us to call you back?');
document.write('            </div>');
document.write('            <input class="hlri-popup-input" type="text" placeholder="Name" id="hlri_name">');
document.write('            <input class="hlri-popup-input" type="email" placeholder="Email" id="hlri_email">');
document.write('            <input class="hlri-popup-input" style="padding-left: 52px;" type="tel" placeholder="Phone"');
document.write('                id="hlri_phone">');
document.write('            <div class="hlri-popup-wrap-button">');
document.write('                <a id="register-btn" class="hlri-popup-button-register">Request');
document.write('                    a call-back</a> Or');
document.write('                <a id="hlri_call" class="hlri-popup-button-call">Call');
document.write('                    us at +647-696-6419</a>');
document.write('            </div>');
document.write('            <div style="width:100%" id="errors"></div>');
document.write('        </div>');
document.write('    </div>');
document.write('</div>');
document.write('');
document.write('<div style="position: fixed;bottom: 2.5rem;right: 2.5rem;cursor: pointer;z-index: 999;" onclick="form_popup_toggle()">');
document.write('    <span class="pulsating-circle"');
document.write('        style="width: 70px;height: 70px;border-radius: 50%;display: flex;align-items: center;justify-content: center;background: rgb(123 55 255)">');
document.write('        <svg class="hlri_phone" width="30px" height="30px" fill="#ffffff" version="1.1" id="Capa_1"');
document.write('            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 891.024 891.024"');
document.write('            xml:space="preserve" stroke="#ffffff">');
document.write('            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>');
document.write('            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>');
document.write('            <g id="SVGRepo_iconCarrier">');
document.write('                <g>');
document.write('                    <path');
document.write('                        d="M2.8,180.875c46.6,134,144.7,286.2,282.9,424.399c138.2,138.2,290.4,236.301,424.4,282.9c18.2,6.3,38.3,1.8,52-11.8 l92.7-92.7l21.6-21.6c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.4c-19.5-19.5-51.2-19.5-70.7,0l-38.899,38.9 c-20.2,20.2-52.4,22.2-75,4.6c-44.7-34.8-89-73.899-131.9-116.8c-42.9-42.9-82-87.2-116.8-131.9c-17.601-22.6-15.601-54.7,4.6-75 l38.9-38.9c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.5c-19.5-19.5-51.2-19.5-70.7,0l-21.6,21.6l-92.7,92.7 C1,142.575-3.5,162.675,2.8,180.875z">');
document.write('                    </path>');
document.write('                </g>');
document.write('            </g>');
document.write('        </svg>');
document.write('    </span>');
document.write('</div>');
document.write('<script>');
document.write('    function form_popup_toggle() {');
document.write('        var x = document.getElementById("form-popup");');
document.write('        x.style.display = "flex";');
document.write('    };');
document.write('');
document.write('    function closepopup() {');
document.write('        var x = document.getElementById("form-popup");');
document.write('        x.style.display = "none";');
document.write('    }');
document.write('');
document.write('    $("#register-btn").click(function() {');
document.write('        $(\'#errors\').html(\'Processing ...\');');
document.write('        var url = window.location.href;');
document.write('        var hlri_name = $(\'#hlri_name\').val();');
document.write('        var hlri_email = $(\'#hlri_email\').val();');
document.write('        var hlri_phone = $(\'#hlri_phone\').val();');
document.write('');
document.write('        $.ajax({');
document.write('            url: "{{ route(\'save-info\') }}",');
document.write('            data: {');
document.write('                "url": url,');
document.write('                "token": "{{ $token }}",');
document.write('                "name": hlri_name,');
document.write('                "email": hlri_email,');
document.write('                "phone": hlri_phone,');
document.write('            },');
document.write('            type: "GET",');
document.write('            success: function(result) {');
document.write('                $(\'#errors\').html(\'\');');
document.write('');
document.write('                if (result.error) {');
document.write('                    $.each(result.error, function(i, err) {');
document.write('                        $(\'<div>\', {');
document.write('                            class: \'error\',');
document.write('                        }).appendTo(\'#errors\').text(err);');
document.write('                    });');
document.write('                } else {');
document.write('                    if (result.status == \'SUCCESS\') {');
document.write('                        $(\'<div>\', {');
document.write('                            class: \'success\',');
document.write('                        }).appendTo(\'#errors\').text(');
document.write('                            \'Your information has been successfully registered, we will contact you in 10 seconds.\'');
document.write('                        );');
document.write('                        $(\'#hlri_name\').val(\'\');');
document.write('                        $(\'#hlri_email\').val(\'\');');
document.write('                        $(\'#hlri_phone\').val(\'\');');
document.write('                    }');
document.write('                }');
document.write('');
document.write('');
document.write('            }');
document.write('        });');
document.write('    });');
document.write('');
document.write('');
document.write('    $("#hlri_phone").intlTelInput({');
document.write('        onlyCountries: ["ca"],');
document.write('        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"');
document.write('    });');
document.write('');
document.write('    $(\'#hlri_call\').click(function() {');
document.write('        var hlri_name = $(\'#hlri_name\').val();');
document.write('        var hlri_email = $(\'#hlri_email\').val();');
document.write('        var hlri_phone = $(\'#hlri_phone\').val();');
document.write('        if (hlri_name == \'\' && hlri_email == \'\' && hlri_phone == \'\') {');
document.write('            $(this).attr(\'href\', \'tel:+6476966419\');');
document.write('        } else {');
document.write('            $.ajax({');
document.write('                url: "{{ route(\'crm-info\') }}",');
document.write('                data: {');
document.write('                    "url": url,');
document.write('                    "token": "{{ $token }}",');
document.write('                    "name": hlri_name,');
document.write('                    "email": hlri_email,');
document.write('                    "phone": hlri_phone,');
document.write('                },');
document.write('                type: "GET",');
document.write('                success: function(result) {');
document.write('                    $(\'#errors\').html(\'\');');
document.write('');
document.write('                    if (result.error) {');
document.write('                        $.each(result.error, function(i, err) {');
document.write('                            $(\'<div>\', {');
document.write('                                class: \'error\',');
document.write('                            }).appendTo(\'#errors\').text(err);');
document.write('                        });');
document.write('                    } else {');
document.write('                        if (result.status == \'SUCCESS\') {');
document.write('                            $(\'<div>\', {');
document.write('                                class: \'success\',');
document.write('                            }).appendTo(\'#errors\').text(');
document.write('                                \'Your information has been successfully registered, we will contact you in 10 seconds.\'');
document.write('                            );');
document.write('                            $(\'#hlri_name\').val(\'\');');
document.write('                            $(\'#hlri_email\').val(\'\');');
document.write('                            $(\'#hlri_phone\').val(\'\');');
document.write('                        }');
document.write('                    }');
document.write('                }');
document.write('            });');
document.write('        }');
document.write('    });');
document.write('</script>');
document.write('');
