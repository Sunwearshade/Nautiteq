<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';



if (isset($_GET['rol']) &&  !isset($_GET['username'])) {
    $rol = $_GET['rol'];
    $query = "";
    switch ($rol) {
        case 'dueno':
            $query = "SELECT dueno_id as id, username_dueno as username FROM dueno";
            break;
        case 'empleado':
            $query = "SELECT empleado_id as id, username_empleado as username FROM empleado";
            break;
        case 'gerenteOperaciones':
            $query = "SELECT gerente_id as id, username_gerente as username FROM gerente_op";
            break;
        case 'gerenteFinanciero':
            $query = "SELECT gerentef_id as id, username_gerentef as username FROM gerente_financiero";
            break;
        default:
            echo json_encode(['error' => 'Rol no válido']);
            exit;
    }

    $result = $conn->query($query);

    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    echo json_encode($usuarios);

}
else if (isset($_GET['username']) && isset($_GET['rol'])) {
    $username = $_GET['username'];
    $rol = $_GET['rol'];
    $query = "";
    

    switch ($rol) {
        case 'dueno':
            $query = "SELECT nombre_dueno AS nombre, apaterno_dueno AS apellidoPaterno, amaterno_dueno AS apellidoMaterno FROM dueno WHERE username_dueno = ?";
            break;
        case 'empleado':
            $query = "SELECT nombre_empleado AS nombre, apaterno_empleado AS apellidoPaterno, amaterno_empleado AS apellidoMaterno FROM empleado WHERE username_empleado = ?";
            break;
        case 'gerenteOperaciones':
            $query = "SELECT nombre_gerente AS nombre, apaterno_gerente AS apellidoPaterno, amaterno_gerente AS apellidoMaterno FROM gerente_op WHERE username_gerente = ?";
            break;
        case 'gerenteFinanciero':
            $query = "SELECT nombre_gerentef AS nombre, apaterno_gerentef AS apellidoPaterno, amaterno_gerentef AS apellidoMaterno FROM gerente_financiero WHERE username_gerentef = ?";
            break;
        default:
            echo json_encode(['error' => 'Rol no válido']);
            exit;
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
} 
else if (isset($_POST['modificarUsuario']) && isset($_POST['listaUsuarios']) && isset($_POST['rolOculto'])){
    $username = $_POST['listaUsuarios'];
    $rol = $_POST['rolOculto'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];

    if (!empty($nombre) && !empty($apaterno) && !empty($amaterno)) {
        switch ($rol){
            case 'dueno':
                $query = "UPDATE dueno SET nombre_dueno = ?, apaterno_dueno = ?, amaterno_dueno = ? WHERE username_dueno = ?";
                break;
            case 'empleado':
                $query = "UPDATE empleado SET nombre_empleado = ?, apaterno_empleado = ?, amaterno_empleado = ? WHERE username_empleado = ?";
                break;
            case 'gerenteOperaciones':
                $query = "UPDATE gerente_op SET nombre_gerente = ?, apaterno_gerente = ?, amaterno_gerente = ? WHERE username_gerente = ?";
                break;
            case 'gerenteFinanciero':
                $query = "UPDATE gerente_financiero SET nombre_gerentef = ?, apaterno_gerentef = ?, amaterno_gerentef = ? WHERE username_gerentef = ?";
                break;
            default:
                echo json_encode(['error' => 'Rol no válido']);
                exit;
        }

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $nombre, $apaterno, $amaterno, $username);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha modificado al usuario con éxito.');
                        window.location.href = '/nautiteq/html/admin/modificar_usuario.php';</script>;
                </script>";
        } else {
            echo "Error al modificar el usuario: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}


$conn->close();
