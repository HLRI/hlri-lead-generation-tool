<!DOCTYPE html>
<html>

<head>
    <title>Records</title>
    <style>
        .screen-video {
            border: 4px solid blue;
        }
    </style>
</head>

<body>
    <div>
        <iframe class="screen-video" scrolling="yes" width="100%" height="500"
            src="{{ route('changeUlrIframe') }}"></iframe>
    </div>
</body>

</html>
