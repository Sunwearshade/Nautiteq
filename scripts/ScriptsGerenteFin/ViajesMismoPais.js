function consultarViajesMismoPais(event) {
    event.preventDefault();
    const pais = document.getElementById('pais').value;

    // Simulación de consulta (reemplazar)
    const viajes = [
        { inicio: 'Argentina', fin: 'Argentina' },
        { inicio: 'Brasil', fin: 'Brasil' },
        { inicio: 'Argentina', fin: 'Brasil' },
    ];

    const viajesMismoPais = viajes.filter(viaje => viaje.inicio === pais && viaje.fin === pais);
    const cantidad = viajesMismoPais.length;

    document.getElementById('resultado').innerHTML = `<p>Se encontraron ${cantidad} viaje(s) que comenzaron y terminaron en ${pais}.</p>`;
}