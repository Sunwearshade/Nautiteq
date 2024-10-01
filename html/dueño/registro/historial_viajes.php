<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Historial de Viajes</title>
</head>
<body>
    <div class="header">
        <h1>Historial de Viajes</h1>
    </div>
    <div class="container">
        <label for="barcoSeleccionado">Seleccionar Barco:</label>
        <select id="barcoSeleccionado" onchange="mostrarHistorial()">
            <option value="">Seleccione...</option>
            <option value="barco1">Barco 1</option>
            <option value="barco2">Barco 2</option>
        </select>

        <div id="historial" style="margin-top: 20px;">
        </div>
    </div>

    <script src="../../../scripts/scriptsDueno/historialviajes.js">
    </script>
</body>
</html>
