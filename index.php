<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
    <?php
    require 'php/login.php'
    ?>
</head>
<body>
    <div class="header">
        <h1>Iniciar Sesión</h1>
    </div>
    <div class="container">
        <form id="loginForm" method="post">
            <div class="input-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button">Iniciar Sesión</button>
        </form>
    </div>

   
</body>
</html>
