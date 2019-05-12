<?php
session_start();
include 'checkAuth.php';
include 'getInfoMembre.php';

if ((isset($_POST['mail']) && !empty($_POST['mail'])) && (isset($_POST['pwd']) && isset($_POST['pwd']))) {
    
    $log = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $checkAuth = checkAuth($log,$pwd);


    
    if ($checkAuth) {

        $getUsersInfo = getInfoMembre($log,$pwd);
        // var_dump($getUsersInfo);die;
        $nom = $getUsersInfo['nom'];
        $prenom = $getUsersInfo['prenom'];
        $mail = $getUsersInfo['mail'];
        $dateNaiss = $getUsersInfo['dateNaiss'];
        $ville = $getUsersInfo['ville'];

        $user = array( 'nom' => $nom , 'mail' => $log , 'prenom' => $prenom, 'dateNaiss' => $dateNaiss, 'ville' => $ville);
        $_SESSION["user"] = $user;
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