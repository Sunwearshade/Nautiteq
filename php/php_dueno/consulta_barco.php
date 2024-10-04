<?php 
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (!isset($_SESSION['dueno_id'])) {
    die("No se ha iniciado sesión como dueño.");
}

$dueno_id = $_SESSION['dueno_id'];

$query_barcos = "SELECT * FROM barcos WHERE dueno_id = ?";
$stmt = $conn->prepare($query_barcos);
$stmt->bind_param("i", $dueno_id);
$stmt->execute();
$result = $stmt->get_result();

$barcos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $barcos[] = $row;
    }
}