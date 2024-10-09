<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/conn_db.php';

$query_puertos = "SELECT nombre_puerto AS nombre, puerto_id, latitud, longitud FROM puertos";
$stmt = $conn->prepare($query_puertos);
$stmt->execute();
$result = $stmt->get_result();

$puertos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $puertos[] = $row;
    }
}

$stmt->close();
function haversine($lat1, $lon1, $lat2, $lon2) {
    $earth_radius = 6371; // Radio de la Tierra en kilómetros

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) +
         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
         sin($dLon / 2) * sin($dLon / 2);
         
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earth_radius * $c;

    return $distance; // Retorna la distancia en kilómetros
}
    if (isset($_POST['puerto_id']) && isset($_POST['fecha'])) {
        $puerto_id = $_POST['puerto_id'];
        $fecha_seleccionada = $_POST['fecha'];

        // Obtener las coordenadas del puerto seleccionado
        $query_puerto = "SELECT latitud, longitud FROM puertos WHERE puerto_id = ?";
        $stmt = $conn->prepare($query_puerto);
        $stmt->bind_param("i", $puerto_id);
        $stmt->execute();
        $result_puerto = $stmt->get_result();
        $puerto = $result_puerto->fetch_assoc();
        $stmt->close();

        if ($puerto) {
            $latitud_puerto = $puerto['latitud'];
            $longitud_puerto = $puerto['longitud'];

            // Obtener las localizaciones de los barcos en la fecha seleccionada
            $query_barcos = "SELECT l.barco_id, l.latitud, l.longitud, l.fecha, b.denominacion, d.nombre_dueno AS dueno
                            FROM localizacion_barco l
                            JOIN barcos b ON l.barco_id = b.barco_id
                            JOIN dueno d ON b.dueno_id = d.dueno_id
                            WHERE l.fecha = ?";
            $stmt = $conn->prepare($query_barcos);
            $stmt->bind_param("s", $fecha_seleccionada);
            $stmt->execute();
            $result_barcos = $stmt->get_result();

            $barco_cercano = null;
            $distancia_minima = PHP_FLOAT_MAX;

            while ($barco = $result_barcos->fetch_assoc()) {
                $latitud_barco = $barco['latitud'];
                $longitud_barco = $barco['longitud'];

                // Calcular la distancia entre el puerto y el barco
                $distancia = haversine($latitud_puerto, $longitud_puerto, $latitud_barco, $longitud_barco);

                // Verificar si es la distancia mínima
                if ($distancia < $distancia_minima) {
                    $distancia_minima = $distancia;
                    $barco_cercano = $barco;
                }
            }

            $stmt->close();

            // Devolver la información del barco más cercano
            if ($barco_cercano) {
                echo json_encode([
                    'nombre_barco' => $barco_cercano['denominacion'],
                    'dueno' => $barco_cercano['dueno'],
                    'latitud' => $barco_cercano['latitud'],
                    'longitud' => $barco_cercano['longitud'],
                ]);
            } else {
                echo json_encode(['error' => 'No se encontraron barcos en esa fecha.']);
            }
        } else {
            echo json_encode(['error' => 'Puerto no encontrado.']);
        }
    } else{
        echo json_encode(['puertos' => $puertos]);
    }
