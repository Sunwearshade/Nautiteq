function openModal() {
    document.getElementById("modal").style.display = "block";
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}

function searchUser() {
    var userId = document.getElementById("userId").value;
    
    if (userId) {
        document.getElementById("userFound").style.display = "block";
        document.getElementById("userIdFound").innerText = userId;

        document.getElementById("confirmDeleteBtn").disabled = false;
    } else {
        alert("Por favor, ingresa un ID válido.");
    }
}

function confirmDelete() {
    var userId = document.getElementById("userId").value;
    alert("Usuario con ID " + userId + " eliminado.");
    closeModal();
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
