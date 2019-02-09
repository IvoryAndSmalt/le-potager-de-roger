getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert('Votre navigateur ne prend pas en compte la géolocalisation');
    }
}

function showPosition(position) {
    console.log('latitude ' + position.coords.latitude);
    console.log('longitude ' + position.coords.longitude);

    var lat = position.coords.latitude;
    var long = position.coords.longitude;

    var mymap = L.map('map').setView([lat, long], 15);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiZmF3bGlhIiwiYSI6ImNqYmVxejI1ejI3MG4ydm1vZm9laXVya2QifQ.vUbCBecjNCgy9IEE6pDRaQ'
    }).addTo(mymap);

    /*mapboxgl.accessToken = 'pk.eyJ1IjoiZmF3bGlhIiwiYSI6ImNqYmVxejI1ejI3MG4ydm1vZm9laXVya2QifQ.vUbCBecjNCgy9IEE6pDRaQ';
                    const map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/fawlia/cjrxdluqr0szj1fpdkxgmumre',
                        center: [2.317600, 48.866500],
                        zoom: 12.0

                    });*/


    var myIcon = L.icon({
        iconUrl: 'img/marker.png',
        iconSize: [38, 55],
        iconAnchor: [18, 28],
        popupAnchor: [0,0],
    });

    var marker = L.marker([lat,long],{icon: myIcon}).on('click', markerOnClick).addTo(mymap);

    function markerOnClick(e) {
        var popup = L.popup()
            .setLatLng([lat, long])
            .setContent("Potager de Roger")
            .openOn(mymap);
    }
}