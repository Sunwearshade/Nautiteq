function confirmarEliminacion() {
    document.getElementById("modalConfirmacion").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modalConfirmacion").style.display = "none";
}

function eliminarBarco() {
    alert("Barco eliminado.");
    cerrarModal();
}