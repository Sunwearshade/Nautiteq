<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['barco_id'])) {
    $barco_id = $_GET['barco_id'];

    $latitud = rand(-9000000, 9000000) / 100000;
    $longitud = rand(-18000000, 18000000) / 100000;
    $fecha_hora = date('d/m/Y H:i:s');

    echo json_encode([
        'nombre' => "Barco $barco_id", // Simulación del nombre
        'latitud' => $latitud,
        'longitud' => $longitud,
        'fecha_hora' => $fecha_hora
    ]);
}
