function consultarViajesPaisDeterminado(event) {
    event.preventDefault();
    const pais = document.getElementById('pais').value;

    const viajes = [
        { inicio: 'Argentina', fin: 'Brasil' },
        { inicio: 'Brasil', fin: 'Argentina' },
        { inicio: 'Chile', fin: 'Perú' },
    ];

    const viajesEnPais = viajes.filter(viaje => viaje.inicio === pais || viaje.fin === pais);
    const cantidad = viajesEnPais.length;

    document.getElementById('resultado').innerHTML = `<p>Se encontraron ${cantidad} viaje(s) que comenzaron o terminaron en ${pais}.</p>`;
}