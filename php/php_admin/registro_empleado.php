<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

function cleanInput($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

if (isset($_POST['registroEmpleado'])) {
    $username = $_POST['username'];
    $password= $_POST['password'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $legajo = $_POST['legajo'];

    if (!empty($username) && !empty($password) && !empty($nombre) && !empty($apaterno) && !empty($amaterno) && !empty($edad) && !empty($sexo) && !empty($legajo)) {
        $query = "INSERT INTO empleado (nombre_empleado, apaterno_empleado, amaterno_empleado, username_empleado, edad, sexo, legajo ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query2 = "INSERT INTO users (username, password, role) VALUES (?, ?, 'empleado')";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssiss", $nombre, $apaterno, $amaterno, $username, $edad, $sexo, $legajo);
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ss", $username, $password);

        if ($stmt->execute() && $stmt2->execute()) {
            echo "<script>
                        alert('Se ha agregado al empleado con éxito.');
                        window.location.href = '/nautiteq/html/admin/registro/empleado.php';</script>;
                </script>";
        } else {
            echo "Error al insertar al empleado: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}