function cargarUsuariosPorRol(rol) {
    if (rol === "") return;

    fetch(`/nautiteq/php/php_admin/modificar_usuario.php?rol=` + rol)
    .then(response => response.json())
    .then(data => {
        const listaUsuarios = document.getElementById('listaUsuarios');
        listaUsuarios.innerHTML = `<option value="">Seleccione un usuario...</option>`;
        data.forEach(usuario => {
            listaUsuarios.innerHTML += `<option value="${usuario.id}">${usuario.username}</option>`;
        });
    })
    .catch(error => console.error('Error al cargar usuarios:', error));
}

function autocompletarUsuario(username, rol) {
    if (username === "") return;

    fetch('/nautiteq/php/php_admin/modificar_usuario.php?username=' + username + '&rol=' + rol)
    .then(response => response.json())
    .then(data => {
        document.getElementById('nombre').value = data.nombre;
        document.getElementById('apellidoPaterno').value = data.apellidoPaterno;
        document.getElementById('apellidoMaterno').value = data.apellidoMaterno;
    })
    .catch(error => console.error('Error al autocompletar usuario:', error));
};
