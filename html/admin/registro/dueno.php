<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Dueño</title>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_admin/registro_dueno.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Dueño</h1>
    </div>
    <div class="container">
        <form id="registroDueno" name="registroDueno" method="post">
            <div class="input-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username_dueno" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="text" id="password" name="password_dueno" required>
            </div>
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre_dueno" required>
            </div>
            <div class="input-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" id="apellidoPaterno" name="apaterno_dueno" required>
            </div>
            <div class="input-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" id="apellidoMaterno" name="amaterno_dueno" required>
            </div>
            <div class="input-group">
                <label for="tipoDocumento">Tipo de Documento</label>
                <input type="text" id="tipoDocumento" name="tipo_doc" required>
            </div>
            <div class="input-group">
                <label for="numeroDocumento">Número de Documento</label>
                <input type="text" id="numeroDocumento" name="num_doc" required>
            </div>
            <button type="submit" class="button" name="registroDueno">Guardar</button>
        </form>
    </div>

    <script src="../../../scripts/ScriptsAdmin/dueno.js">
    </script>
</body>
</html>
