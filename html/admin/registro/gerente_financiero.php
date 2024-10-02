<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Gerente Financiero</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_admin/registro_gerente_financiero.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Gerente Financiero</h1>
    </div>
    <div class="container">
        <form id="registroGerenteFinanciero" name="registroGerenteFinanciero" method="post">
            <div class="input-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" id="apellidoPaterno" name="apaterno" required>
            </div>
            <div class="input-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" id="apellidoMaterno" name="amaterno" required>
            </div>
            <button type="submit" class="button" name="registroGerenteFinanciero">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/ScriptsAdmin/gerentefinanciero.js">
    </script>
</body>
</html>
