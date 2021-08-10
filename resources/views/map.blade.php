<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
    @include('menu')
        <div class="flex-center position-ref full-height">

{{--                <iframe width="825" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=21.88888549804688%2C49.990194290630335%2C22.115478515625004%2C50.09096150462156&amp;layer=mapnik&amp;marker=50.04060433615754%2C22.002182006835938" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.0406&amp;mlon=22.0022#map=13/50.0406/22.0022">Wyświetl większą mapę</a></small>--}}

                <div class="pt-5" id="map" style="height:400px; width: 80%; "></div>

                <script>

                    const api_url = 'http://127.0.0.1:8000/api/point';

                    async function getPoints() {
                        const response = await fetch(api_url);
                        const data = await response.json();
                        return data;
                    }

                    // // Initialize and add the map
                    function addMarkerToMap(markerData, map){
                        L.marker([markerData.position.lat, markerData.position.lng]).addTo(map)
                            .bindPopup(markerData.name);
                    }
                    function setMarkerEvents(markerOnMap, map, allMarkers){


                        markerOnMap.marker.addListener("click", () => {
                            for(let i=0; i<allMarkers.length; i++){
                                allMarkers[i].infowindow.close(map, allMarkers[i].marker);
                            }
                            markerOnMap.infowindow.open(map, markerOnMap.marker);
                        });
                    }
                    async function initMap() {
                        // The location of Uluru
                        const center = { lat: 50.04066763934559, lng: 22.002197207398286 };
                        const markers = await getPoints();
                        var map = L.map('map').setView([center.lat, center.lng], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2NpdXJraWV3aWN6IiwiYSI6ImNrbHRhdnZiNDF1bzIycHFtNGk2Yngyb3oifQ.4PzwqWJZF0u56AAXwH01hg', {
                            maxZoom: 19,
                            attribution: '',
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1
                        }).addTo(map);

                        // The map, centered at Uluru
                        // const map = new google.maps.Map(document.getElementById("map"), {
                        //   zoom:11,
                        //   center: center,
                        // });
                        let markersOnMap =[];
                        for(let i=0; i<markers.length; i++){
                            let marker = addMarkerToMap(markers[i], map);
                            markersOnMap.push(marker);
                        }
                        //
                        // for(let i=0; i<markersOnMap.length; i++){
                        //    setMarkerEvents(markersOnMap[i], map, markersOnMap);
                        // }

                    }
                    initMap();
                </script>

        </div>
    </body>
</html>
