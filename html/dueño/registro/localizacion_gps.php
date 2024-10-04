<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin="">
    </script>
    <title>Localización GPS</title>
</head>
<body>
    <div class="header">
        <h1>Localización GPS</h1>
    </div>
    <div class="container">
    <div id="mimapa"></div>

<script>
    var mymap = L.map('mimapa').setView([22.7181138, -102.4875826], 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 25,
        attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>', 
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    /*var marcador = L.icon({
        iconUrl:'images/marcador.png',
        iconSize: [60, 85]
    });

    var marker = L.marker([22.7181138, -102.4875826], {icon: marcador}).addTo(mymap);*/

    var circle = L.circle([22.715969, -102.485431], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 40
    }).addTo(mymap);

    var polygon = L.polygon([
        [22.717820, -102.487619],
        [22.716832, -102.488089],
        [22.718159, -102.485810]
    ]).addTo(mymap);
</script>
        <table>
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>Nombre del Barco</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/01/2024 10:00</td>
                    <td>Barco 1</td>
                    <td>-34.12345</td>
                    <td>-58.12345</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
