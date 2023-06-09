<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .blink {
        display: none;
        letter-spacing: 2px;
        animation: blinker 1s linear infinite;
        position: fixed;
        top: 10px;
        left: 35px;
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

    .panel-screen {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .buttons {
        width: 140px;
        border-radius: 10px;
        padding: 6px;
        background: rgb(239 239 239);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        position: fixed;
        bottom: 10px;
        z-index: 999999;
    }

    #play {
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background: rgb(43, 216, 43);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        outline: none;
        color: white;
    }

    #pause {
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background: rgb(216, 43, 43);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        outline: none;
        color: white;
    }

    #repeat {
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background: rgb(60, 43, 216);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        outline: none;
        color: white;
    }

    .fa-play,
    .fa-pause,
    .fa-repeat {
        font-size: 12px !important;
    }
</style>
<div class="wraper-player"></div>
<div class="blink">
    <div style="display: flex;align-items: center;justify-content: center">
        <span class="status-video">Playing </span>
        <svg id="play-icon" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-play" viewBox="0 0 16 16">
            <path
                d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z">
            </path>
        </svg>
        <svg id="pause-icon" style="display: none" xmlns="http://www.w3.org/2000/svg" width="35" height="35"
            fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
            <path
                d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z">
            </path>
        </svg>
    </div>
</div>
<img width="18.6px" src="{{ asset('images/mouse.png') }}" id="mouse">

<div class="panel-screen">
    <div class="buttons">
        <button type="button" id="play">
            <i class="fas fa-play"></i>
        </button>
        <button type="button" id="pause">
            <i class="fas fa-pause"></i>
        </button>
        <button type="button" id="repeat">
            <i class="fas fa-repeat"></i>
        </button>
    </div>
</div>


<?php
$url_target = 'http://' . $url;
$opts = [
    'http' => [
        'method' => 'GET',
    ],
];
$context = stream_context_create($opts);
$content = file_get_contents($url_target, false, $context);
?>

    <?php echo $content; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    fetch('{{ route('dataset', ['socket_id' => $socket_id]) }}')
        .then(response => response.json())
        .then(data => {

            // var content = $("body");
            // content.css({
            //     "overflow": "hidden",
            // });

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
                $(".blink").show();
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

                } else if (data[currentFrame].type == 'click') {
                    $('body').append('<span class="pointer c' + data[currentFrame].pageX + data[currentFrame]
                        .pageY +
                        '"></span>');
                    var image = $('.c' + data[currentFrame].pageX + data[currentFrame].pageY).css({
                        "width": "15px",
                        "height": "15px",
                        "border-radius": "50%",
                        "background": "rgb(216, 43, 43)",
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

            $('#play').click(function(e) {
                $('.status-video').css({
                    "color": "rgb(43, 216, 43)",
                });
                $('#pause-icon').hide();
                $('#play-icon').show().css({
                    "color": "rgb(43, 216, 43)",
                });
                $('.status-video').text('Playing ');
                intervalId = requestAnimationFrame(animate);
            });
            $('#pause').click(function(e) {
                $('.status-video').css({
                    "color": "rgb(216, 43, 43)",
                });
                $('#pause-icon').show().css({
                    "color": "rgb(216, 43, 43)",
                });
                $('#play-icon').hide();
                $('.status-video').text('Pausing ');
                cancelAnimationFrame(intervalId);
            });
            $('#repeat').click(function(e) {
                $('.pointer').remove();
                var content = $('body');
                content.scrollTop(0);
                content.scrollLeft(0);
                cancelAnimationFrame(intervalId);
                intervalId = requestAnimationFrame(animate);
            });
        })
        .catch(error => console.error(error));
</script>
