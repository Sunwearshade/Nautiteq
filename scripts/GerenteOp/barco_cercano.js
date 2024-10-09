let map;

document.addEventListener("DOMContentLoaded", () => {
    map = L.map('mimapa').setView([0, 0], 2); 
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; OpenStreetMap contributors'
    }).addTo(map);

    fetch('/nautiteq/php/php_go/consulta_barco_cercano.php')
        .then(response => response.json())
        .then(data => {
            if (data.puertos) {
                data.puertos.forEach(puerto => {
                    const marker = L.marker([puerto.latitud, puerto.longitud]).addTo(map);
                    marker.bindPopup(`<b>${puerto.nombre}</b>`);
                });
            }
        })
        .catch(error => console.error('Error:', error));
});

function findNearestBoat() {
    const puertoSeleccionado = document.getElementById('puertoSeleccionado').value;
    const date = document.getElementById('date').value;

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
                'fecha': formattedDate
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('boatResult').textContent = data.error;
            } else {
                document.getElementById('boatResult').innerHTML = `
                    <p>Barco más cercano: ${data.nombre_barco}</p>
                    <p>Dueño: ${data.dueno}</p>
                    <p>Latitud: ${data.latitud}, Longitud: ${data.longitud}</p>
                `;

                map.setView([data.latitud, data.longitud], 15);
                L.marker([data.latitud, data.longitud]).addTo(map)
                  .bindPopup(`<b>${data.nombre_barco}</b><br>Dueño: ${data.dueno}`)
                  .openPopup();
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('boatResult').textContent = 'Por favor, seleccione un puerto y una fecha.';
    }
}
