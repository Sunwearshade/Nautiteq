<?php
require 'conn_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

 
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if ($password === $user['password']) {  
          
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

        
            if ($user['role'] === 'administrador') {
                $_SESSION['admin_id'] = $user['admin_id'];
                $_SESSION['admin_nombre'] = $user['nombre_admin'];

                
                header("Location: html/admin/dashboard.php");
                exit();
            } 
            else if ($user['role'] === 'dueno') {
                $query_dueno = "SELECT * FROM dueno WHERE username_dueno = ?";
                $stmt2 = $conn->prepare($query_dueno);

                if ($stmt2 === false) {
                    die("Error al preparar la consulta: " . $conn->error);
                }

                $stmt2->bind_param("s", $username);
                $stmt2->execute();
                $result_dueno = $stmt2->get_result();

                if ($result_dueno->num_rows === 1) {
                    $user_dueno = $result_dueno->fetch_assoc();
                    $_SESSION['dueno_id'] = $user_maestro['dueno_id'];
                    $_SESSION['dueno_nombre'] = $user_maestro['nombre_dueno'];
                } else {
                    die("Error al obtener ID del dueño.");
                }

                $stmt2->close();
           
                header("Location: html/dueño/dashboard.php");
                exit();
            } 
            else if ($user['role'] === 'gerente_financiero') {
                $query_gf = "SELECT * FROM gerente_financiero WHERE username_gerentef = ?";
                $stmt3 = $conn->prepare($query_gf);

                if ($stmt3 === false) {
                    die("Error al preparar la consulta: " . $conn->error);
                }

                $stmt3->bind_param("s", $username);
                $stmt3->execute();
                $result_gf = $stmt3->get_result();

                if ($result_gf->num_rows === 1) {
                    $user_gf = $result_gf->fetch_assoc();
                    $_SESSION['gerentef_id'] = $user_gf['gerentef_id'];
                    $_SESSION['nombre_gerentef'] = $user_gf['nombre_gerentef'];
                } else {
                    die("Error al obtener ID del gerente financiero.");
                }

                $stmt3->close();
      
                header("Location: html/gerente_financiero/dashboard.php");
                exit();
            } 
            else if ($user['role'] === 'gerente_op') {
                $query_gp = "SELECT * FROM gerente_op WHERE username_gerente = ?";
                $stmt4 = $conn->prepare($query_gp);

                if ($stmt4 === false) {
                    die("Error al preparar la consulta: " . $conn->error);
                }

                $stmt4->bind_param("s", $username);
                $stmt4->execute();
                $result_gp = $stmt4->get_result();

                if ($result_gp->num_rows === 1) {
                    $user_gp = $result_gp->fetch_assoc();
                    $_SESSION['gerente_id'] = $user_gp['gerente_id'];
                    $_SESSION['dueno_nombre'] = $user_gp['nombre_gerente'];
                } else {
                    die("Error al obtener ID del gerente de operaciones.");
                }

                $stmt4->close();
            
                header("Location: html/gerente_operaciones/dashboard.php");
                exit();
            } 
            else if ($user['role'] === 'supervisor') {
                $query_supervisor = "SELECT * FROM supervisor WHERE username_supervisor = ?";
                $stmt5 = $conn->prepare($query_supervisor);

                if ($stmt5 === false) {
                    die("Error al preparar la consulta: " . $conn->error);
                }

                $stmt5->bind_param("s", $username);
                $stmt5->execute();
                $result_supervisor = $stmt5->get_result();

                if ($result_supervisor->num_rows === 1) {
                    $user_supervisor = $result_supervisor->fetch_assoc();
                    $_SESSION['supervisor_id'] = $user_supervisor['supervisor_id'];
                    $_SESSION['nombre_supervisor'] = $user_supervisor['nombre_supervisor'];
                } else {
                    die("Error al obtener ID del supervisor.");
                }

                $stmt5->close();
            
                header("Location: html/supervisor/dashboard.php");
                exit();
            } 

        } else {
            echo "<script>alert('Contraseña incorrecta.');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
