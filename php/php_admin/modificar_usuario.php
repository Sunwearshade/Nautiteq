<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';


if (isset($_GET['rol'])) {
    // Script para cargar los usuarios basados en el rol seleccionado
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
            exit; // Detenemos el script si el rol no es válido
    }

    $result = $conn->query($query);

    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    echo json_encode($usuarios);

} elseif (isset($_GET['username']) && isset($_GET['rol'])) {
    // Script para autocompletar los datos de un usuario basado en el rol y el username
    $username = $_GET['username'];
    $rol = $_GET['rol'];
    $query = "";

    switch ($rol) {
        case 'dueno':
            $query = "SELECT nombre_dueno AS nombre, apaterno_dueno AS apellidoPaterno, amaterno_dueno AS apellidoMaterno
                      FROM dueno WHERE username_dueno = ?";
            break;
        case 'empleado':
            $query = "SELECT u.username, e.nombre_empleado AS nombre, e.apaterno_empleado AS apellidoPaterno, e.amaterno_empleado AS apellidoMaterno
                      FROM empleado e JOIN users u ON e.username_empleado = u.username WHERE u.username = ?";
            break;
        case 'gerenteOperaciones':
            $query = "SELECT u.username, g.nombre_gerente AS nombre, g.apaterno_gerente AS apellidoPaterno, g.amaterno_gerente AS apellidoMaterno
                      FROM gerente_op g JOIN users u ON g.username_gerente = u.username WHERE u.username = ?";
            break;
        case 'gerenteFinanciero':
            $query = "SELECT u.username, gf.nombre_gerentef AS nombre, gf.apaterno_gerentef AS apellidoPaterno, gf.amaterno_gerentef AS apellidoMaterno
                      FROM gerente_financiero gf JOIN users u ON gf.username_gerentef = u.username WHERE u.username = ?";
            break;
        default:
            echo json_encode(['error' => 'Rol no válido']);
            exit; // Detenemos el script si el rol no es válido
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username); // Cambiado a 's' para bindear como string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        echo json_encode([]); // No se encontró el usuario
    }
}

$conn->close();
