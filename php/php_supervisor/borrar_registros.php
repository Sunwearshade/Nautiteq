<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

$query_registros = "SELECT * FROM registro_productos";
$stmt = $conn->prepare($query_registros);
$stmt->execute();
$result = $stmt->get_result();

$registros = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $registros[] = $row;
    }
}

$stmt->close();

if (isset($_GET['registro'])) {
    $registro_id = $_GET['registro'];

    $query = "SELECT rp.*, p.nombre AS nombre_producto, b.nombre_bodega 
              FROM registro_productos rp
              JOIN productos p ON rp.producto_id = p.producto_id
              JOIN bodegas b ON rp.bodega_id = b.bodega_id
              WHERE registro_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $registro_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $registro = $result->fetch_assoc();
        echo json_encode($registro);
    } else {
        echo json_encode(['error' => 'Registro no encontrado']);
    }
}

if (isset($_GET['confirmar_eliminacion']) && isset($_GET['registro_id'])) {
    $registro_id = $_GET['registro_id'];

    // Eliminar el registro de la base de datos
    $delete_query = "DELETE FROM registro_productos WHERE registro_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $registro_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>
                alert('Se ha eliminado el registro correctamente.');
                window.location.href = '/nautiteq/html/supervisor/dashboard.php';
              </script>";
    } else {
        echo "No se encontró el registro o no se pudo eliminar.";
    }

    $stmt->close();
}

$conn->close();