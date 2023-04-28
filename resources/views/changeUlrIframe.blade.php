<style>
    .blink {
        display: none;
        letter-spacing: 2px;
        animation: blinker 1s linear infinite;
        position: fixed;
        top: 10px;
        left: 35px;
        color: red;
        font-size: 28px;
        text-align: left;
        direction: ltr;
        font-weight: bold;
        font-family: cursive;
        z-index: 99;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<div class="wraper-player"></div>
<div class="blink">
    <div style="display: flex;align-items: center;justify-content: center">
        <span>Playing </span>
        <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-play" viewBox="0 0 16 16">
            <path
                d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"
                fill="red"></path>
        </svg>
    </div>
</div>
<img width="18.6px" src="{{ asset('images/mouse.png') }}" id="mouse">

<?php
$url = 'https://projects-test.test';
$opts = [
    'http' => [
        'method' => 'GET',
    ],
];
$context = stream_context_create($opts);
$content = file_get_contents($url, false, $context);
echo $content;
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    fetch('{{ route('dataset') }}')
        .then(response => response.json())
        .then(data => {

            $(".blink").show();

            var content = $("body");
            content.css({
                "overflow": "hidden",
            });

            var wraper = $(".wraper-player");
            wraper.css({
                "z-index": "998",
                "position": "fixed",
                "top": "0",
                "bottom": "0",
                "right": "0",
                "left": "0",
                "background": "#0000",
            });

            var currentFrame = 0;
            var lastFrameTime = performance.now();
            var intervalId;

            function animate() {
                var currentTime = performance.now();
                var elapsedTime = currentTime - lastFrameTime;
                var image = $("#mouse");
                image.css({
                    "position": "absolute",
                    "z-index": "99999",
                    "display": "block",
                    "filter": "drop-shadow(2px 4px 6px black)",
                });

                if (data[currentFrame].type == 'mousemove') {
                    var x = data[currentFrame].pageX;
                    var y = data[currentFrame].pageY;
                    image.css({
                        "top": data[currentFrame].pageY + "px",
                        "left": data[currentFrame].pageX + "px",
                    });
                } else if (data[currentFrame].type == 'stop') {

                }
                 else if (data[currentFrame].type == 'click') {
                    $('body').append('<span class="c' + data[currentFrame].pageX + data[currentFrame].pageY +
                        '"></span>');
                    var image = $('.c' + data[currentFrame].pageX + data[currentFrame].pageY).css({
                        "width": "15px",
                        "height": "15px",
                        "border-radius": "50%",
                        "background": "red",
                        "position": "absolute",
                        "z-index": "9999",
                        "display": "block",
                        "top": data[currentFrame].pageY + "px",
                        "left": data[currentFrame].pageX + "px",
                    });
                } else if (data[currentFrame].type == 'touchmove' || data[currentFrame].type == 'scroll') {
                    var content = $('body');
                    content.scrollTop(data[currentFrame].scrollY);
                    content.scrollLeft(data[currentFrame].scrollX);
                }

                currentFrame = (currentFrame + 1) % data.length;
                if (currentFrame == 0) {
                    $(".blink").hide();
                    cancelAnimationFrame(intervalId);
                } else {
                    intervalId = requestAnimationFrame(animate);
                }
            }

            intervalId = requestAnimationFrame(animate);

        })
        .catch(error => console.error(error));
</script>
