<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_POST['guardarLocalizacion'])) {
    $barco_id = $_POST['nombreBarco'];
    $fecha_hora = date('Y-m-d H:i:s', strtotime($_POST['fechaHora']));
    $latitud = $_POST['latitud'];
    $longitud= $_POST['longitud'];

    if (!empty($barco_id) && !empty($fecha_hora) && !empty($latitud) && !empty($longitud)) {
        $query = "INSERT INTO localizacion_barco(barco_id, latitud, longitud, fecha_hora) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("idds", $barco_id, $latitud, $longitud, $fecha_hora);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha guardado la localización con éxito.');
                        window.location.href = '/nautiteq/html/dueño/registro/localizacion_gps.php';</script>;
                </script>";
        } else {
            echo "Error al insertar: " . $conn->error;
        }
    } else {
        echo '<script>alert("Falta algún parámetro de localización.");</script>';
    }
}