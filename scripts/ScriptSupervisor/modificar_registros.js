function autocompletarRegistro(registro) {
    if (registro !== "") {
        fetch(`/nautiteq/php/php_supervisor/modificar_registros.php?registro=${registro}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('productoSeleccionado').value = data.producto_id || ''; 
                    document.getElementById('bodegaSeleccionada').value = data.bodega_id || '';
                    document.getElementById('cantidad').value = data.cantidad;
                    document.getElementById('tipo').value = data.tipo;

                    let fechaLabel = document.querySelector('label[for="fechaIngresoEgreso"]');
                    if (data.tipo === 'ingreso') {
                        fechaLabel.innerHTML = 'Fecha de Ingreso';
                        document.getElementById('fechaIngresoEgreso').value = data.fecha_ingreso;
                    } else if (data.tipo === 'egreso') {
                        fechaLabel.innerHTML = 'Fecha de Egreso';
                        document.getElementById('fechaIngresoEgreso').value = data.fecha_egreso;
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al autocompletar la información del registro.');
            });
    }
}
