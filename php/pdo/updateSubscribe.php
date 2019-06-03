<?php
include 'dbconfig.php';

function updateSubscribe($name,$firstname,$city,$birthday,$mail,$pwd){
    
        $conn = connection();
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);


        // $req = $conn->prepare("INSERT INTO membre (mail, pwd, dateNaiss, ville, nom, prenom) VALUES (:mail, :pwd, :dateNaiss, :ville, :nom, :prenom)");
        //update 

        $req = $conn->prepare('UPDATE membre SET nom = :nom, prenom = :prenom, dateNaiss = :dateNaiss, ville = :ville WHERE mail = :mail AND pwd = :pwd');



        // $data = $req->execute();
        if($req->execute(array(
            'nom' => $name,
            'prenom' => $firstname,
            'dateNaiss' => $birthday,
            'ville' => $city,
            'mail' => $mail,
            'pwd' => $pwd
            ))){
            // $_SESSION'Auth'] = $data[0];
            return true;
        }
            return false;

}




?>