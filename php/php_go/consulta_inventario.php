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




