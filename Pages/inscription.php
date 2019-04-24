<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription | Connexion</title>
    <link rel="stylesheet" href="../Content/site.css">
    <link rel="stylesheet" href="../Content/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="../Script/subscribe.js"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>
</head>
<body>
<div class="tabs-name">
    <a href="#slide-inscription">Inscription</a>
    <a href="#slide-connexion">Connexion</a>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide " data-hash="slide-inscription">
            <form id="myForm"  class=" d-flex flex-column mt-5">
                <input class="in mb-3" type="text" name="name" id="name" placeholder="Nom">
                <input class="mb-3" type="text" name="firstname" id="firstname" placeholder="Prénom">
                <input class="mb-3" type="date" name="date" id="date" placeholder="Date de naissance">
                <input class="mb-3" type="text" name="city" id="city" placeholder="Ville">
                <input class="mb-3" type="text" name="mail" id="mail" placeholder="Mail">
                <input class="mb-3" type="password" name="pwd" required title="Le champs de mot de passe doit contenir ..." id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                <input type="button" value="Se connecter" onclick="verifySubsribe(readData);">
                <div id="message">
                    <h3>Le mot de passe doit contenir:</h3>
                    <p id="minuscule" class="invalid">Une lettre <b>minuscule</b></p>
                    <p id="majuscule" class="invalid">Une lettre <b>majuscule</b></p>
                    <p id="nombre" class="invalid">Un <b>nombre</b></p>
                    <p id="taille" class="invalid">Minimum <b>8 caractères</b></p>
                </div>
                <div id="error">
                </div>
            </form>

        </div>
        <div class="swiper-slide" data-hash="slide-connexion">
            <form action="../php/pdo/login.php" method="POST" class=" d-flex flex-column mt-5">
                <input class="in mb-3" type="text" name="mail" id="mail" placeholder="Mail " required>
                <input class="mb-3" type="password" name="pwd" id="pwd" placeholder="Mot de passe" required>
                <input type="submit" value="Se connecter" class="btn btn-primary">
                <?php
                if(isset($_SESSION["error"]))
                {
                    $error = $_SESSION["error"];
                    echo "<span>$error</span>";
                }
                ?>
            </form>
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
<script>
var myInput = document.getElementById("pwd");   
var letter = document.getElementById("minuscule");
var capital = document.getElementById("majuscule");
var number = document.getElementById("nombre");
var length = document.getElementById("taille");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
// Validate lowercase letters
var lowerCaseLetters = /[a-z]/g;
if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
} else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

// Validate capital letters
var upperCaseLetters = /[A-Z]/g;
if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
} else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
}

// Validate numbers
var numbers = /[0-9]/g;
if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
} else {
    number.classList.remove("valid");
    number.classList.add("invalid");
}

// Validate length
if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
} else {
    length.classList.remove("valid");
    length.classList.add("invalid");
}
}
</script>
</html>
<?php
unset($_SESSION["error"]);
session_unset();
?>
