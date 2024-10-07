<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Consulta del Barco Más Cercano</title>
</head>
<body>
    <header class="header">
        <h1>Consultar Barco Más Cercano a un Puerto</h1>
    </header>
    <div class="container">
        <form id="boatForm">
            <label for="port">Puerto:</label>
            <input type="text" id="port" required>

            <label for="datetime">Fecha y Hora:</label>
            <input type="datetime-local" id="datetime" required>

            <button type="button" onclick="findNearestBoat()">Consultar</button>
        </form>
        <div id="boatResult"></div>
    </div>
    <script src="../../scripts/GerenteOp/barco_cercano.js"></script>
</body>
</html>
