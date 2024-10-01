function cargarDatos() {

    document.getElementById("username").value = "usuarioEjemplo";
    document.getElementById("nombre").value = "Nombre Ejemplo";
    document.getElementById("apellidoPaterno").value = "Apellido Ejemplo";
    document.getElementById("apellidoMaterno").value = "Apellido Ejemplo";
}

function guardarCambios(event) {
    event.preventDefault();
    alert("Cambios guardados.");
    window.location.href = "dashboard.html";
}