<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Panel del Dueño</title>
</head>
<body>
    <header class="header">
        <h1>Panel del Dueño</h1>
    </header>

    <main class="container">
        <div class="button-group">
            <button class="button" onclick="window.location.href='registro/barco.php'">Registrar Barco</button>
            <button class="button" onclick="window.location.href='registro/historial_viajes.php'">Ver Historial de Viajes</button>
            <button class="button" onclick="window.location.href='registro/viaje.php'">Registrar Viaje</button>
            <button class="button" onclick="window.location.href='registro/localizacion_gps.php'">Localización GPS</button>
            <button class="button" onclick="window.location.href='barcos.php'">Ver Barcos Registrados</button>
            <button class="button" onclick="window.location.href='modificar_barco.php'">Modificar Barco</button>
            <button class="button" onclick="confirmarEliminacion()">Eliminar Barco</button>
        </div>
    </main>

    <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>

    <div id="modalConfirmacion" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <p>¿Está seguro de que desea eliminar el barco seleccionado?</p>
            <button class="button" onclick="eliminarBarco()">Confirmar Eliminación</button>
        </div>
    </div>

    <script src="../../scripts/scriptsDueno/dashboard.js"></script>
</body>
</html>
