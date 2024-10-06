<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

$dueno_id = $_SESSION['dueno_id'];

$query = "SELECT barco_id, denominacion FROM barcos WHERE dueno_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $dueno_id);
$stmt->execute();
$result = $stmt->get_result();

$barcos = [];
while ($row = $result->fetch_assoc()) {
    $barcos[] = $row;
}

$stmt->close();
echo json_encode(['barcos' => $barcos]);
