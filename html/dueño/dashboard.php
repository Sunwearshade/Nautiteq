<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../scripts/scriptsDueno/dashboard.js" defer></script>
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
            <button class="button" onclick="openModal()">Eliminar Barco</button>
        </div>
    </main>

    <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>

    <div id="modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Confirmar Eliminación de Barco</h2>
            <label for="userId">Buscar barco por denominación:</label>
            <input type="text" id="denominacion" name="denominacion" placeholder="Ingrese la denominación del barco"><br>
            <br><button class="button" id="searchButton" onclick="buscarBarco()">Buscar</button>
            <br><p id="boatFound"></p>
            <p>¿Estás seguro de que deseas eliminar este barco?</p>
            <div class="modal-button-group">
                <button class="button" id="confirmDeleteBtn" onclick="handleConfirmDelete(document.getElementById('boatFound').value)" disabled>Confirmar eliminación</button>
                <button class="button" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
