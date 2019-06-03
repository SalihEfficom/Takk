<?php
include 'dbconfig.php';

function insertSubscribe($name,$firstname,$city,$birthday,$mail,$password,$adresse,$pays,$tel){
    
        $conn = connection();
        $passwordHash = md5($password);
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);
        $pays = ucfirst($pays);
        // $uuid = md5(uniqid($mail,true));

        $req = $conn->prepare("INSERT INTO membre (mail, pwd, dateNaiss, ville, nom, prenom, pays, adresse, tel) VALUES (:mail, :pwd, :dateNaiss, :ville, :nom, :prenom, :pays, :adresse, :tel)");

        // $data = $req->execute();
        if($req->execute(array(
            "mail" => $mail, 
            "pwd" => $passwordHash,
            "dateNaiss" => $birthday,
            "ville" => $city,
            "nom" => $name,
            "prenom" => $firstname,
            "pays" => $pays,
            "adresse" => $adresse,
            "tel" => $tel
            ))){
            return true;
        }else{
            return false;
        }
            

}




?>