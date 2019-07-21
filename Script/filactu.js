var bloc="";
var bloc2="";

var url_string = window.location.href;
var url = new URL(url_string);
var id = url.searchParams.get("id");

window.addEventListener("DOMContentLoaded", (event) => {
    jQuery.ajax({
        url:"../php/checkCommu.php?id="+id,
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            var d = JSON.parse(data);
            console.log(d);
            if(d=="non"){
                document.getElementById("blocButton").innerHTML="<button id=\"joinCommu\" onclick=\"joinCommu()\">Rejoindre</button>";
            }
        },
        error:function(data){

        }
    });

    jQuery.ajax({
        url:"../php/getMessage.php?id="+id,
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            console.log("success ajax");
            var d = JSON.parse(data);
            console.log(d);
            for(var i=0;i<d.length;++i){
                console.log(d[i][0]);
                bloc += "<div class=\"commu-cards-container\">" +
                    "                <div class=\"card\">" +
                    "                    <div class=\"card-header\" style=\"background-image: none;\">" +
                    "                        <span class=\"card-title\">"+d[i].title+"</span>" +
                    "                        <img src=\"../Content/img/user.png\" class=\"photo_profil_actu\" alt=\"\">" +
                    "                    </div>" +
                    "                    <div class=\"card-content\">" +
                    "                        <div class=\"commu-infos\">" +
                    "                            <span>"+d[i].txtContent+"</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-desc\" >" +
                    "                            <span id=\"bloc1\"></span>" +
                    "                        </div>\n" +
                    "                        <div class=\"commu-keywords\">" +
                    "                            #"+d[i].keyword+
                    "                            <div id='statutActions"+d[i][0]+"' ><button onclick='doContract("+d[i][0]+")' id='"+d[i][0]+"'>Contrat</button>" +
                    "                            <button>Repondre</button></div>" +
                    "                        </div>" +
                    "                    </div>" +
                    "                </div>" +
                    "            </div>";
            }
            document.getElementById("bloc1").innerHTML=bloc;
        },
        error:function(data){
            console.log("erreur ajax");
            console.log(data);
        }
    });

    jQuery.ajax({
        url:"../php/getMembres.php?id="+id,
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            console.log("success ajax");
            var d = JSON.parse(data);
            console.log(d);
            for(var i=0;i<d.length;++i){
                bloc2 += "<div class=\"commu-cards-container\">" +
                    "                <div class=\"card\" id=\"card\">" +
                    "                    <div class=\"card-header card-header-actu\">" +
                    "                            <span class=\"card-title card-title-actu\" style=\"color: #0054AA;\">" +
                    "                                "+d[i].prenom+" "+d[i].nom+
                    "                            </span>" +
                    "                        <img src=\"../Content/img/drake.png\" class=\"photo_profil_actu\" alt=\"\">" +
                    "                    </div>" +
                    "                    <div class=\"card-content\">" +
                    "                        <div class=\"commu-infos\">" +
                    "                            <span>AJOUTER UNE DESCRIPTION DANS LE PROFIL</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-desc\" >" +
                    "                            <span id=\"bloc2\"></span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-keywords\">" +
                    "                            AJOUTER DES MOT CLE DANS LE PROFIL" +
                    "                        </div>" +
                    "                    </div>" +
                    "                </div>" +
                    "            </div>"
            }
            document.getElementById("bloc2").innerHTML=bloc2;
        },
        error:function(data){
            console.log("erreur ajax");
            console.log(data);
        }
    });
});

function insertComment() {
    var xhr = getXMLHttpRequest();
    var titre = encodeURIComponent(document.getElementById("titre").value);
    var contenu = encodeURIComponent(document.getElementById("contenu").value);
    var uev = encodeURIComponent(document.getElementById("uevValue").value);

    xhr.open("GET", "../php/insertComm.php?titre="+titre+"&content="+contenu+"&uev="+uev+"&id="+id, true);
    xhr.send(null);

    location.reload();
}

function joinCommu(){
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

function doContract(idStatut){
    if(confirm("Êtes-vous sûr de vouloir passer un contrat ?")){
        jQuery.ajax({
            url:"../php/doContract.php?idStatut="+idStatut,
            type:"GET",
            async:false,
            crossDomain:true,
            success:function(data){
                document.getElementById("statutActions"+idStatut).innerHTML="<button>Repondre</button>";
                // location.reload();
            },
            error:function(data){
            }
        });
    }
}