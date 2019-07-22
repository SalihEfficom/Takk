<?php
session_start();
include 'checkAuth.php';
include 'getInfoMembre.php';


if ((isset($_POST['mail']) && !empty($_POST['mail'])) && (isset($_POST['pwd']) && isset($_POST['pwd']))) {
    
    $log = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $checkAuth = checkAuth($log,$pwd);


    
    if ($checkAuth) {

            // die;
        // var_dump($getUsersInfo);die;
        // $nom = $getUsersInfo['nom'];
        // $prenom = $getUsersInfo['prenom'];
        // $mail = $getUsersInfo['mail'];
        // $dateNaiss = $getUsersInfo['dateNaiss'];
        // $ville = $getUsersInfo['ville'];
        // $id = $getUsersInfo['id'];

        $_SESSION["mail"] = $_POST['mail'];
        $_SESSION["password"] = $_POST['pwd'];
        

        // $user = array( 'nom' => $nom , 'mail' => $log , 'prenom' => $prenom, 'dateNaiss' => $dateNaiss, 'ville' => $ville, 'id' => $id);
        // $_SESSION["user"] = $user;
        header("location: ../../Pages/communaute.php");
        exit();
    } else {
       $error = "Le mot de passe ou l'email est incorrecte.";
       $_SESSION["error"] = $error;
       header("location: ../../Pages/inscription.php#slide-connexion");
       exit();
    }
    
} else {
    $error = "Rien est saisie.";
    $_SESSION["error"] = $error;
    header("location: ../../Pages/inscription.php#slide-connexion");
    exit();
}


?>