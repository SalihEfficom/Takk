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
var id=[];

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

    markerVille(geocoder, function (latlng, geoVille, nom, desc, mot,id) {
        marker = new google.maps.Marker({
            draggable: false,
            raiseOnDrag: false,
            position: latlng,
            animation: google.maps.Animation.DROP,
            ville: geoVille,
            nom: nom,
            desc: desc,
            mot: mot,
            commuId : id,
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

function searchVilleCrea(){
    var inputVille = document.getElementById('ville');
    var options = {
        types: ['geocode'],
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

    jQuery.ajax({
        url:"../php/createMarker.php?",
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            var d = JSON.parse(data);

            for (let i=0; i<d.length; i++) {
                nom[i] = d[i].name;
                desc[i] = d[i].description;
                mot[i] = d[i].keyword;
                id[i] = d[i].id;
                geocoder.geocode( { 'address': d[i].city}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        newAddress = results[0].geometry.location;
                        latlng = new google.maps.LatLng(parseFloat(newAddress.lat()), parseFloat(newAddress.lng()));
                        geoVille = results[0].address_components[0].short_name;

                        myfunc(latlng, geoVille, nom[i], desc[i], mot[i],id[i]);
                    }
                });

                document.getElementById("join-list-view").innerHTML+=
                    "<div class=\"grid-cards-container gtc300 commu-cards-container\">" +
                    "                    <div class=\"card commu-card\">" +
                    "                        <div class=\"card-header\">" +
                    "                        <span class=\"card-title\">" +
                    "                            <a href='http://localhost/Takk/Pages/fildactu.php?id="+d[i][0]+"'>"+d[i][1]+"</a>"+
                    "                        </span>" +
                    "                        </div>" +
                    "                        <div class=\"card-content\">" +
                    "                            <div class=\"commu-infos\">" +
                    "                                <span>"+d[i].city+"</span>" +
                    "                            </div>" +
                    "                            <div class=\"commu-desc\">" +
                    "                                "+d[i].description+
                    "                            </div>\n" +
                    "                            <div class=\"commu-keywords\">" +
                    "                                #"+d[i].keyword+
                    "                            </div>" +
                    "                        </div>" +
                    "                        <div id='blocButton"+d[i].id+"'></div>" +
                    "                    </div>" +
                    "                </div>";

                jQuery.ajax({
                    url:"../php/checkCommu.php?id="+d[i].id,
                    type:"GET",
                    async:false,
                    crossDomain:true,
                    success:function(data){
                        var dt = JSON.parse(data);
                        console.log(dt);
                        if(dt=="non"){
                            document.getElementById("blocButton"+d[i].id).innerHTML+="<button class=\"btn btn-offset btn-secondary\" onclick='joinCommu("+d[i].id+")'>Rejoindre</button>";
                        }
                    },
                    error:function(data){

                    }
                });

            }
        },
        error:function(data){

        }
    });

    // jQuery.ajax({
    //     url:"../php/checkCommu.php?id="+data[i].id,
    //     type:"GET",
    //     async:false,
    //     crossDomain:true,
    //     success:function(data){
    //         // var dt = JSON.parse(data);
    //         console.log('tetetst    as')
    //         console.log(data);
    //         if(data=="non"){
    //             console.log('test');
    //             document.getElementById("blocButton").innerHTML+="<button class=\"btn btn-offset btn-secondary\" onclick='joinCommu()'>Rejoindre</button>";
    //         }
    //     },
    //     error:function(data){
    //
    //     }
    // });


}

function createMarker(latlng,ville,nom,desc,mot) {
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
}

function onMarkerClick() {
    console.log('test');
    var m = this;
    console.log(m);
    infowindow.setContent( "<div class='m-nom'>"+m.nom+"</div> <div class='m-ville'>"+m.ville+"</div> <div class='m-desc'>"+m.desc+"</div> <div class='m-mot'>"+m.mot+"</div> <input type=\"button\" name=\"theButton\" value=\"voir commu\" class=\"btn\" data-username=\"{{m.commuId}}\" onclick='changeLocation("+m.commuId+")'/>");
    infowindow.open(map, m);
}

// jQuery(document).on('click', '.btn', function() {
//
//     var idCommu = $(this).data('username');
//     if (name) {
//         console.log('test if');
//         window.location = 'http://localhost/Takk/Pages/fildactu.php?idCommu=' + idCommu;
//     }
// });

function changeLocation(id){
    window.location = 'http://localhost/Takk/Pages/fildactu.php?id=' + id;
}

//Marqueur créé quand on fait la recherche ! Marqueur JAUNE
function createMarkerMotCle(latlng,ville,nom,desc,mot,id) {

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
        commuId:id,
        map: map
    });

    markers.push(markerCle);
    google.maps.event.addListener(markerCle, 'click', onMarkerClick);

}

