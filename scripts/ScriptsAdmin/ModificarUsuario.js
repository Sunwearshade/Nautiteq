function cargarUsuariosPorRol(rolSeleccionado) {
    if (rolSeleccionado !== "") {
        rol = document.getElementById('usuarioSeleccionado').value;
        fetch(`/nautiteq/php/php_admin/modificar_usuario.php?rol=${rolSeleccionado}`)
            .then(response => response.json())
            .then(data => {
                let listaUsuarios = document.getElementById('listaUsuarios');
                listaUsuarios.innerHTML = '<option>Seleccione un usuario...</option>';
                document.getElementById('rolOculto').value = rol;
                
                data.forEach(usuario => {
                    listaUsuarios.innerHTML += `<option value="${usuario.username}">${usuario.username}</option>`;
                });
            })
            .catch(error => console.error('Error:', error));
    }
}

function autocompletarUsuario(username, rol) {
    if (username !== "") {
        fetch(`/nautiteq/php/php_admin/modificar_usuario.php?username=${username}&rol=${rol}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('nombre').value = data.nombre || '';
                    document.getElementById('apellidoPaterno').value = data.apellidoPaterno || '';
                    document.getElementById('apellidoMaterno').value = data.apellidoMaterno || '';
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
