<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Panel del Gerente de Operaciones</title>
</head>
<body>
    <header class="header">
        <h1>Panel del Gerente de Operaciones</h1>
    </header>

    <main class="container">
        <div class="button-group">
            <button class="button" onclick="window.location.href='inventario_bajo.html'">Consultar inventario bajo</button>
            <button class="button" onclick="window.location.href='barco_cercano.html'">Barco más cercano a puerto</button>
        </div>
    </main>

    <button id="cerrar-sesion" onclick="window.location.href='../../index.php'">Cerrar Sesión</button>
</body>
</html>
