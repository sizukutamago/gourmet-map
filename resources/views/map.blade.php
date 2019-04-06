<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>gormet-map</title>
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <map-component/>
        </div>
    </body>

    <script src="js/app.js"></script>
</html>
