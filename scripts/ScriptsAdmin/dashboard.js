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

function buscarUsuario() {
    const username = document.getElementById('username').value.trim();
    const userFoundParagraph = document.getElementById('userFound');
    userFoundParagraph.innerHTML = "";

    if (username === "") {
        userFoundParagraph.innerHTML = "Por favor, ingrese un nombre de usuario.";
        return;
    }

    fetch(`../../php/php_admin/buscar_usuario.php?username=${username}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                userFoundParagraph.innerHTML = data.error;
                document.getElementById('confirmDeleteBtn').disabled = true;
            } else {
                userFoundParagraph.innerHTML = `Usuario encontrado: ${data.username}`;
                document.getElementById('confirmDeleteBtn').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al buscar usuario:', error);
            userFoundParagraph.innerHTML = "Error al buscar el usuario.";
        });
}

