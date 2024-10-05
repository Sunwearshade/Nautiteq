function mostrarViajesMPais(event) {
    event.preventDefault(); // Evita que el formulario se envíe y recargue la página

    const paisSeleccionado = document.getElementById('pais').value; // Obtener el valor ingresado en el input

    if (paisSeleccionado !== "") {
        fetch(`/nautiteq/php/php_gf/consulta_mismo_pais.php?pais=${encodeURIComponent(paisSeleccionado)}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    let historialHTML = '';
                    if (data.viajes.length > 0) {
                        historialHTML += `<br><p>Se encontraron los siguientes viajes que iniciaron y terminaron en ${paisSeleccionado}:</p>`
                        data.viajes.forEach((viaje, index) => {
                            historialHTML += `
                                <div>
                                    <p style="color: black;"><strong>Viaje ${index + 1}</strong></p>
                                    <p>Fecha de Inicio: ${viaje.fecha_inicio}</p>
                                    <p>Fecha de Finalización: ${viaje.fecha_fin}</p>
                                    <p>Puerto de Origen: ${viaje.puerto_origen}</p>
                                    <p>País de Origen: ${viaje.pais_origen}</p>
                                    <p>Puerto de Destino: ${viaje.puerto_destino}</p>
                                    <p>País de Destino: ${viaje.pais_destino}</p>
                                </div>
                            `;
                        });
                    } else {
                        historialHTML += `<p>No hay viajes registrados que inicien y terminen en este país.</p>`;
                    }
                    document.getElementById("resultado").innerHTML = historialHTML;
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
