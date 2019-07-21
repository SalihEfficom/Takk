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
                    msg="<p>Contrats : Avec "+d[i].prenom+" "+d[i].nom+" le "+d[i].created_at+"</p>"
                    msg+="<button id='btnValider' onclick='valideContrat()'>Valider contrat</button>"
                }

                if(d[i].isAccepted==1){
                    msg+="Vous avez passé 1 contrat ";
                }
                contrats  += "<div id=\"contratAccepte\"></div>" +
                "         <div id=\"contratAttente\">"+msg+"</div>"
            }
            document.getElementById("contratAccepte").innerHTML=contrats;
        },
        error:function(data){

        }
    });
});

function valideContrat(){

}
