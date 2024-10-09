<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin="">
    </script>
    <title>Consulta del Barco Más Cercano</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_go/consulta_barco_cercano.php';
    ?>
</head>
<body>
    <header class="header">
        <h1>Consultar Barco Más Cercano a un Puerto</h1>
    </header>
    <div class="container">
        <form id="boatForm" name="boatForm" method="post">
        <div class="input-group">
                <label for="puertoSeleccionado">Seleccionar Puerto:</label>
                <select id="puertoSeleccionado" name="puertoSeleccionado">
                    <option value="">Seleccione...</option>
                    <?php
                    if (!empty($puertos)) {
                        foreach ($puertos as $puerto) {
                            echo "<option value='" . $puerto['puerto_id'] . "'>" . $puerto['nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay puertos registrados</option>";
                    }
                    ?>
                </select>
            </div>

            <label for="date">Fecha:</label>
            <input type="date" id="date" required>

            <button type="button" onclick="findNearestBoat()">Consultar</button>
        </form>
        <div id="boatResult"></div>
    </div>

    <div id="mimapa" class="container"></div>
    <script src="../../scripts/GerenteOp/barco_cercano.js"></script>
</body>
</html>
