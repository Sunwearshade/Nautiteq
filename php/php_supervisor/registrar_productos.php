<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

if (isset($_POST['registrarProducto'])) {
    $nombre = $_POST['nombreProducto'];
    $nomenclatura = $_POST['nomenclatura'];
    $tipoProducto = $_POST['tipoProducto'];

    if (!empty($nombre) && !empty($nomenclatura) && !empty($tipoProducto)) {
        $query = "INSERT INTO productos(nombre, nomenclatura, tipo) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $nombre, $nomenclatura, $tipoProducto);

        if ($stmt->execute()) {
            echo "<script>
                        alert('Se ha agregado el producto con éxito.');
                        window.location.href = '/nautiteq/html/supervisor/registro/producto.php';</script>;
                </script>";
        } else {
            echo "Error al insertar el producto: " . $conn->error;
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}