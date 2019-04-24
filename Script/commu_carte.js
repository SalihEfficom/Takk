var map;
var mc;
var markers=[];

function initMap() {
    var static_position = new google.maps.LatLng(46.9813764,2.60430911);

    map = new google.maps.Map(document.getElementById('map'), {
        center: static_position,
        zoom: 6,
        draggable: true,
    });
}

function searchVille(){
    var inputVille = document.getElementById('input_ville');
    var options = {
        componentRestrictions: {country: 'fr'}
    };
    var autocomplete = new google.maps.places.Autocomplete(inputVille, options);
}

function zoomVille(address) {
    var geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.fitBounds(results[0].geometry.viewport);
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/createMarker.php?", true);
    xhr.send();

    xhr.onreadystatechange = function() {
        let data = JSON.parse(xhr.response);

        var geocoder = new google.maps.Geocoder();

        for (i=0; i<data.length; i++) {
            var newAddress;
            geocoder.geocode( { 'address': data[i].ville }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    newAddress = results[0].geometry.location;
                    var latlng = new google.maps.LatLng(parseFloat(newAddress.lat()),parseFloat(newAddress.lng()));
                    markers.push(createMarker(latlng));
                }
            });
        }
        mc = new MarkerClusterer(map, markers);
    }
});

function createMarker(latlng) {

    var marker = new google.maps.Marker({
        draggable: false,
        raiseOnDrag: false,
        position: latlng,
        map: map
    });
}

function createMarkerMotCle(latlng) {

    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|ffe436");

    var marker = new google.maps.Marker({
        draggable: false,
        raiseOnDrag: false,
        icon: pinImage,
        position: latlng,
        map: map
    });
}

function searchMotCle(){

    var motcle = encodeURIComponent(document.getElementById("input_commu").value);

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/markerMotCle.php?motcle="+motcle, true);
    xhr.send();
    xhr.onreadystatechange = function() {
        let dataV = JSON.parse(xhr.response);
        var geocoder = new google.maps.Geocoder();

        for (i=0; i<dataV.length; i++) {
            var newAddress;
            geocoder.geocode( { 'address': dataV[i].ville }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    newAddress = results[0].geometry.location;
                    var latlng = new google.maps.LatLng(parseFloat(newAddress.lat()),parseFloat(newAddress.lng()));
                    markers.push(createMarkerMotCle(latlng));
                }
            });
        }
        mc = new MarkerClusterer(map, markers);
    }
}


//Creation d'une communauté
function request() {
    var xhr = getXMLHttpRequest();

    var nom = encodeURIComponent(document.getElementById("nom").value);
    var description = encodeURIComponent(document.getElementById("description").value);
    var motcle = encodeURIComponent(document.getElementById("motcle").value);
    var ville = encodeURIComponent(document.getElementById("ville").value);

    xhr.open("GET", "../php/ajoutCommu.php?nom="+nom+"&description="+description+"&motcle="+motcle+"&ville="+ville, true);
    xhr.send(null);

}

