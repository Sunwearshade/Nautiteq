function confirmarEliminacion() {
    document.getElementById("modal").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}

let registroId; // Guardar el ID del registro

function buscarRegistro() {
    const registro = document.getElementById('fechaRegistro').value.trim();
    const dataFoundParagraph = document.getElementById('dataFound');
    dataFoundParagraph.innerHTML = "";

    if (registro === "") {
        dataFoundParagraph.innerHTML = "Por favor, seleccione una fecha.";
        return;
    }

    fetch(`../../php/php_supervisor/buscar_registros.php?registro=${registro}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                dataFoundParagraph.innerHTML = data.error;
                document.getElementById('confirmDeleteBtn').disabled = true;
            } else {
                // Mostrar la información del registro
                dataFoundParagraph.innerHTML = `Registro encontrado:<br> 
                                                Producto: ${data.nombre_producto}<br> 
                                                Bodega: ${data.nombre_bodega}<br> 
                                                Cantidad: ${data.cantidad}<br> 
                                                Fecha: ${data.fecha_registro}`;
                registroId = data.registro_id;
                document.getElementById('confirmDeleteBtn').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al buscar registro:', error);
            dataFoundParagraph.innerHTML = "Error al buscar el registro.";
        });
}

function handleConfirmDelete() {
    const dataFoundText = document.getElementById('dataFound').innerText;

    if (dataFoundText.includes("Registro encontrado:") && registroId) {
        confirmDelete(registroId); 
    } else {
        alert("No hay ningún registro seleccionado para eliminar.");
    }
}

function confirmDelete(registroId) {
    if (confirm("¿Está seguro de que desea eliminar este registro?")) {
        window.location.href = "/nautiteq/php/php_supervisor/borrar_registros.php?registro_id=" + encodeURIComponent(registroId) + "&confirmar_eliminacion=1";
    }
}
