<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Consulta de Inventario Bajo</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_go/consulta_inventario.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Consultar Inventario Bajo</h1>
    </div>
    <div class="container">
        <form id="inventoryForm" name="consultarInventario" method="post">
            <label for="country">País:</label>
            <input type="text" id="country" name="pais" required>

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

            <label for="minQuantity">Cantidad mínima:</label>
            <input type="number" id="minQuantity" name="cantidadMinima" required>

            <button type="submit" onclick="consultarInventario()">Consultar</button>
        </form>
        <div id="result">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pais = $_POST['pais'];
            $productoSeleccionado = $_POST['productoSeleccionado'];
            $cantidadMinima = $_POST['cantidadMinima'];

            if (empty($pais) || empty($productoSeleccionado) || empty($cantidadMinima)) {
                echo "<script>alert('Todos los campos son requeridos.')</script>";
            } else {
                $query = "SELECT fecha_ingreso, cantidad 
                            FROM registro_productos 
                            WHERE producto_id = ? AND cantidad < ? AND pais = ? AND fecha_ingreso IS NOT NULL AND tipo = 'ingreso'";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("iis", $productoSeleccionado, $cantidadMinima, $pais);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($registro = $result->fetch_assoc()) {
                        echo "<br>Fecha de ingreso: " . $registro['fecha_ingreso'] . ", Cantidad: " . $registro['cantidad'] . "<br>";
                    }
                } else {
                    echo "<br>No se encontraron registros que coincidan con los criterios.";
                }

                $stmt->close();
            }
            }
            ?>
        </div>
    </div>
</body>
</html>
