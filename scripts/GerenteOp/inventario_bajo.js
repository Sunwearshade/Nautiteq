function consultarInventario() {
    const pais = document.getElementById('country').value;
    const productoSeleccionado = document.getElementById('productoSeleccionado').value;
    const cantidadMinima = document.getElementById('minQuantity').value;
    const resultDiv = document.getElementById('result');

    resultDiv.innerHTML = "";

    if (!pais || !productoSeleccionado || !cantidadMinima) {
        resultDiv.innerHTML = "Por favor, complete todos los campos.";
        return;
    }

    fetch('../../php/php_go/consulta_inventario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            pais: pais,
            productoSeleccionado: productoSeleccionado,
            cantidadMinima: cantidadMinima
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            resultDiv.innerHTML = data.error;
        } else {
            resultDiv.innerHTML = `Fecha: ${data.fecha_ingreso}, Cantidad: ${data.cantidad}`;
        }
    })
    .catch(error => {
        console.error('Error en la consulta:', error);
        resultDiv.innerHTML = "Error en la consulta.";
    });
}
