<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_POST['registroPuerto'])) {
    $nombre = $_POST['nombrePuerto'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];

    if (!empty($nombre) && !empty($latitud) && !empty($longitud)) {
        $query = "INSERT INTO puertos (nombre_puerto, latitud, longitud) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sdd", $nombre, $latitud, $longitud);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado el puerto con éxito.');
                        window.location.href = '/nautiteq/html/admin/registro/puerto.php';</script>;
                </script>";
        } else {
            echo "Error al insertar el puerto: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}