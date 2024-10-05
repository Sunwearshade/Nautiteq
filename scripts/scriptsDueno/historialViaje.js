function mostrarHistorial(barcoSeleccionado) {
    if (barcoSeleccionado !== "") {
        const selectElement = document.getElementById('barcoSeleccionado');
        const barcoDenominacion = selectElement.options[selectElement.selectedIndex].text;

        fetch(`/nautiteq/php/php_dueno/consulta_viajes.php?barco=${barcoSeleccionado}&denominacion=${barcoDenominacion}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    let historialHTML = `<h2>Historial de Viajes de ${data.denominacion}</h2>`;
                    if (data.viajes.length > 0) {
                        data.viajes.forEach((viaje, index) => {
                            historialHTML += `
                                <div>
                                    <h3>Viaje ${index + 1}</h3>
                                    <p>Fecha de Inicio: ${viaje.fecha_inicio}</p>
                                    <p>Fecha de Finalización: ${viaje.fecha_fin}</p>
                                    <p>Puerto de Origen: ${viaje.puerto_origen}</p>
                                    <p>País de Origen: ${viaje.pais_origen}</p>
                                    <p>Puerto de Destino: ${viaje.puerto_destino}</p>
                                    <p>Puerto de Destino: ${viaje.pais_destino}</p>
                                </div>
                            `;
                        });
                    } else {
                        historialHTML += `<p>No hay viajes registrados para este barco.</p>`;
                    }
                    document.getElementById("historial").innerHTML = historialHTML;
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
