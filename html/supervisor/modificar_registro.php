<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../scripts/ScriptSupervisor/modificar_registros.js" defer></script>
    <title>Modificar Registros</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_supervisor/modificar_registros.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Modificar Registros</h1>
    </div>
    <div class="container">
        <form id="modificarRegistro" name="modificarRegistro" method="post">
            <div class="input-group">
                    <label for="fechaRegistro">Seleccionar Fecha de Registro:</label>
                    <select id="fechaRegistro" name="fechaRegistro" onchange="autocompletarRegistro(this.value)">
                        <option value="">Seleccione...</option>
                        <?php
                        if (!empty($registros)) {
                            foreach ($registros as $registro) {
                                echo "<option value='" . $registro['registro_id'] . "'>" . $registro['fecha_registro'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay registros</option>";
                        }
                        ?>
                    </select>
                </div>
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
            <div class="input-group">
                <label for="pais">País</label>
                <input type="text" id="pais" name="pais" required>
            </div>
            <div>
                <label for="fechaIngresoEgreso">Fecha de Ingreso/Egreso</label><br>
                <input type="date" id="fechaIngresoEgreso" name="fechaIngresoEgreso" required>
            </div>
            <input type="hidden" id="tipo" name="tipo">
            <button type="submit" class="button" name="modificarRegistro">Guardar</button>
        </form>
    </div>
</body>
</html>
