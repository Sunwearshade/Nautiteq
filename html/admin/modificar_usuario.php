<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Modificar Usuario</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_admin/modificar_usuario.php';        
    ?>
    <script src="../../scripts/ScriptsAdmin/ModificarUsuario.js" defer></script>

</head>
<body>
    <div class="header">
        <h1>Modificar Usuario</h1>
    </div>
    <div class="container">
        <form id="modificarUsuario" onsubmit="guardarCambios(event)">
            <div class="input-group">
                <label for="usuarioSeleccionado">Seleccionar Usuario</label>
                <select id="usuarioSeleccionado" name="usuarioSeleccionado" required onchange="cargarUsuariosPorRol(this.value)">
                    <option value="">Seleccione...</option>
                    <option value="dueno">Dueño</option>
                    <option value="empleado">Empleado/Supervisor de Carga</option>
                    <option value="gerenteOperaciones">Gerente de Operaciones</option>
                    <option value="gerenteFinanciero">Gerente Financiero</option>
                </select>
            </div>
        <div class="input-group">
            <label for="listaUsuarios">Lista de Usuarios</label>
            <select id="listaUsuarios" name="listaUsuarios" onchange="autocompletarUsuario(this.value, document.getElementById('usuarioSeleccionado').value)">
                <option>Seleccione un usuario...</option>
            </select>
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
        <button type="submit" class="button" name="modificarUsuario">Guardar Cambios</button>
    </form>

    </div>
</body>
</html>
