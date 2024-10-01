<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Panel del Administrador</title>
    <?php
    ?>
</head>
<body>
    <header class="header">
        <h1>Panel del Administrador</h1>
        <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>
    </header>

    <main class="container">
        <div class="button-group">
            <button class="button" onclick="window.location.href='registro/dueno.php'">Registrar Dueño</button>
            <button class="button" onclick="window.location.href='registro/empleado.php'">Registrar Empleado (Supervisor de carga)</button>
            <button class="button" onclick="window.location.href='registro/gerente_operaciones.php'">Registrar Gerente de Operaciones</button>
            <button class="button" onclick="window.location.href='registro/gerente_financiero.php'">Registrar Gerente Financiero</button>
            <button class="button" onclick="window.location.href='modificar_usuario.php'">Modificar Usuario</button>
            <button id="eliminar-usuario-btn" onclick="openModal()">Eliminar Usuario</button>
        </div>
    </main>

    <div id="modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Confirmar Eliminación</h2>
            <label for="userId">Buscar usuario por ID:</label>
            <input type="text" id="userId" name="userId" placeholder="Ingrese ID de usuario">
            <button class="button" onclick="searchUser()">Buscar</button>
            <p id="userFound" style="display:none;">Usuario encontrado: ID <span id="userIdFound"></span></p>
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <div class="modal-button-group">
                <button class="button" id="confirmDeleteBtn" onclick="confirmDelete()" disabled>Confirmar eliminación</button>
                <button class="button" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
    </div>
    
    </div>

    <script src="../../scripts/ScriptsAdmin/dashboard.js"></script> 
</body>
</html>
