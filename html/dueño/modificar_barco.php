<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Modificar Barco</title>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_dueno/modificar_barco.php';
    ?>
</head>
<body>
    <div class="header">
        <h1>Modificar Barco</h1>
    </div>
    <div class="container">
        <form id="modificarBarco" name="modificarBarco" method="post">
            <div class="input-group">
                <label for="listaBarcos">Lista de Barcos</label>
                <select id="listaBarcos" name="listaBarcos" onchange="autocompletarBarco(this.value)">
                    <option>Seleccione un barco...</option>
                </select>
            </div>
            <div class="input-group">
                <label for="denominacion">Denominación</label>
                <input type="text" id="denominacion" name="denominacion" required>
            </div>
            <div class="input-group">
                <label for="paisRegistro">País de Registro</label>
                <input type="text" id="paisRegistro" name="paisRegistro" required>
            </div>
            <button type="submit" name="modificarBarco" class="button">Guardar Cambios</button>
        </form>
    </div>

    <script src="../../scripts/scriptsDueno/modificarbarco.js">
    </script>
</body>
</html>
