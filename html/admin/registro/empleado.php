<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Registrar Empleado</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_admin/registro_empleado.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Registrar Empleado</h1>
    </div>
    <div class="container">
        <form id="registroEmpleado" name="registroEmpleado" method="post">
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
            <div class="input-group">
                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" required>
            </div>
            <div class="input-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="input-group">
                <label for="legajo">Legajo</label>
                <input type="text" id="legajo" name="legajo" required>
            </div>
            <button type="submit" class="button" name="registroEmpleado">Guardar</button>
        </form>
    </div>

    </script>
</body>
</html>
