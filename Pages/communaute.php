<?php
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
session_start();

if (!isset($_SESSION['mail']) || !isset($_SESSION['password']) )
{
    header("Location: inscription.php#slide-connexion");
    exit();
}

$getInfoUser = getInfoMembre($_SESSION['mail'],$_SESSION['password']);

// print_r($getInfoUser);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Communautés</title>
    <link rel="stylesheet" href="../Content/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Script/fonctionxmlhttp.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="../Script/commu_carte.js"></script>
    <script defer src="../Script/commu.js"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>


    <script type="text/javascript">

        function request() {
            if(confirm("Voulez-vous valider cette communauté ?")){
                var xhr = getXMLHttpRequest();

                var nom = encodeURIComponent(document.getElementById("nom").value);
                var description = encodeURIComponent(document.getElementById("description").value);
                var motcle = encodeURIComponent(document.getElementById("motcle").value);
                var ville = encodeURIComponent(document.getElementById("ville").value);

                xhr.open("GET", "../php/ajoutCommu.php?nom="+nom+"&description="+description+"&motcle="+motcle+"&ville="+ville, true);
                xhr.send(null);
                location.reload();
            }
        }

    </script>

</head>
<body>
<!--<form action="../php/pdo/disconnect.php" method="post">-->
<!--    <input type="submit" value="Se deconnecter">-->
<!--</form>-->
<!---------------------------------------------------------------------------------->

<!-- <div data-include="../comp/menu.html"></div> -->
<?php
include '../Components/menu.php';
?>

<!-- Swiper -->
<div class="tabs-name">
    <a href="#slide1">Rejoindre</a>
    <a href="#slide2">Gérer</a>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide " data-hash="slide1">
            <form method="post" action="" class="search-container recherche_carte">
                <input type="search" placeholder="Recherche" id="input_commu" onkeypress="if (event.keyCode==13){searchMotCle();}" />
                <input type="search" placeholder="Ville" id="input_ville" onfocus="searchVille()"
                       onfocusout="zoomVille(this.value)" class="city"/>
            </form>
            <button class="btn btn-primary" id="change-view-btn"><i class="mdi mdi-map-marker"></i></button>

            <div id="join-list-view" class="visible">

            </div>
            <div id="join-card-view" class="swiper-no-swiping">
                <div class="join-map" id="map"></div>
<!--                <form method="post" action="" class="recherche_carte">-->
<!--                    <input type="search" placeholder="Communauté" id="input_commu"-->
<!--                    <input type="search" placeholder="Ville" id="input_ville" onfocus="searchVille()"-->
<!--                           onfocusout="zoomVille(this.value)"/>-->
<!--                    <button id="btn-go-cardview" class="btn btn-primary"><i class="mdi mdi-map-marker"></i></button>-->
<!--                </form>-->


            </div>
        </div>
        <div class="swiper-slide" data-hash="slide2">
            <span class="heading">Mes créations</span>
            <div id="inner" class="grid-cards-container gtc186 commu-cards-container">

            </div>
            <span class="heading">Mes inscriptions</span>
            <div id="innerInscription" class="grid-cards-container gtc300 commu-cards-container">

            </div>
        </div>
    </div>
    <!-- Add Scrollbar -->
    <!--<div>-->
    <div class="swiper-scrollbar"></div>
    <!--</div>-->
</div>

<!-- Modal -->
<div class="modal fade" id="newCommu-modal" tabindex="-1" role="dialog" aria-labelledby="newCommuModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCommuModalLabel">Créer une communauté </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <input class="in mb-3" type="text" placeholder="Nom" id="nom" onkeyup="verifText()">
                <textarea class="mb-3" name="newCommu-desc" id="description"
                          placeholder="Décrivez votre communauté en quelques mots ! " onkeyup="verifText()"></textarea>
                <input class="mb-3 hashtag" type="text" placeholder="#Hashtag" id="motcle" onkeyup="verifText()">
                <input class="mb-3" type="text" placeholder="ville" id="ville" onfocus="searchVilleCrea()" onkeyup="verifText(this.value)">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">annuler</button>
                <button type="button" class="btn btn-primary" disabled="disabled    " id="buttonvalide"  onclick="request();">valider</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("change-view-btn").addEventListener("click", function( event ) {
        console.log('trrh');
        document.getElementById("join-list-view").classList.toggle("visible");
        document.getElementById("join-card-view").classList.toggle("visible");
        this.classList.toggle("flip");
        document.querySelector('#change-view-btn i').classList.toggle('mdi-view-sequential');
    }, false);
</script>
<!---------------------------------------------------------------------------------->
<!-- Swiper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
<script src="../Script/script.js"></script>
<!--<script src="../Script/commu.js"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBkC_q1SmylBqut6V3kcnknv-uj42_gEFQ&callback=initMap&libraries=places" async defer></script>

</body>
</html>
