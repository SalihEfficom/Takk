<?php
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: inscription.php");
    exit();
}
echo $_SESSION['username']; 
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

</head>
<body>
<form action="../php/pdo/disconnect.php" method="post">
    <input type="submit" value="Se deconnecter">
</form>
<!---------------------------------------------------------------------------------->

<!-- <div data-include="../comp/menu.html"></div> -->

<!-- Swiper -->
<div class="tabs-name">
    <a href="#slide1">Rejoindre</a>
    <a href="#slide2">Gérer</a>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide " data-hash="slide1">
            <div style="display: none;" class="join-list-view">
                <div class="search-container">
                    <input type="text" class="keywords">
                    <input type="text" class="city">
                    <button class="btn btn-primary"><i class="mdi mdi-map-marker"></i></button>
                </div>
                <div class="grid-cards-container gtc300 commu-cards-container">

                    <div class="card commu-card">
                        <div class="card-header">
                        <span class="card-title">
                            Les mécanos de fives
                        </span>
                        </div>
                        <div class="card-content">
                            <div class="commu-infos">
                                <span>24 membres</span>
                                <span>Roubaix</span>
                            </div>
                            <div class="commu-desc">
                                Bonjour je m'appelle Alex, j'ai 25 ans. Je suis plombier de métier et bricoleur dans
                                l'âme.
                                Je peux m'atterler à tout bricolage du quotidien
                            </div>
                            <div class="commu-keywords">
                                #plombier #bricolage #jardinage
                            </div>
                        </div>
                        <button class="btn btn-offset btn-secondary">rejoindre</button>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCommu-modal">
                        Launch demo modal
                    </button>


                </div>
            </div>
            <div class="join-card-view">
                <div class="join-map" id="map"></div>
                <form method="post" action="" class="recherche_carte">
                    <input type="search" placeholder="Communauté" id="input_commu"
                           onfocusout="searchMotCle()"/>
                    <input type="search" placeholder="Ville" id="input_ville" onfocus="searchVille()"
                           onfocusout="zoomVille(this.value)"/>
                    <button class="btn btn-primary"><i class="mdi mdi-map-marker"></i></button>
                </form>


            </div>
        </div>
        <div class="swiper-slide" data-hash="slide2">
            <span class="heading">Mes créations</span>
            <div class="grid-cards-container gtc186 commu-cards-container">

                <div class="card blur-card">
                    <div class="card-header">
                        <div class="blur-img h-100 w-100"
                             style="background-image: url('../Content/img/mecano.jpg')"></div>
                        <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                        </div>
                        <span class="card-title">
                            Les mécanos de fives
                        </span>
                    </div>
                    <div class="card-content">
                        <button class="btn btn-link">GÉRER</button>
                    </div>
                </div>
                <div class="card blur-card">
                    <div class="card-header">
                        <div class="blur-img h-100 w-100"
                             style="background-image: url('../Content/img/mecano.jpg')"></div>
                        <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                        </div>
                        <span class="card-title">
                            Les mécanos de fives
                        </span>
                    </div>
                    <div class="card-content">
                        <button class="btn btn-link">GÉRER</button>
                    </div>
                </div>
                <div class="card blur-card">
                    <div class="card-header">
                        <div class="blur-img h-100 w-100"
                             style="background-image: url('../Content/img/mecano.jpg')"></div>
                        <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                        </div>
                        <span class="card-title">
                            Les mécanos de fives
                        </span>
                    </div>
                    <div class="card-content">
                        <button class="btn btn-link">GÉRER</button>
                    </div>
                </div>
                <div class="card blur-card">
                    <div class="card-header">
                        <div class="blur-img h-100 w-100"
                             style="background-image: url('../Content/img/mecano.jpg')"></div>
                        <div class="circle-img" style="background-image: url('../Content/img/mecano.jpg')">
                        </div>
                        <span class="card-title">
                            Les mécanos de fives
                        </span>
                    </div>
                    <div class="card-content">
                        <button class="btn btn-link">GÉRER</button>
                    </div>
                </div>
            </div>
            <span class="heading">Mes inscriptions</span>
            <div class="grid-cards-container gtc300 commu-cards-container">
                <div class="card large-card">
                    <div class="large-card-img"
                         style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                    <div class="large-card-content">
                        <div class="card-title">Lycée Robert Schumann</div>
                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                    </div>
                </div>
                <div class="card large-card">
                    <div class="large-card-img"
                         style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                    <div class="large-card-content">
                        <div class="card-title">Lycée Robert Schumann</div>
                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                    </div>
                </div>
                <div class="card large-card">
                    <div class="large-card-img"
                         style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                    <div class="large-card-content">
                        <div class="card-title">Lycée Robert Schumann</div>
                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                    </div>
                </div>
                <div class="card large-card">
                    <div class="large-card-img"
                         style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                    <div class="large-card-content">
                        <div class="card-title">Lycée Robert Schumann</div>
                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                    </div>
                </div>
                <div class="card large-card">
                    <div class="large-card-img"
                         style="background-image: url('http://s1.lprs1.fr/images/2017/10/23/7350837_1854fc40-b819-11e7-ad33-44288a1b6cac-1_1000x625.jpg')"></div>
                    <div class="large-card-content">
                        <div class="card-title">Lycée Robert Schumann</div>
                        <button type="button" class="btn btn-outline-secondary">quitter</button>
                    </div>
                </div>
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
                <input class="in mb-3" type="text" placeholder="Nom" id="nom">
                <textarea class="mb-3" name="newCommu-desc" id="description"
                          placeholder="Décrivez votre communauté en quelques mots ! "></textarea>
                <input class="mb-3 hashtag" type="text" placeholder="#Hashtag" id="motcle">
                <input class="mb-3" type="text" placeholder="ville" id="ville">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">annuler</button>
                <button type="button" class="btn btn-primary" onclick="request();">valider</button>
            </div>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------->
<!-- Swiper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
<script src="../Script/script.js"></script>
<script src="../Script/commu.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBkC_q1SmylBqut6V3kcnknv-uj42_gEFQ&callback=initMap&libraries=places" async defer></script>

</body>
</html>
