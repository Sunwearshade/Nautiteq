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

$stmt->close();

if (isset($_POST['registrarBodega'])) {
    $barco_id = $_POST['barcoSeleccionado'];
    $nombre_bodega = $_POST['nombreBodega'];

    if (!empty($barco_id) && !empty($nombre_bodega)) {
        $query = "INSERT INTO bodegas(nombre_bodega, barco_id) VALUES (?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $nombre_bodega, $barco_id);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado la bodega con éxito.');
                        window.location.href = '/nautiteq/html/dueño/registro/bodega.php';</script>;
                </script>";
        } else {
            echo "Error al insertar la bodega: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}