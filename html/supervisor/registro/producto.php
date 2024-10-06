<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Producto</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_supervisor/registro_productos.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Producto</h1>
    </div>
    <div class="container">
        <form id="registroProducto" name="registrarProducto" method="post">
            <div class="input-group">
                <label for="nombreProducto">Nombre del Producto</label>
                <input type="text" id="nombreProducto" name="nombreProducto" required>
            </div>
            <div class="input-group">
                <label for="nomenclatura">Nomenclatura</label>
                <input type="text" id="nomenclatura" name="nomenclatura" required>
            </div>
            <div class="input-group">
                <label for="tipoProducto">Tipo</label>
                <select id="tipoProducto" name="tipoProducto" required>
                    <option value="Producto primario">Producto Primario</option>
                    <option value="Manufactura">Manufactura</option>
                </select>
            </div>
            <button type="submit" class="button" name="registrarProducto">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/ScriptSupervisor/producto.js">
    </script>
</body>
</html>
