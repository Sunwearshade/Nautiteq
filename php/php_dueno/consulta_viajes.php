<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (!isset($_SESSION['dueno_id'])) {
    die("No se ha iniciado sesión como dueño.");
}

$dueno_id = $_SESSION['dueno_id'];

$query_barcos = "SELECT barco_id, denominacion FROM barcos WHERE dueno_id = ?";
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

if (isset($_GET['barco'])) {
    $barcoId = $_GET['barco'];

    $query2 = "SELECT fecha_inicio, fecha_fin, puerto_origen, pais_origen, puerto_destino, pais_destino FROM viaje WHERE barco_id = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $barcoId);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $viajes = [];
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $viajes[] = $row;
        }
    }

    $stmt2->close();
    echo json_encode([
        'denominacion' => $_GET['denominacion'], // Se puede enviar desde el front el nombre del barco
        'viajes' => $viajes
    ]);
}