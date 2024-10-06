<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../scripts/ScriptSupervisor/dashboard.js" defer></script>
    <title>Panel del Supervisor de Carga</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_supervisor/borrar_registros.php';
    ?>
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

    <div id="modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Confirmar Eliminación de Registro</h2>
            <label for="fechaRegistro">Seleccionar Fecha de Registro:</label>
                    <select id="fechaRegistro" name="fechaRegistro" onchange="autocompletarRegistro(this.value)">
                        <option value="">Seleccione...</option>
                        <?php
                        if (!empty($registros)) {
                            foreach ($registros as $registro) {
                                echo "<option value='" . $registro['registro_id'] . "'>" . $registro['fecha_registro'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay registros</option>";
                        }
                        ?>
                    </select>
            <br><button class="button" id="searchButton" onclick="buscarRegistro()">Buscar</button>
            <br><p id="dataFound"></p>
            <p>¿Estás seguro de que deseas eliminar este registro?</p>
            <div class="modal-button-group">
                <button class="button" id="confirmDeleteBtn" onclick="handleConfirmDelete(document.getElementById('dataFound').value)" disabled>Confirmar eliminación</button>
                <button class="button" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
