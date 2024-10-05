<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['denominacion'])) {
    $denominacion = trim($_GET['denominacion']);

    if (empty($denominacion)) {
        echo json_encode(['error' => 'Denominación no puede estar vacío.']);
        exit;
    }

    $query = "SELECT barco_id, denominacion FROM barcos WHERE denominacion LIKE ?";
    $denominacion = "%$denominacion%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $denominacion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $barco = $result->fetch_assoc();
        echo json_encode(['denominacion' => $barco['denominacion'], 'barco_id' => $barco['barco_id']]);
    } else {
        echo json_encode(['error' => 'Barco no encontrado.']);
    }
} else {
    echo json_encode(['error' => 'Solicitud no válida.']);
}

$conn->close();
?>
