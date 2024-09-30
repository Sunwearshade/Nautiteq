function cargarDatosProducto() {
    document.getElementById("datosProducto").style.display = "block";
    document.getElementById("nombreProducto").value = "Nombre Producto Ejemplo";
    document.getElementById("nomenclatura").value = "Nomenclatura Ejemplo"; 
    document.getElementById("tipoProducto").value = "primario"; 
}

function guardarCambios(event) {
    event.preventDefault();
    alert("Información del producto actualizada.");
    window.location.href = "../dashboard.html"; 
}