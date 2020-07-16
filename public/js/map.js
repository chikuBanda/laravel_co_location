var mymap = L.map('mapid', {
    scrollWheelZoom: false
}).setView([32.343504,-6.3609538], 18);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2hpa3ViYW5kYSIsImEiOiJja2JjdDUyaDkwNTh6MnFtMmkzYzd2azNlIn0.6pwyB-xj585ezi8p3L8Sfg', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 17,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

var geocodeService = L.esri.Geocoding.geocodeService();

var restaurantIcon = L.icon({
    iconUrl: '../uploads/img/restaurant_icon.png',

    iconSize:     [50, 60], // size of the icon
    iconAnchor:   [26, 58], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


var marker = L.marker([32.343927, -6.360257], {
    draggable: true
}).addTo(mymap);

geocodeService.reverse().latlng(marker.getLatLng()).language("eng").run(function (error, result) {
    if (error) {
        return;
    }

    document.getElementById("address").innerHTML = result.address.Match_addr;
    document.getElementById("address_input").value = result.address.Match_addr;
});

document.getElementById("cordx").value = marker.getLatLng().lat;
document.getElementById("cordy").value = marker.getLatLng().lng;
document.getElementById("lat").innerHTML = "lat:" + marker.getLatLng().lat;
document.getElementById("lng").innerHTML = "lng:" + marker.getLatLng().lng;

marker.on('move', function(e){
    geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
        if (error) {
            return;
        }

        document.getElementById("address").innerHTML = result.address.Match_addr;
        document.getElementById("address_input").value = result.address.Match_addr;
    });

    document.getElementById("cordx").value = marker.getLatLng().lat;
    document.getElementById("cordy").value = marker.getLatLng().lng;
    document.getElementById("lat").innerHTML = "lat:" + marker.getLatLng().lat;
    document.getElementById("lng").innerHTML = "lng:" + marker.getLatLng().lng;
});

mymap.on('click', function (e) {
    geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
        if (error) {
            return;
        }

        //L.marker(result.latlng).addTo(mymap).bindPopup(result.address.Match_addr).openPopup();
        L.popup().setLatLng(result.latlng).setContent(result.address.Match_addr).openOn(mymap);
        console.log(result.address.Match_addr);
    });
});
