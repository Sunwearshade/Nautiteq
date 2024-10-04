<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

session_start();

if (!isset($_SESSION['dueno_id'])) {
    die("No se ha iniciado sesión como dueño.");
}

$dueno_id = $_SESSION['dueno_id'];

if (isset($_GET['barco'])) {
    $barco_id = $_GET['barco'];

    $query = "SELECT * FROM barcos WHERE barco_id = ? AND dueno_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $barco_id, $dueno_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $barco = $result->fetch_assoc();
        echo json_encode($barco);
    } else {
        echo json_encode(['error' => 'Barco no encontrado']);
    }

} else {
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
}

if (isset($_POST['modificarBarco']) && isset($_POST['denominacion']) && isset($_POST['barcoId'])){
    $denominacion = $_POST['denominacion'];
    $pais_registro = $_POST['paisRegistro'];
    $barco_id = $_POST['barcoId'];

    if (!empty($denominacion) && !empty($pais_registro) && !empty($barco_id)) {
        $query = "UPDATE barcos SET denominacion = ?, pais_registro = ? WHERE barco_id = ? AND dueno_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $denominacion, $pais_registro, $barco_id, $dueno_id);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha modificado el barco con éxito.');
                        window.location.href = '/nautiteq/html/dueño/modificar_barco.php';</script>;
                </script>";
        } else {
            echo "Error al modificar el barco: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}

$conn->close();
