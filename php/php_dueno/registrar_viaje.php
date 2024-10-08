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

$query_puertos = "SELECT nombre_puerto AS nombre, puerto_id FROM puertos";
$stmt = $conn->prepare($query_puertos);
$stmt->execute();
$result = $stmt->get_result();

$puertos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $puertos[] = $row;
    }
}

$stmt->close();

if (isset($_POST['registrarViaje'])) {
    $puerto_origen = $_POST['puertoOrigen'];
    $pais_origen = $_POST['paisOrigen'];
    $puerto_destino = $_POST['puertoDestino'];
    $pais_destino = $_POST['paisDestino'];
    $fecha_inicio = $_POST['fechaInicio'];
    $fecha_fin = $_POST['fechaFin'];
    $barco_id = $_POST['barcoSeleccionado'];

    if (!empty($puerto_origen) && !empty($puerto_destino) && !empty($fecha_inicio) && !empty($fecha_fin) && !empty($barco_id) && !empty($pais_destino) && !empty($pais_origen)) {
        $query = "INSERT INTO viaje(puerto_origen, pais_origen, puerto_destino, pais_destino, fecha_inicio, fecha_fin, barco_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssi", $puerto_origen, $pais_origen, $puerto_destino, $pais_destino, $fecha_inicio, $fecha_fin, $barco_id);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado el viaje con éxito.');
                        window.location.href = '/nautiteq/html/dueño/registro/viaje.php';</script>;
                </script>";
        } else {
            echo "Error al insertar el viaje: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}