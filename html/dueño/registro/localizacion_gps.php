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
    <script src="../../../scripts/scriptsDueno/localizacion_gps.js" defer></script>
    <title>Localización GPS</title>
</head>
<body>
    <div class="header">
        <h1>Localización GPS</h1>
    </div>
    <div class="container">
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
    <div id="mimapa" class="container"></div>
</body>
</html>
