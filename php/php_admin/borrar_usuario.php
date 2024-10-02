<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_GET['confirmar_eliminacion'])) {
    $username = $_GET['username'];

        $delete_query = "DELETE FROM users WHERE username = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                    alert('Se ha eliminado el usuario.');
                    window.location.href = '/nautiteq/html/admin/dashboard.php';
                  </script>";
        } else {
            echo "No se encontró el usuario o no se pudo eliminar.";
        }
        $stmt->close();
    }
