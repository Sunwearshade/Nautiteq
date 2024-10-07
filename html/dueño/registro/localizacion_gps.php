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
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/guardar_localizacion.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Localización GPS</h1>
    </div>
    <div class="container">
        <label for="barcos">Seleccione un barco:</label>
        <select id="barcos" onchange="actualizarLocalizacion()">
            <option value="">Seleccione un barco</option>
        </select>
    </div>

    <div id="localizacion-info" class="container" style="display: none;">
        <h3>Información de Localización</h3>
        <form id="guardarLocalizacion" name="guardarLocalizacion" method="post">
            <p>Nombre del Barco: <span id="nombre-barco"></span></p>
            <input type="hidden" id="nombreBarco" name="nombreBarco">
            
            <p>Fecha y Hora: <span id="fecha-hora"></span></p>
            <input type="hidden" id="fechaHora" name="fechaHora">
            
            <p>Latitud: <span id="latitud"></span></p>
            <input type="hidden" id="latitudInput" name="latitud">
            
            <p>Longitud: <span id="longitud"></span></p>
            <input type="hidden" id="longitudInput" name="longitud">
            
            <button type="submit" class="button" name="guardarLocalizacion">Guardar Localización</button>
        </form>
    </div>

    <div id="mimapa" class="container"></div>
</body>
</html>
