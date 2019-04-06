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
            <div id="myMap" style="position:relative;width:100%;height:550px;"></div>
        </div>
    </body>
    <script src="https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key={{ env('MAPKEY') }}"></script>
    <script>
    let map;

    function pushpins(now, la, lo, storeName, comment){
        let location = new Microsoft.Maps.Location(la,lo);
        let pin = new Microsoft.Maps.Pushpin(location, {
            color: 'red',
            title: storeName,
            subTitle: comment,
        });
        now.entities.push(pin);
    };

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {
            center: new Microsoft.Maps.Location(35.695541, 139.7613915), //Location center position
            mapTypeId: Microsoft.Maps.MapTypeId.load, //aerial,canvasDark,canvasLight,birdseye,grayscale,streetside
            zoom: 16  //Zoom:1=zoomOut ~ 20=zoomUp
        });

        getStores();
    }

    function getStores () {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/stores');

        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200) {
                    const stores = JSON.parse(xhr.responseText);

                    stores.forEach(function (store, i) {
                        pushpins(map, store.lat, store.lng, store.name, store.comment);
                    });
                }
            }
        };

        xhr.send();
    }
    </script>
</html>
