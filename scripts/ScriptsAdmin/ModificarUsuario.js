function cargarDatos() {

    document.getElementById("username").value = "usuarioEjemplo";
    document.getElementById("nombre").value = "Nombre Ejemplo";
    document.getElementById("apellidoPaterno").value = "Apellido Paterno Ejemplo";
    document.getElementById("apellidoMaterno").value = "Apellido Materno Ejemplo";
}

function guardarCambios(event) {
    event.preventDefault();
    alert("Cambios guardados.");
    window.location.href = "dashboard.html";
}