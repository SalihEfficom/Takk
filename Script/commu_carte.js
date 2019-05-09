var map;
var mc;
var markers=[];
var marker;
var markerCle;
var newAddress;
var infowindow;
var content;
var geoVille=[];
var latlng;
var nom=[];
var desc=[];
var mot=[];
let data;
var cpt=0;
var geocoder ;

function initMap() {
    var static_position = new google.maps.LatLng(46.9813764,2.60430911);

    map = new google.maps.Map(document.getElementById('map'), {
        center: static_position,
        zoom: 6,
        draggable: true,
    });
    infowindow = new google.maps.InfoWindow;
    geocoder = new google.maps.Geocoder();

    markerVille(geocoder, function (latlng, geoVille, nom, desc, mot) {
        marker = new google.maps.Marker({
            draggable: false,
            raiseOnDrag: false,
            position: latlng,
            animation: google.maps.Animation.DROP,
            ville: geoVille,
            nom: nom,
            desc: desc,
            mot: mot,
            map: map
        });
        google.maps.event.addListener(marker, 'click', onMarkerClick);
        markers.push(marker);

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
    if (geocoder) {
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.fitBounds(results[0].geometry.viewport);
            }
        });
    }
}

function markerVille(geocoder,myfunc) {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/createMarker.php?", true);
    xhr.send();

    xhr.onreadystatechange = function() {
        let data = JSON.parse(xhr.response);

        for (let i=0; i<data.length; i++) {
            nom[i] = data[i].nom;
            desc[i] = data[i].description;
            mot[i] = data[i].motcle;
            geocoder.geocode( { 'address': data[i].ville}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(i);
                    newAddress = results[0].geometry.location;
                    latlng = new google.maps.LatLng(parseFloat(newAddress.lat()), parseFloat(newAddress.lng()));
                    geoVille = results[0].address_components[0].short_name;

                    myfunc(latlng, geoVille, nom[i], desc[i], mot[i]);
                    // markers.push(createMarker(latlng, geoVille, nom[i], desc[i], mot[i]));

                }
                    // for (var x=0; x<9; x++) {
                    //     markers.push(createMarker(latlng, geoVille, nom[x], desc[x], mot[x]));
                    // }

            });


        }
    }
}



function createMarker(latlng,ville,nom,desc,mot) {
    // console.log(nom);
    // for (var x=0; x<9; x++) {
        marker = new google.maps.Marker({
            draggable: false,
            raiseOnDrag: false,
            position: latlng,
            animation: google.maps.Animation.DROP,
            ville: ville,
            nom: nom,
            desc: desc,
            mot: mot,
            map: map
        });
    // }
}

function onMarkerClick() {
    var m = this;
    console.log(m.nom);
    infowindow.setContent( m.nom+"<br />"+m.ville+"<br />"+m.desc+"<br />"+m.mot);
    infowindow.open(map, m);
}

function createMarkerMotCle(latlng,ville,nom,desc,mot) {

    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|ffe436");

    markerCle = new google.maps.Marker({
        draggable: false,
        raiseOnDrag: false,
        icon: pinImage,
        animation: google.maps.Animation.DROP,
        position: latlng,
        ville: ville,
        nom: nom,
        desc: desc,
        mot: mot,
        map: map
    });

    markers.push(markerCle);

    google.maps.event.addListener(markerCle, 'click', onMarkerClick);

}

function searchMotCle(){
    setMapOnAll(null);
    var motcle = encodeURIComponent(document.getElementById("input_commu").value);

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/markerMotCle.php?motcle="+motcle, true);
    xhr.send();
    xhr.onreadystatechange = function() {
        let dataV = JSON.parse(xhr.response);
        var geocoder = new google.maps.Geocoder();

        for (let i=0; i<dataV.length; i++) {

            nom[i] = dataV[i].nom;
            desc[i] = dataV[i].description;
            mot[i] = dataV[i].motcle;
            var newAddress;
            geocoder.geocode( { 'address': dataV[i].ville }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    newAddress = results[0].geometry.location;
                    var latlng = new google.maps.LatLng(parseFloat(newAddress.lat()),parseFloat(newAddress.lng()));
                    geoVille = results[0].address_components[0].short_name;
                    createMarkerMotCle(latlng,geoVille,nom[i],desc[i],mot[i]);
                }
            });
        }
        // mc = new MarkerClusterer(map, markers);
    }
}

function separateMotcle(value){
        console.log('dqzdz');
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

