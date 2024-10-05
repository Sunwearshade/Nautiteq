<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Viajes en un País Determinado</title>
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../scripts/ScriptsGerenteFin/ViajesPaisDeterminado.js" defer></script>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/nautiteq/php/php_gf/consulta_pais_determinado.php';
    ?>
</head>
<body>
    <div class="container">
        <h1>Consultar Viajes en un País Determinado</h1>
        <form id="formPaisDeterminado" name="consultaViajes " onsubmit="mostrarViajesPaisD(event)">
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <button type="submit">Consultar</button>
        </form>
        <div id="resultado"></div>
    </div>
</body>
</html>
