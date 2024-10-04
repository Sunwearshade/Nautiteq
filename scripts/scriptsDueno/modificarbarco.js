function autocompletarBarco(barco) {
    if (barco !== "") {
        fetch(`/nautiteq/php/php_dueno/modificar_barco.php?barco=${barco}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('denominacion').value = data.denominacion || '';
                    document.getElementById('paisRegistro').value = data.pais_registro || '';
                    document.getElementById('barcoId').value = data.barco_id;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al autocompletar la información del barco.');
            });
    }
}
