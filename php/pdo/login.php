<?php
session_start();
include 'checkAuth.php';

if ((isset($_POST['mail']) && !empty($_POST['mail'])) && (isset($_POST['pwd']) && isset($_POST['pwd']))) {
    
    $log = $_POST['mail'];
    $pwd = $_POST['pwd'];

    $checkAuth = checkAuth($log,$pwd);


    
    if ($checkAuth) {
        $_SESSION["username"] = $log;
        header("location: ../../Pages/communaute.php");
        exit();
    } else {
       $error = "Le mot de passe ou l'email est incorrecte.";
       $_SESSION["error"] = $error;
       header("location: ../../Pages/inscription.php");
       exit();
    }
    
} else {
    $error = "Rien est saisie.";
    $_SESSION["error"] = $error;
    header("location: ../../Pages/inscription.php");
    exit();
}





?>