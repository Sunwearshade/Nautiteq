<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Gerente Financiero</title>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <div class="container">
        <h1>Consultar Viajes en el Mismo País</h1>
        <form id="formMismoPais" onsubmit="consultarViajesMismoPais(event)">
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <button type="submit">Consultar</button>
        </form>
        <div id="resultado"></div>
    </div>

    <script src="../../scripts/ScriptsGerenteFin/ViajesMismoPais.js">
    </script>
</body>
</html>

</html>
