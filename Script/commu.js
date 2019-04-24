
function getMessage(){
    jQuery.ajax({
        url:"../php/getMessage.php",
        type:"GET",
        async:false,
        crossDomain:true,
        success:function(data){
            console.log("success ajax");
            console.log(data);
            document.getElementById("bloc1").innerHTML=data;
        },
        error:function(data){
            console.log("erreur ajax");
            console.log(data);
        }
    });
}
