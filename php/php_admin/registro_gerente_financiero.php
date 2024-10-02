<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

function cleanInput($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

if (isset($_POST['registroGerenteFinanciero'])) {
    $username = $_POST['username'];
    $password= $_POST['password'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];

    if (!empty($username) && !empty($password) && !empty($nombre) && !empty($apaterno) && !empty($amaterno)) {
        $query = "INSERT INTO gerente_financiero (nombre_gerentef, apaterno_gerentef, amaterno_gerentef, username_gerentef) VALUES (?, ?, ?, ?)";
        $query2 = "INSERT INTO users (username, password, role) VALUES (?, ?, 'gerente_financiero')";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $nombre, $apaterno, $amaterno, $username);
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ss", $username, $password);

        if ($stmt->execute() && $stmt2->execute()) {
            echo "<script>
                        alert('Se ha agregado al gerente financiero con éxito.');
                        window.location.href = '/nautiteq/html/admin/registro/gerente_financiero.php';</script>;
                </script>";
        } else {
            echo "Error al insertar al gerente financiero: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}