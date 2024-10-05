function openModal() {
    document.getElementById("modal").style.display = "block";
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}

function openModal() {
    document.getElementById("modal").style.display = "flex"; 
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}


function confirmarEliminacion() {
    cerrarModal();
}

let barcoId; // Variable global para almacenar el barco_id

function buscarBarco() {
    const denominacion = document.getElementById('denominacion').value.trim();
    const denominationFoundParagraph = document.getElementById('boatFound');
    denominationFoundParagraph.innerHTML = "";

    if (denominacion === "") {
        denominationFoundParagraph.innerHTML = "Por favor, ingrese una denominación.";
        return;
    }

    fetch(`../../php/php_dueno/buscar_barco.php?denominacion=${denominacion}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                denominationFoundParagraph.innerHTML = data.error;
                document.getElementById('confirmDeleteBtn').disabled = true;
            } else {
                denominationFoundParagraph.innerHTML = `Barco encontrado: ${data.denominacion}`;
                barcoId = data.barco_id;
                document.getElementById('confirmDeleteBtn').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al buscar barco:', error);
            denominationFoundParagraph.innerHTML = "Error al buscar el barco.";
        });
}

function handleConfirmDelete() {
    const boatFoundText = document.getElementById('boatFound').innerText;

    if (boatFoundText.includes("Barco encontrado:") && barcoId) {
        confirmDelete(barcoId); 
    } else {
        alert("No hay ningún barco seleccionado para eliminar.");
    }
}

function confirmDelete(barcoId) {
    if (confirm("¿Está seguro de que desea eliminar el barco?")) {
        window.location.href = "/nautiteq/php/php_dueno/borrar_barco.php?barco_id=" + encodeURIComponent(barcoId) + "&confirmar_eliminacion=1";
    }
}
