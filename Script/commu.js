getCreation();
getInscriptions();

function quit(identifier) {
    // alert($(identifier).data('community'));
    // alert($(identifier).data('user'));
    var idUser = $(identifier).data('user');
    var idCommunity = $(identifier).data('community')
    if(confirm(`Êtes-vous sûre de vouloir quitter la communauté ?`))
    {
        $.ajax({
            url:"../php/quitUserFromCommunity.php",
            method: "POST",
            data:{
                idUser:idUser,
                idCommunity:idCommunity
            },
            success:function(){
                // $("div").find("[data-card='" + idCommunity + "']").css('background-color', '#ccc');
                 $("div").find("[data-card='" + idCommunity + "']").fadeOut('slow');
            }
        });
    }
}

function getCreation() {

    var xhr = getXMLHttpRequest();

    xhr.open("GET", "../php/getCreation.php?", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            getCreation = JSON.parse(xhr.responseText);
            if (getCreation.success) {
                getCreation.data.forEach(function (element) {
                    // console.log(element);

                    var content = `<div class="card blur-card">
                <div class="card-header">
                    <div class="blur-img h-100 w-100"
                         style="background-image: url('../Content/img/mecano.jpg')"></div>
                    <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                    </div>
                    <span class="card-title">
                        ${element.name}
                    </span>
                </div>
                <div class="card-content">
                    <button class="btn btn-link">GÉRER</button>
                </div>`;

                    $("#inner").append(content);


                });
            } else {
                document.getElementById("falseMessage").innerHTML = getCreation.data;
            }
        }
    }
    xhr.send(null);
}


function getInscriptions() {

    var xhr = getXMLHttpRequest();

    xhr.open("GET", "../php/getInscriptions.php?", true);
    var content = "";
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            getCreation = JSON.parse(xhr.responseText);
            if (getCreation.success) {
                getCreation.data.forEach(function (element) {
                    content += `<div data-card="${element.idCommunity}" class="card large-card">
                                    <div class="large-card-img"
                                        style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                                    <div class="large-card-content">
                                        <div class="card-title">${element.name}</div>
                                        <button onclick="quit(this)" id="delete" data-user="${element.idUser}" data-community="${element.idCommunity}" class="btn btn-outline-secondary">quitter</button>
                                    </div>
                                </div>`;

                });
                // var innerInscription = document.getElementById("innerInscription");
                // innerInscription.innerHTML = content;
                $("div#insert").replaceWith(content);
            } else {
                // document.getElementById("falseMessage").innerHTML = getCreation.data;
                // alert('lol')
                // alert('lol')
            }
        }
    }
    xhr.send(null);

}