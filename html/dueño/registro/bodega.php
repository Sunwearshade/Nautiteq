<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Bodega</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/registrar_bodega.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Bodega</h1>
    </div>
    <div class="container">
        <form id="registroBodega" name="registrarBodega" method="post">
            <div class="input-group">
                <label for="barcoSeleccionado">Seleccionar Barco:</label>
                <select id="barcoSeleccionado" name="barcoSeleccionado">
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
            </div>
            <div class="input-group">
                <label for="numeroBodega">Número de Bodega</label>
                <input type="number" id="numeroBodega" name="numeroBodega" required>
            </div>
            <button type="submit" class="button" name="registrarBodega">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/scriptsDueno/viaje.js">
    </script>
</body>
</html>
