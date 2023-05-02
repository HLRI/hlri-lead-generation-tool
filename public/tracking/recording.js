var socketScript = document.createElement('script');
socketScript.src = 'https://cdn.socket.io/4.6.0/socket.io.min.js';
var jqueryScript = document.createElement('script');
jqueryScript.src = 'https://code.jquery.com/jquery-3.6.4.min.js';
document.head.appendChild(socketScript);
document.head.appendChild(jqueryScript);

jqueryScript.onload = function () {
    jQuery(document).ready(function ($) {
        if (window.location.hostname != '127.0.0.1') {
            let ipAdress = '127.0.0.1';
            let socketPort = '3000';
            let socket = io(ipAdress + ':' + socketPort);
            socket.on('connection');

            var data = [];
            document.addEventListener("mousemove", function (event) {

                var type = event.type;
                var pageX = event.pageX;
                var pageY = event.pageY;

                data.push({
                    "type": event.type,
                    "pageX": event.pageX,
                    "pageY": event.pageY
                });

                setInterval(() => {
                    if (data.length > 0) {
                        socket.emit('sendDataToServer', data);
                        data = [];
                    } else {
                        data.push({
                            "type": 'stop',
                            "pageX": '',
                            "pageY": ''
                        });
                        socket.emit('sendDataToServer', data);
                        data = [];

                    }
                }, 6000);

            });

            document.addEventListener("click", function (event) {
                data.push({
                    "type": event.type,
                    "pageX": event.pageX,
                    "pageY": event.pageY
                });
                socket.emit('sendDataToServer', data);
                data = [];
            });

            document.addEventListener('scroll', (event) => {
                data.push({
                    "type": event.type,
                    "scrollX": window.scrollX,
                    "scrollY": window.scrollY
                });
                socket.emit('sendDataToServer', data);
                data = [];
            });

            document.addEventListener("touchmove", (event) => {
                data.push({
                    "type": event.type,
                    "scrollX": window.scrollX,
                    "scrollY": window.scrollY
                });
                socket.emit("sendDataToServer", data);
                data = []
            })


            document.addEventListener('keyup', function (event) {
                socket.emit("sendDataKeyboard", event.key);
            });

            const userAgent = window.navigator.userAgent;

            var ppi = window.devicePixelRatio / (window.innerWidth * 0.0393701);


            var URL = window.location.hostname;
            var SIZE = window.innerWidth + '/' + window.innerHeight + '/' + window.devicePixelRatio + '/' + ppi;
            var OS = '';
            var DEVICE = '';
            var BROWSER = '';
            var COUNTRY = '';

            if (/Windows/.test(userAgent)) {
                OS = "Windows";
            } else if (/Mac OS/.test(userAgent)) {
                OS = "macOS";
            } else if (/Linux/.test(userAgent)) {
                OS = "Linux";
            } else if (/Android/.test(userAgent)) {
                OS = "Android";
            } else if (/iOS/.test(userAgent)) {
                OS = "iOS";
            } else {
                OS = "The user's operating system could not be determined";
            }


            const platform = window.navigator.platform;

            if (/Win32/.test(platform)) {
                DEVICE = "Windows PC";
            } else if (/MacIntel/.test(platform)) {
                DEVICE = "Mac computer";
            } else if (/Linux/.test(platform)) {
                DEVICE = "Linux PC";
            } else if (/Android/.test(userAgent)) {
                DEVICE = "Android device";
            } else if (/iPad|iPhone|iPod/.test(userAgent)) {
                DEVICE = "iOS device";
            } else {
                DEVICE = "The user's device could not be determined";
            }

            if (/Firefox/.test(userAgent)) {
                BROWSER = "Firefox";
            } else if (/Chrome/.test(userAgent)) {
                BROWSER = "Chrome";
            } else if (/Safari/.test(userAgent)) {
                BROWSER = "Safari";
            } else if (/Edge/.test(userAgent)) {
                BROWSER = "Edge";
            } else if (/MSIE/.test(userAgent)) {
                BROWSER = "Internet Explorer";
            } else {
                BROWSER = "The user's browser could not be determined";
            }

            var currentdate = new Date();
            var currentTime = currentdate.getFullYear() + "-"
                + (currentdate.getMonth() + 1) + "-"
                + currentdate.getDate() + " "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();


            var userAgentData = {
                url: URL,
                os: OS,
                device: DEVICE,
                size: SIZE,
                browser: BROWSER,
                start_time: currentTime,
            }

            socket.emit('userAgent', userAgentData);

        }
    });
}
