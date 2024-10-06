let map;
let marker;
let barcoSeleccionado = "";
let intervalId;
let latitudActual = 20.872851;
let longitudActual = -105.445761; 
const desplazamientoLat = 0.00005; 
const desplazamientoLon = 0.00005; 

document.addEventListener("DOMContentLoaded", () => {
    fetch('/nautiteq/php/php_dueno/barcos_disponibles.php')
        .then(response => response.json())
        .then(data => {
            const barcosSelect = document.getElementById('barcos');
            data.barcos.forEach(barco => {
                const option = document.createElement('option');
                option.value = barco.barco_id;
                option.textContent = barco.denominacion;
                barcosSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

    map = L.map('mimapa').setView([latitudActual, longitudActual], 18);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Datos del mapa de &copy; OpenStreetMap, CC-BY-SA, Imágenes © Mapbox',
        id: 'mapbox/streets-v11'
    }).addTo(map);
});

function actualizarLocalizacion() {
    barcoSeleccionado = document.getElementById('barcos').value;
    if (barcoSeleccionado !== "") {
        document.getElementById('localizacion-info').style.display = 'block';

        if (intervalId) {
            clearInterval(intervalId);
        }

        obtenerLocalizacion();
        intervalId = setInterval(obtenerLocalizacion, 4000);
    }
}

function obtenerLocalizacion() {
    if (barcoSeleccionado === "") return;

    // Simulación de avance en línea recta
    latitudActual += desplazamientoLat;
    longitudActual += desplazamientoLon;
    const fecha_hora = new Date().toLocaleString();

    document.getElementById('nombre-barco').textContent = `Barco ${barcoSeleccionado}`;
    document.getElementById('fecha-hora').textContent = fecha_hora;
    document.getElementById('latitud').textContent = latitudActual.toFixed(5);
    document.getElementById('longitud').textContent = longitudActual.toFixed(5);

    if (marker) {
        marker.setLatLng([latitudActual, longitudActual]);
    } else {
        marker = L.marker([latitudActual, longitudActual]).addTo(map);
    }

    map.setView([latitudActual, longitudActual], 18);
}
