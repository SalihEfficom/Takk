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
                    msg="<p>Contrats : Avec "+d[i][8]+" "+d[i][9]+" le "+d[i][3]+"</p>"
                    msg+="<button id='btnValider' onclick='valideContrat("+d[i][0]+")'>V</button>"
                    msg+="<button id='btnValider' onclick='deleteContrat("+d[i][0]+")'>X</button>"
                }

                if(d[i].isAccepted==1){
                    contrats+="<div id=\"contratAccepte\">Vous avez passé 1 contrat</div><br />";
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