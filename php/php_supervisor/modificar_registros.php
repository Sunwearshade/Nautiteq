<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

$query_registros = "SELECT * FROM registro_productos";
$stmt = $conn->prepare($query_registros);
$stmt->execute();
$result = $stmt->get_result();

$registros = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $registros[] = $row;
    }
}

$stmt->close();

$query_productos = "SELECT nombre, producto_id FROM productos";
$stmt = $conn->prepare($query_productos);
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$stmt->close();

$query_bodegas = "SELECT nombre_bodega, bodega_id FROM bodegas";
$stmt = $conn->prepare($query_bodegas);
$stmt->execute();
$result = $stmt->get_result();

$bodegas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bodegas[] = $row;
    }
}

$stmt->close();

if (isset($_GET['registro'])) {
    $registro_id = $_GET['registro'];

    $query = "SELECT rp.*, p.nombre AS nombre_producto, b.nombre_bodega 
              FROM registro_productos rp
              JOIN productos p ON rp.producto_id = p.producto_id
              JOIN bodegas b ON rp.bodega_id = b.bodega_id
              WHERE registro_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $registro_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $registro = $result->fetch_assoc();
        echo json_encode($registro);
    } else {
        echo json_encode(['error' => 'Registro no encontrado']);
    }
}

if (isset($_POST['modificarRegistro'])) {
    $registro_id = $_POST['fechaRegistro'];
    $producto = $_POST['productoSeleccionado'];
    $bodega = $_POST['bodegaSeleccionada'];
    $cantidad = $_POST['cantidad'];
    $pais = $_POST['pais'];
    $fecha = $_POST['fechaIngresoEgreso'];
    $tipo = $_POST['tipo'];
    $fecha_registro = date('Y-m-d H:i:s');

    if (!empty($producto) && !empty($bodega) && !empty($cantidad) && !empty($fecha) && !empty($pais)) {
        if ($tipo === 'ingreso') {
            $query = "UPDATE registro_productos SET producto_id = ?, bodega_id = ?, cantidad = ?, pais = ?, fecha_ingreso = ?, fecha_registro = ? 
                      WHERE registro_id = ?";
        } elseif ($tipo === 'egreso') {
            $query = "UPDATE registro_productos SET producto_id = ?, bodega_id = ?, cantidad = ?, pais = ?, fecha_egreso = ?, fecha_registro = ? 
                      WHERE registro_id = ?";
        }

        if (isset($query)) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iiisssi", $producto, $bodega, $cantidad, $pais, $fecha, $fecha_registro, $registro_id);
            if ($stmt->execute()) {
                echo "<script>
                        alert('Se ha modificado el registro con éxito.');
                        window.location.href = '/nautiteq/html/supervisor/modificar_registro.php';
                      </script>";
            } else {
                echo "Error al modificar: " . $conn->error;
            }
            $stmt->close();
        } else {
            echo '<script>alert("Error: Tipo de registro inválido.");</script>';
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos.");</script>';
    }
}

