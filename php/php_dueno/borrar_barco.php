<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['confirmar_eliminacion'])) {
    $barco_id = $_GET['barco_id'];
    $dueno_id = $_SESSION['dueno_id'];

    $delete_viajes_query = "DELETE FROM viaje WHERE barco_id = ?";
    $stmt = $conn->prepare($delete_viajes_query);
    $stmt->bind_param("i", $barco_id);
    $stmt->execute();

    $delete_barco_query = "DELETE FROM barcos WHERE barco_id = ? AND dueno_id = ?";
    $stmt = $conn->prepare($delete_barco_query);
    $stmt->bind_param("ii", $barco_id, $dueno_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>
                alert('Se ha eliminado el barco y sus viajes asociados.');
                window.location.href = '/nautiteq/html/dueño/dashboard.php';
              </script>";
    } else {
        echo "No se encontró el barco o no se pudo eliminar.";
    }

    $stmt->close();
}

$conn->close();
