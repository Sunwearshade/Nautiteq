<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Consulta de Inventario Bajo</title>
</head>
<body>
    <div class="container">
        <h1>Consulta de Inventario Bajo</h1>
        <form id="inventoryForm">
            <label for="country">País:</label>
            <input type="text" id="country" required>

            <label for="product">Producto:</label>
            <input type="text" id="product" required>

            <label for="minQuantity">Cantidad mínima:</label>
            <input type="number" id="minQuantity" required>

            <button type="button" onclick="consultInventory()">Consultar</button>
        </form>
        <div id="result"></div>
    </div>
    <script src="../../scripts/GerenteOp/inventario_bajo.js"></script>
</body>
</html>
