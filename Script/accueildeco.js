function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

window.addEventListener("DOMContentLoaded", (event) => {
   changeImg();
});

async function changeImg(){
    for(var i=1;i<7;++i){

        $('.fond').css("background-image", "url('../Content/img/fond"+i+".png')");
        await sleep(5000);
    }
}