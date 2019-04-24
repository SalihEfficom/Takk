<?php
include 'dbconfig.php';

function insertSubscribe($name,$firstname,$city,$birthday,$mail,$password){
    
        $conn = connection();
        $passwordHash = md5($password);
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);
        // $uuid = md5(uniqid($mail,true));

        $req = $conn->prepare("INSERT INTO membre (mail, pwd, dateNaiss, ville, nom, prenom) VALUES (:mail, :pwd, :dateNaiss, :ville, :nom, :prenom)");

        // $data = $req->execute();
        if($req->execute(array(
            "mail" => $mail, 
            "pwd" => $passwordHash,
            "dateNaiss" => $birthday,
            "ville" => $city,
            "nom" => $name,
            "prenom" => $firstname,
            ))){
            // $_SESSION'Auth'] = $data[0];
            return true;
        }
            return false;

}




?>