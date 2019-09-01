var bloc="";
var bloc2="";
var bloccomment="";
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
            // console.log(d);

            for(var i=0;i<d[0].length;++i){
                bloc = "<div class=\"commu-cards-container\">" +
                    "                <div class=\"card\">" +
                    "                    <div id=\"card-content"+d[0][i][0]+"\" class=\"card-content\">" +
                    "                        <div class=\"commu-infos\">" +
                    "                            <span>"+d[0][i].title+"</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-infos\">" +
                    "                            <span>"+d[0][i].txtContent+"</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-desc\" >" +
                    "                            <span id=\"bloc1\"></span>" +
                    "                        </div>\n" +
                    "                        <div class=\"commu-keywords\">" +
                    "                            #"+d[0][i].motcle+
                    "                            <div style='display: flex;' id='statutActions"+d[0][i][0]+"' ><button style='margin-left: auto;margin-right: 10px;' class='btn' onclick='doContract("+d[0][i][0]+")' id='"+d[0][i][0]+"'> <i class='mdi mdi-file-document-box-outline'></i> Contrat</button>" +
                    "                            <button class='btn-secondary btn' id='repMessage"+d[0][i][0]+"' onclick='comment("+d[0][i][0]+")'><i class='mdi mdi-message-reply-text'></i></button></div>" +
                    "                        </div>" +
                    "                        <div class=\"commu-uev\" >" +
                    "                            <span>UEV : "+d[0][i].uevValue+"</span>" +
                    "                        </div>" +
                    "                    </div>"+
                    "                </div>" +
                    "            </div>";

                jQuery("#bloc1-span").after(bloc);

                for(var x=0;x<d[1].length;++x) {
                    if (typeof d[0][x] !== 'undefined' && typeof d[1][x] !== 'undefined') {
                        if (d[1][x][4] == d[0][i][0]) {
                            jQuery("#card-content" + d[0][i][0]).after("<p>" + d[1][x][1] + " " + d[1][x][3] + "</p>");
                        }
                    }
                }
            }
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
            // console.log(d);
            for(var i=0;i<d.length;++i){
                bloc2 += "<div class=\"commu-cards-container\">" +
                    "                <div class=\"card\" id=\"card\">" +
                    "                    <div class=\"card-header card-header-actu\">" +
                    "                            <a class=\"card-title card-title-actu\" style=\"color: #0054AA;\">" +
                    "                               <a href='http://localhost/Takk/Pages/profil_user.php?id="+d[i][0]+"' >"+d[i].prenom+" "+d[i].nom+"</a>"+
                    "                            </span>" +
                    "                    </div>" +
                    "                    <div class=\"card-content\">" +
                    "                        <div class=\"commu-infos\">" +
                    "                            <span>"+d[i][6]+"</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-desc\" >" +
                    "                            <span id=\"bloc2\">"+d[i][3]+"</span>" +
                    "                        </div>" +
                    "                        <div class=\"commu-keywords\">" +
                    "                            "+
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

function comment(id){
    jQuery('comment'+id).remove();
    jQuery('commentButton'+id).remove();
    jQuery('#card-content'+id).after('<textarea placeholder="Veuillez saisir votre message" id="comment'+id+'"></textarea><button class="btn btn-primary" id="commentButton'+id+'" onclick="sendComment('+id+')">Valider</button>');
    jQuery('#repMessage'+id).attr("disabled", true);
}

function sendComment(id){
    var value = jQuery('#comment'+id).val();
    jQuery.ajax({
        url:"../php/insertReponse.php?idStatut="+id+"&txtContent="+value,
        type:"GET",
        async:false,
        crossDomain:true
    });

    jQuery('#repMessage'+id).attr("disabled", false);
    jQuery('.card-content'+id).after('<p>'+jQuery('#comment'+id).val()+'</p>');
    jQuery('#comment'+id).remove();
    jQuery('#commentButton'+id).remove();
}

function insertComment() {
    var xhr = getXMLHttpRequest();
    var titre = encodeURIComponent(document.getElementById("titre").value);
    var contenu = encodeURIComponent(document.getElementById("contenu").value);
    var uev = encodeURIComponent(document.getElementById("uevValue").value);
    var motcle = encodeURIComponent(document.getElementById("motcle").value);

    xhr.open("GET", "../php/insertComm.php?titre="+titre+"&content="+contenu+"&uev="+uev+"&id="+id+"&motcle="+motcle, true);
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
                document.getElementById("statutActions"+idStatut).innerHTML="<button style='margin-left: auto;' class='btn btn-secondary'><i class='mdi mdi-message-reply-text'></i></button>";
                location.reload();
            },
            error:function(data){
            }
        });
    }
}
