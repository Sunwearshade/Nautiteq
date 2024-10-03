<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Historial de Viajes</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/consulta_viajes.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Historial de Viajes</h1>
    </div>
    <div class="container">
        <label for="barcoSeleccionado">Seleccionar Barco:</label>
        <select id="barcoSeleccionado" name="barcoSeleccionado" onchange="mostrarHistorial()">
            <option value="">Seleccione...</option>
            <?php
                if (!empty($barcos)) {
                    foreach ($barcos as $barco) {
                        echo "<option value='" . $barco['barco_id'] . "'>" . $barco['denominacion'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay barcos registrados</option>";
                }
            ?>
        </select>

        <div id="historial" style="margin-top: 20px;">
        </div>
    </div>

    <script src="../../../scripts/scriptsDueno/historialviajes.js">
    </script>
</body>
</html>
