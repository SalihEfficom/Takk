<?php
include 'dbconfig.php';

function updateSubscribe($name,$firstname,$city,$birthday,$mail,$pwd,$pays,$tel){
    
        $conn = connection();
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);
        $pays = ucfirst($pays);

        



        // $req = $conn->prepare("INSERT INTO membre (mail, pwd, dateNaiss, ville, nom, prenom) VALUES (:mail, :pwd, :dateNaiss, :ville, :nom, :prenom)");
        //update 

        $req = $conn->prepare('UPDATE user SET nom = :nom, prenom = :prenom, birth = :birth, city = :city, country = :country, phone = :tel WHERE email = :email AND pwd = :pwd');
       
        // $data = $req->execute();
        if($req->execute(array(
            'nom' => $name,
            'prenom' => $firstname,
            'birth' => date($birthday),
            'city' => $city,
            'country' => $pays,
            'tel' => $tel,
            'email' => $mail,
            'pwd' => $pwd
            ))){
            // $_SESSION'Auth'] = $data[0];
            return true;

        }else{
            return false;
        }

}




?>