<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_POST['registroDueno'])) {
    $username = $_POST['username_dueno'];
    $password_dueno = $_POST['password_dueno'];
    $nombre_dueno = $_POST['nombre_dueno'];
    $apaterno_dueno = $_POST['apaterno_dueno'];
    $amaterno_dueno = $_POST['amaterno_dueno'];
    $tipo_doc = $_POST['tipo_doc'];
    $num_doc = $_POST['num_doc'];

    if (!empty($username) && !empty($password_dueno) && !empty($nombre_dueno) && !empty($apaterno_dueno) && !empty($amaterno_dueno) && !empty($tipo_doc) && !empty($num_doc)) {
        $query = "INSERT INTO dueno (nombre_dueno, apaterno_dueno, amaterno_dueno, username_dueno, tipo, n_documento ) VALUES (?, ?, ?, ?, ?, ?)";
        $query2 = "INSERT INTO users (username, password, role) VALUES (?, ?, 'dueno')";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $nombre_dueno, $apaterno_dueno, $amaterno_dueno, $username, $tipo_doc, $num_doc);
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ss", $username, $password_dueno);

        if ($stmt->execute() && $stmt2->execute()) {
            echo "<script>
                        alert('Se ha agregado al dueño con éxito.');
                        window.location.href = '/nautiteq/html/admin/registro/dueno.php';</script>;
                </script>";
        } else {
            echo "Error al insertar al dueño: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}