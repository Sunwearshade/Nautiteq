<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Puerto</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_admin/registro_puerto.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Puerto</h1>
    </div>
    <div class="container">
        <form id="registroPuerto" name="registroPuerto" method="post">
            <div class="input-group">
                <label for="username">Nombre del Puerto</label>
                <input type="text" id="nombrePuerto" name="nombrePuerto" required>
            </div>
            <div class="input-group">
                <label for="latitud">Latitud</label>
                <input type="number" step="0.000000000001" id="latitud" name="latitud" required>
            </div>
            <div class="input-group">
                <label for="longitud">Longitud</label>
                <input type="number" step="0.00000000001" id="longitud" name="longitud" required>
            </div>
            <button type="submit" class="button" name="registroPuerto">Guardar</button>
        </form>
    </div>

</body>
</html>
