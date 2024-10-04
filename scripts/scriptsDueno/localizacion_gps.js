var mymap = L.map('mimapa').setView([22.7181138, -102.4875826], 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 25,
        attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>', 
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    /*var marcador = L.icon({
        iconUrl:'images/marcador.png',
        iconSize: [60, 85]
    });

    var marker = L.marker([22.7181138, -102.4875826], {icon: marcador}).addTo(mymap);*/

    var circle = L.circle([22.715969, -102.485431], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 40
    }).addTo(mymap);

    var polygon = L.polygon([
        [22.717820, -102.487619],
        [22.716832, -102.488089],
        [22.718159, -102.485810]
    ]).addTo(mymap);

    var options = {
        EnableHighAccuracy: true,
        Timeout: 500,
        MaximumAge: 0
    };

    function success(geolocationPosition){
        console.log(geolocationPosition);
        let coords = geolocationPosition.coords;
        document.getElementById("mymap").innerHTML = "Latitud: " + coords.latitude + "<br> Longitud" + coords.longitude; 
    }

    function error(err){
        document.getElementById("mymap").innerHTML = "Descripción del error: " + err.message;
    }

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(success, error, options);
    } else{
        alert("No puedes obtener la geolocalización");
    }