<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

function cleanInput($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

if (isset($_POST['registroGerente'])) {
    $username = $_POST['username'];
    $password= $_POST['password'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];

    if (!empty($username) && !empty($password) && !empty($nombre) && !empty($apaterno) && !empty($amaterno)) {
        $query = "INSERT INTO gerente_op(nombre_gerente, apaterno_gerente, amaterno_gerente, username_gerente) VALUES (?, ?, ?, ?)";
        $query2 = "INSERT INTO users (username, password, role) VALUES (?, ?, 'gerente_op')";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $nombre, $apaterno, $amaterno, $username);
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ss", $username, $password);

        if ($stmt->execute() && $stmt2->execute()) {
            echo "<script>
                        alert('Se ha agregado al gerente de operaciones con éxito.');
                        window.location.href = '/nautiteq/html/admin/registro/gerente_operaciones.php';</script>;
                </script>";
        } else {
            echo "Error al insertar al gerente de operaciones: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}