function searchMotCle(){
    setMapOnAll(null);
    var motcle = encodeURIComponent(document.getElementById("input_commu").value);

    console.log(motcle)

    jQuery.ajax({
        url:"../php/../php/markerMotCle.php?motcle="+motcle,
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            console.log(typeof data)
            // var sdata = JSON.stringify(data);
            var d = JSON.parse(data);
            for (let i=0; i<d.length; i++) {
                nom[i] = d[i].name;
                desc[i] = d[i].description;
                mot[i] = d[i].keyword;
                id[i] = d[i].id;
                geocoder.geocode( { 'address': d[i].city}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        newAddress = results[0].geometry.location;
                        var latlng = new google.maps.LatLng(parseFloat(newAddress.lat()),parseFloat(newAddress.lng()));
                        geoVille = results[0].address_components[0].short_name;
                        createMarkerMotCle(latlng,geoVille,nom[i],desc[i],mot[i],id[i]);
                    }
                });

                document.getElementById("join-list-view").innerHTML="";

                document.getElementById("join-list-view").innerHTML+=
                    "<div class=\"grid-cards-container gtc300 commu-cards-container\">" +
                    "                    <div class=\"card commu-card\">" +
                    "                        <div class=\"card-header\">" +
                    "                        <span class=\"card-title\">" +
                    "                            <a href='http://localhost/Takk/Pages/fildactu.php?id="+d[i][0]+"'>"+d[i][1]+"</a>"+
                    "                        </span>" +
                    "                        </div>" +
                    "                        <div class=\"card-content\">" +
                    "                            <div class=\"commu-infos\">" +
                    "                                <span>"+d[i].city+"</span>" +
                    "                            </div>" +
                    "                            <div class=\"commu-desc\">" +
                    "                                "+d[i].description+
                    "                            </div>\n" +
                    "                            <div class=\"commu-keywords\">" +
                    "                                #"+d[i].keyword+
                    "                            </div>" +
                    "                        </div>" +
                    "                        <div id='blocButton"+d[i].id+"'></div>" +
                    "                    </div>" +
                    "                </div>";

                jQuery.ajax({
                    url:"../php/checkCommu.php?id="+d[i].id,
                    type:"GET",
                    async:false,
                    crossDomain:true,
                    success:function(data){
                        var dt = JSON.parse(data);
                        console.log(dt);
                        if(dt=="non"){
                            document.getElementById("blocButton"+d[i].id).innerHTML+="<button class=\"btn btn-offset btn-secondary\" onclick='joinCommu("+d[i].id+")'>Rejoindre</button>";
                        }
                    },
                    error:function(data){
                    }
                });

            }
        },
        error:function(data){
            console.log('echec')

        }
    });

}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function request() {
    var xhr = getXMLHttpRequest();

    var nom = encodeURIComponent(document.getElementById("nom").value);
    var description = encodeURIComponent(document.getElementById("description").value);
    var motcle = encodeURIComponent(document.getElementById("motcle").value);
    var ville = encodeURIComponent(document.getElementById("ville").value);

    xhr.open("GET", "../php/ajoutCommu.php?nom="+nom+"&description="+description+"&motcle="+motcle+"&ville="+ville, true);
    xhr.send(null);

}

function check(){
    var allFilled = true;

    var inputs = document.getElementsByTagName('input');
    for(var i=0; i<inputs.length; i++){
        if(inputs[i].type == "text"  && inputs[i].value == ''){
            allFilled = false;
            break;
        }
    }
    document.getElementById("buttonvalide").disabled = !allFilled;
}

window.onload = function(){
    var inputs = document.getElementsByTagName('input');
    for(var i=0; i<inputs.length; i++){
        if(inputs[i].type == "text"){
            inputs[i].onkeyup = check;
            inputs[i].onblur = check;
        }
    }
};

// function verifText(value){
//     if(value.length < 1) {
//         document.getElementById('buttonvalide').disabled = false;
//         console.log('ge')
//     } else {
//         document.getElementById('buttonvalide').disabled = true;
//         console.log('aezze')
//
//     }
// }



function verifText(){

    let vnom = document.getElementById('nom').value;
    let vville = document.getElementById('ville').value;
    let vmotcle = document.getElementById('motcle').value;
    let vdescription = document.getElementById('description').value;
    if(vnom.length > 0 && vville.length > 0 && vmotcle.length && vdescription.length > 0 ) {
        document.getElementById('buttonvalide').disabled = false;
    } else {
        document.getElementById('buttonvalide').disabled = true;


    }
}

function joinCommu(id){
    jQuery.ajax({
        url:"../php/joinCommu.php?idAsso="+id,
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            location.reload();
        },
        error:function(data){
        }
    });
}

