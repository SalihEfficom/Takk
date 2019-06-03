
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
});

function getCreation(){
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/getCreation.php?", true);
  xhr.send();
  xhr.onreadystatechange = function() {
      let data =xhr.response;
        alert(data);
    }
}