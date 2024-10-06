<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Modificar Productos</title>
</head>
<body>
    <div class="header">
        <h1>Modificar Productos</h1>
    </div>
    <div class="container">
        <form id="modificarProducto" onsubmit="guardarCambios(event)">
            <div class="input-group">
                <label for="productoSeleccionado">Seleccionar Producto</label>
                <select id="productoSeleccionado" onchange="cargarDatosProducto()">
                    <option value="">Seleccione...</option>
                    <option value="producto1">Producto 1</option>
                    <option value="producto2">Producto 2</option>
                </select>
            </div>
            <div class="input-group" id="datosProducto" style="display:none;">
                <label for="nombreProducto">Nombre del Producto</label>
                <input type="text" id="nombreProducto" required>
                <label for="nomenclatura">Nomenclatura</label>
                <input type="text" id="nomenclatura" required>
                <label for="tipoProducto">Tipo</label>
                <select id="tipoProducto" required>
                    <option value="primario">Producto Primario</option>
                    <option value="manufactura">Manufactura</option>
                </select>
            </div>
            <button type="submit" class="button">Guardar Cambios</button>
        </form>
    </div>

    <script src="../../scripts/ScriptSupervisor/modificar_producto.js">
    </script>
</body>
</html>
