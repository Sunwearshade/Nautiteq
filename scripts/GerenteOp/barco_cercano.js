function findNearestBoat() {
    const port = document.getElementById("port").value;
    const datetime = new Date(document.getElementById("datetime").value);

    // Simulación de consulta (reemplazar con llamada a la API o base de datos)
    const boatData = [
        { port: 'Puerto A', boat: 'Barco 1', arrival: new Date('2024-09-28T10:00:00') },
        { port: 'Puerto B', boat: 'Barco 2', arrival: new Date('2024-09-28T12:00:00') },
        // Agregar más datos según sea necesario
    ];

    const nearestBoat = boatData.filter(item => item.port === port && item.arrival > datetime);
    
    let boatResultDiv = document.getElementById("boatResult");
    boatResultDiv.innerHTML = ''; // Limpiar resultados anteriores

    if (nearestBoat.length > 0) {
        nearestBoat.forEach(item => {
            boatResultDiv.innerHTML += `<p>Barco: ${item.boat}, Hora de llegada: ${item.arrival.toLocaleString()}</p>`;
        });
    } else {
        boatResultDiv.innerHTML = '<p>No se encontraron barcos cercanos.</p>';
    }
}
