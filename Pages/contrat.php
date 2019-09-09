<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contrat</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Content/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>
    <script src="../Script/contrats.js"></script>
    <style>
        .no-plus .menu-btn {
            display: none;
        }

        #btnValider {
            position: absolute;
            right: 28px;
            background: #2acb2a;
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 40px;
            top: -10px;
            box-shadow: 0px 0px 7px #00000045;
        }
        #btnRefuser {
            position: absolute;
            right: -6px;
            background: #d50c0c;
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 40px;
            top: -10px;
            box-shadow: 0px 0px 7px #00000045;
        }
    </style>
</head>
<body>
<div class="no-plus">
    <?php
    include '../Components/menu.php';
    ?>
</div>



<div class="tabs-name">
    <a href="#slide-inscription">Services reçues</a>
    <a href="#slide-connexion">Services rendues</a>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide " data-hash="slide-inscription">
            <div id="blocContrats">
                <span class="heading">Liste contrats</span>
                <div id="contratAccepte"></div>
                <div id="contratAttente"></div>
            </div>
        </div>
        <div class="swiper-slide" data-hash="slide-connexion">
            <div style="text-align: center;
    margin-top: 50px;
    opacity: 0.5;
    font-style: italic;"> Aucun service à rendre</div>
        </div>
    </div>
    <!-- Add Scrollbar -->
    <!--<div>-->
    <div class="swiper-scrollbar"></div>
    <!--</div>-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
<script src="../Script/script.js"></script>
<script src="../Script/commu.js"></script>

</body>
</html>
