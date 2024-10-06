<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

$query_productos = "SELECT nombre, producto_id FROM productos";
$stmt = $conn->prepare($query_productos);
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$stmt->close();

$query_bodegas = "SELECT nombre_bodega, bodega_id FROM bodegas";
$stmt = $conn->prepare($query_bodegas);
$stmt->execute();
$result = $stmt->get_result();

$bodegas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bodegas[] = $row;
    }
}

$stmt->close();

if (isset($_POST['registrarEgreso'])) {
    $producto = $_POST['productoSeleccionado'];
    $bodega = $_POST['bodegaSeleccionada'];
    $cantidad = $_POST['cantidad'];
    $fecha_egreso = $_POST['fechaEgreso'];
    $fecha_registro = date('Y-m-d H:i:s');

    if (!empty($producto) && !empty($bodega) && !empty($cantidad) && !empty($fecha_egreso)) {
        $query = "INSERT INTO egreso_productos(producto_id, bodega_id, cantidad, fecha_egreso, fecha_registro) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiiss", $producto, $bodega, $cantidad, $fecha_egreso, $fecha_registro);
        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado el egreso de producto con éxito.');
                        window.location.href = '/nautiteq/html/supervisor/registro/egreso.php';</script>;
                </script>";
        } else {
            echo "Error al insertar: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}
