<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Gerente Financiero</title>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <header class="header">
        <h1>Panel del Gerente Financiero</h1>
    </header>

    <main class="container">
        <div class="button-group">
            <button class="button" onclick="window.location.href='viajes_mismo_pais.php'">Consultar viajes en el mismo país</button>
            <button class="button" onclick="window.location.href='viajes_pais_determinado.php'">Consultar viajes en un país determinado</button>
        </div>
    </main>

    <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>
</body>
</html>
