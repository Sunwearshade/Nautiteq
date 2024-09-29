function consultInventory() {
    const country = document.getElementById("country").value;
    const product = document.getElementById("product").value;
    const minQuantity = document.getElementById("minQuantity").value;

    // Simulación de consulta (reemplazar con llamada a la API o base de datos)
    const inventoryData = [
        { country: 'Argentina', product: 'Producto A', date: '2024-01-01', quantity: 50 },
        { country: 'Chile', product: 'Producto B', date: '2024-01-10', quantity: 20 },
    ];

    const filtered = inventoryData.filter(item => 
        item.country === country && item.product === product && item.quantity < minQuantity
    );

    let resultDiv = document.getElementById("result");
    resultDiv.innerHTML = ''; 

    if (filtered.length > 0) {
        filtered.forEach(item => {
            resultDiv.innerHTML += `<p>Fecha: ${item.date}, Cantidad: ${item.quantity}</p>`;
        });
    } else {
        resultDiv.innerHTML = '<p>No se encontraron registros.</p>';
    }
}
