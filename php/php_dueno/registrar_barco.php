<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_POST['registrarBarco'])) {
    $denominacion = $_POST['denominacion'];
    $pais_registro = $_POST['paisRegistro'];
    $dueno_id = $_SESSION['dueno_id'];

    if (!empty($denominacion) && !empty($pais_registro)) {
        $query = "INSERT INTO barcos(denominacion, pais_registro, dueno_id) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $denominacion, $pais_registro, $dueno_id);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado el barco con éxito.');
                        window.location.href = '/nautiteq/html/dueño/registro/barco.php';</script>;
                </script>";
        } else {
            echo "Error al insertar el barco: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}