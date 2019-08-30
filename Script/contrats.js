var contrats ="";
var msg="";
window.addEventListener("DOMContentLoaded", (event) => {
    jQuery.ajax({
        url:"../php/getContrat.php?",
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            var d = JSON.parse(data);
            console.log(d);
            for(var i=0;i<d.length;++i){
                if(d[i].isAccepted==null){
                    // msg="Vous avez "+d[i][18]+" contrats en attente";
                    msg="<div class='card' style='margin-bottom: 20px;'> <div class='card-header'>Contrats : Avec "+d[i][8]+" "+d[i][9]+" le "+d[i][3]+"</div> "
                    msg+="<button id='btnValider' onclick='valideContrat("+d[i][0]+")'>V</button>"
                    msg+="<button id='btnRefuser' onclick='deleteContrat("+d[i][0]+")'>X</button> </div>"
                }

                if(d[i].isAccepted==1){
                    contrats+="<div class='card' style='padding: 10px' id=\"contratAccepte\">Vous avez accepté ce contrat</div><br />";
                }
                contrats  += "<div id=\"contratAttente\">"+msg+"</div>"
            }
            document.getElementById("contratAccepte").innerHTML=contrats;
        },
        error:function(data){

        }
    });
});

function valideContrat(id){
    jQuery.ajax({
        url:"../php/validateContrat.php?id="+id,
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

function deleteContrat(id){
    jQuery.ajax({
        url:"../php/deleteContrat.php?id="+id,
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
