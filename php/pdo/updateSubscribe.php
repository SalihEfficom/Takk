<?php
include 'dbconfig.php';

function updateSubscribe($name,$firstname,$city,$birthday,$mail,$pwd,$adresse,$pays,$tel){
    
        $conn = connection();
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);
        $pays = ucfirst($pays);


        // $req = $conn->prepare("INSERT INTO membre (mail, pwd, dateNaiss, ville, nom, prenom) VALUES (:mail, :pwd, :dateNaiss, :ville, :nom, :prenom)");
        //update 

        $req = $conn->prepare('UPDATE membre SET nom = :nom, prenom = :prenom, dateNaiss = :dateNaiss, ville = :ville, pays = :pays, adresse = :adresse, tel = :tel WHERE mail = :mail AND pwd = :pwd');



        // $data = $req->execute();
        if($req->execute(array(
            'nom' => $name,
            'prenom' => $firstname,
            'dateNaiss' => $birthday,
            'ville' => $city,
            'mail' => $mail,
            'pwd' => $pwd,
            'pays' => $pays,
            'adresse' => $adresse,
            'tel' => $tel
            ))){
            // $_SESSION'Auth'] = $data[0];
            return true;
        }else{
            return false;
        }

}




?>