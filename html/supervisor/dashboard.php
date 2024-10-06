<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Panel del Supervisor de Carga</title>
</head>
<body>
    <header class="header">
        <h1>Panel del Supervisor de Carga</h1>
    </header>

    <main class="container">
        <div class="button-group">
            <button class="button" onclick="window.location.href='registro/producto.php'">Registrar Productos</button>
            <button class="button" onclick="window.location.href='registro/ingreso.php'">Registrar Ingreso de Productos</button>
            <button class="button" onclick="window.location.href='registro/egreso.php'">Registrar Egreso de Productos</button>
            <button class="button" onclick="window.location.href='modificar_registro.php'">Modificar Registros</button>
            <button class="button" onclick="confirmarEliminacion()">Eliminar Registros</button>
        </div>
    </main>

    <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>

    <div id="modalConfirmacion" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <p>¿Está seguro de que desea eliminar el registro del producto seleccionado?</p>
            <button class="button" onclick="eliminarProducto()">Confirmar Eliminación</button>
        </div>
    </div>

    <script src="../../scripts/ScriptSupervisor/dashboard.js"></script>
</body>
</html>
