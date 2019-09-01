<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Communautés</title>
    <link rel="stylesheet" href="../Content/site.css">
    <link rel="stylesheet" href="../Content/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>
    <script src="../Script/filactu.js"></script>
</head>
<body>

<?php
    include '../Components/menu.php';
?>

<!---------------------------------------------------------------------------------->
<div id="blocheader" style="margin: 5px;
    border-radius: 5px;
    height: 100px;
    background: rgba(0,0,0,0.5);
    background-image: url(../Content/img/mecano.jpg);
    position: sticky;
    top: 5px;
    background-size: cover;
    z-index: 5;
    background-blend-mode: color;
    background-position: center;">
<!--    <img src="../Content/img/mecano.jpg" class="img_commu" style="width: 100%;height: 130px;" alt="">-->
    <span id="titre_commu">Les mécanos de Five</span>
    <div id="blocButton"></div>
</div>

<!-- Swiper -->
<div class="tabs-name" style="background: #eeeeee; position: sticky; top: 110px;">
    <a href="#slide1">Fil d'actu</a>
    <a href="#slide2">Membres</a>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div id="bloc1" class="swiper-slide " data-hash="slide1" style="padding-top: 40px;">
            <span id="bloc1-span"></span>
        </div>
        <div id="bloc2" class="swiper-slide" data-hash="slide2">

        </div>
    </div>
    <!-- Add Scrollbar -->
    <div class="swiper-scrollbar" style="    top: 151px;"></div>
</div>
<?php
$mess = true;
$contrat = false;
?>

<!-- Modal -->
<div class="modal fade" id="newCommu-modal" tabindex="-1" role="dialog" aria-labelledby="newCommuModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCommuModalLabel">Poster un message </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <?php
                if($mess==true){?>
                    <input class="in mb-3" type="text" placeholder="Titre" id="titre">
                    <textarea class="mb-3" name="contenuMess" id="contenu"
                              placeholder="Votre message... "></textarea>
                    <input type="text" placeholder="Mot clé" id="motcle">
                    <input type="text" placeholder="UEV" id="uevValue">
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">annuler</button>
                <button type="button" class="btn btn-primary" id="buttonvalide"  onclick="insertComment();">valider</button>
            </div>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------->
<!-- Swiper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
<script src="../Script/script.js"></script>
<script src="../Script/commu.js"></script>
</body>
</html>
