<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Barcos Registrados</title>
    <?php 
        require_once '../../php/php_dueno/consulta_barco.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Barcos Registrados</h1>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Denominación</th>
                    <th>País de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($barcos)) {
                        foreach ($barcos as $barco) {
                            echo "<tr>
                                    <td>" . $barco['denominacion'] . "</td>
                                    <td>" . $barco['pais_registro'] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                    <td> N.A. </td>
                                    <td> N.A. </td>
                                </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
