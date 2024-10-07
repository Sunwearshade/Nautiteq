function findNearestBoat() {
    const puertoSeleccionado = document.getElementById('puertoSeleccionado').value;
    const date = document.getElementById('date').value;

    // Asegurarse de que las variables correctas se usen en la condición
    if (puertoSeleccionado && date) {
        const [year, month, day] = date.split('-');
        const formattedDate = `${year}-${day}-${month}`;
        fetch('/nautiteq/php/php_go/consulta_barco_cercano.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'puerto_id': puertoSeleccionado,
                'fecha': formattedDate // Solo la fecha, ignorar la hora
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('boatResult').textContent = data.error;
            } else {
                const result = `
                    <br><p>Barco más cercano: ${data.nombre_barco}</p>
                    <p>Dueño: ${data.dueno}</p>
                    <p>Latitud: ${data.latitud}, Longitud: ${data.longitud}</p>
                `;
                document.getElementById('boatResult').innerHTML = result;
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('boatResult').textContent = 'Por favor, seleccione un puerto y una fecha.';
    }
}
