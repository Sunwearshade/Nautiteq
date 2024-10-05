<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Viaje</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/registrar_viaje.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Viaje</h1>
    </div>
    <div class="container">
        <form id="registroViaje" name="registrarViaje" method="post">
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
                <label for="puertoOrigen">Puerto de Origen</label>
                <input type="text" id="puertoOrigen" name="puertoOrigen" required>
            </div>
            <div class="input-group">
                <label for="paisOrigen">País de Origen</label>
                <input type="text" id="paisOrigen" name="paisOrigen" required>
            </div>
            <div class="input-group">
                <label for="puertoDestino">Puerto de Destino</label>
                <input type="text" id="puertoDestino" name="puertoDestino" required>
            </div>
            <div class="input-group">
                <label for="paisDestino">País de Destino</label>
                <input type="text" id="paisDestino" name="paisDestino" required>
            </div>
            <div class="input-group">
                <label for="fechaInicio">Fecha de Inicio</label>
                <input type="date" id="fechaInicio" name="fechaInicio" required>
            </div>
            <div class="input-group">
                <label for="fechaFin">Fecha de Finalización</label>
                <input type="date" id="fechaFin" name="fechaFin" required>
            </div>
            <button type="submit" class="button" name="registrarViaje">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/scriptsDueno/viaje.js">
    </script>
</body>
</html>
