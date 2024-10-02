<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Barco</title>
    <?php
        session_start();
        $dueno_id = $_SESSION['dueno_id'];
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/registrar_barco.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Barco</h1>
    </div>
    <div class="container">
        <form id="registroBarco" name="registroBarco" method="post">
            <div class="input-group">
                <label for="denominacion">Denominación</label>
                <input type="text" id="denominacion" name="denominacion" required>
            </div>
            <div class="input-group">
                <label for="paisRegistro">País de Registro</label>
                <input type="text" id="paisRegistro" name="paisRegistro" required>
            </div>
            <button type="submit" class="button" name="registrarBarco">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/scriptsDueno/barcos.js">
    </script>
</body>
</html>
