<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

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
        echo json_encode([
            'registro_id' => $registro['registro_id'],
            'nombre_producto' => $registro['nombre_producto'],
            'nombre_bodega' => $registro['nombre_bodega'],
            'cantidad' => $registro['cantidad'],
            'fecha_registro' => $registro['fecha_registro']
        ]);
    } else {
        echo json_encode(['error' => 'Registro no encontrado']);
    }

    $stmt->close();
}

$conn->close();

