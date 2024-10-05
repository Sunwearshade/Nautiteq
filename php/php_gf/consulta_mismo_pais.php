<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if(isset($_GET['pais'])){
    $pais = $_GET['pais'];
    $query = "SELECT fecha_inicio, fecha_fin, puerto_origen, pais_origen, puerto_destino, pais_destino FROM viaje WHERE pais_origen = ? AND pais_destino = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $pais, $pais);
    $stmt->execute();
    $result = $stmt->get_result();

    $viajes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $viajes[] = $row;
        }
    }

    $stmt->close();
    echo json_encode([
        'viajes' => $viajes
    ]);

}

