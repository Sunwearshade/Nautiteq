<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['barco_id'])) {
    $barco_id = $_GET['barco_id'];

    $query = "SELECT latitud, longitud, fecha FROM localizacion_barco WHERE barco_id = ? ORDER BY fecha DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $barco_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $localizacion = $result->fetch_assoc();
        echo json_encode($localizacion);
    } else {
        echo json_encode(["error" => "No se encontraron localizaciones para este barco."]);
    }
} else {
    echo json_encode(["error" => "No se recibió el ID del barco."]);
}
?>
