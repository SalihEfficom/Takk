<?php
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';

session_start();


if (!isset($_SESSION['mail']) || !isset($_SESSION['password']) )
{
    header("Location: inscription.php");
    exit();
}


$getInfoUser = getInfoMembre($_SESSION['mail'],$_SESSION['password']);


?>

<!DOCTYPE html>
<html lang="en">
<body>
<div id="infoProfil">

    <p>
        <?php echo $getInfoUser['mail']; ?>
    </p>
    <p>
        <?php echo $getInfoUser['prenom']; ?>
    </p>
    <p>
        <?php echo $getInfoUser['nom']; ?>
    </p>
    <p>
        <?php echo $getInfoUser['dateNaiss']; ?>
    </p>
    <p>
        <?php echo $getInfoUser['ville']; ?>
    </p>
</div>
<div id="editButton">
    <button onclick="myFunction();" class="editButton" id="editButton">editez profil (icone)</button>
</div>
</body>
</html>

