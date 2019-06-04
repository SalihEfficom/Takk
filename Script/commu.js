
// function getMessage(){
//     jQuery.ajax({
//         url:"../php/getMessage.php",
//         type:"GET",
//         async:false,
//         crossDomain:true,
//         success:function(data){
//             console.log("success ajax");
//             console.log(data);
//             document.getElementById("bloc1").innerHTML=data;
//         },
//         error:function(data){
//             console.log("erreur ajax");
//             console.log(data);
//         }
//     });
// }

window.addEventListener("DOMContentLoaded", (event) => {
    getCreation();
    getInscriptions();
});


function getCreation(){

  var xhr = getXMLHttpRequest();

  xhr.open("GET", "../php/getCreation.php?", true);

  xhr.onreadystatechange = function()
  {
      if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        getCreation = JSON.parse(xhr.responseText);
        
        if(getCreation.success){
            getCreation.data.forEach(function(element) {
                // console.log(element);

                var content = `<div class="card blur-card">
                <div class="card-header">
                    <div class="blur-img h-100 w-100"
                         style="background-image: url('../Content/img/mecano.jpg')"></div>
                    <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                    </div>
                    <span class="card-title">
                        ${element.nom}
                    </span>
                </div>
                <div class="card-content">
                    <button class="btn btn-link">GÉRER</button>
                </div>`;

                $( "#inner" ).append(content);


              });
        }else{
            document.getElementById("falseMessage").innerHTML = getCreation.data;
        }
      }
  }
  xhr.send(null);
}


function getInscriptions(){
    
  var xhr = getXMLHttpRequest();

  xhr.open("GET", "../php/getInscriptions.php?", true);

  xhr.onreadystatechange = function()
  {
      if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        getCreation = JSON.parse(xhr.responseText);
        if(getCreation.success){
            getCreation.data.forEach(function(element) {

                var content = `<div class="card large-card">
                                    <div class="large-card-img"
                                        style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                                    <div class="large-card-content">
                                        <div class="card-title">${element.nom}</div>
                                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                                    </div>
                                </div>`;
                

                $( "#innerInscription" ).append(content);

            });
        }else{
            document.getElementById("falseMessage").innerHTML = getCreation.data;
            alert('lol')
        }
      }
  }
  xhr.send(null);

}