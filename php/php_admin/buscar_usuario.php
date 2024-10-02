<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['username'])) {
    $username = trim($_GET['username']);

    if (empty($username)) {
        echo json_encode(['error' => 'Nombre de usuario no puede estar vacío.']);
        exit;
    }

    $query = "SELECT username FROM users WHERE username LIKE ?";
    $username = "%$username%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['username' => $user['username']]);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado.']);
    }
} else {
    echo json_encode(['error' => 'Solicitud no válida.']);
}

$conn->close();
?>
