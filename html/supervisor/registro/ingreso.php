<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Ingreso</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_supervisor/registrar_ingreso.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Ingreso</h1>
    </div>
    <div class="container">
        <form id="registroIngreso" name="registrarIngreso" method="post">
            <div class="input-group">
                <label for="productoSeleccionado">Seleccionar Producto:</label>
                <select id="productoSeleccionado" name="productoSeleccionado">
                    <option value="">Seleccione...</option>
                    <?php
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                            echo "<option value='" . $producto['producto_id'] . "'>" . $producto['nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay productos registrados</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label for="bodegaSeleccionada">Seleccionar Bodega:</label>
                <select id="bodegaSeleccionada" name="bodegaSeleccionada">
                    <option value="">Seleccione...</option>
                    <?php
                    if (!empty($bodegas)) {
                        foreach ($bodegas as $bodega) {
                            echo "<option value='" . $bodega['bodega_id'] . "'>" . $bodega['nombre_bodega'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay bodegas registradas.</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" required>
            </div>
            <div>
                <label for="fechaIngreso">Fecha de Ingreso</label><br>
                <input type="date" id="fechaIngreso" name="fechaIngreso" required>
            </div>
            <button type="submit" class="button" name="registrarIngreso">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/scriptsDueno/viaje.js">
    </script>
</body>
</html>
