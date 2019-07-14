<?php
include 'dbconfig.php';

function insertSubscribe($name,$firstname,$city,$birthday,$mail,$password,$pays,$tel){
    
        $conn = connection();
        $passwordHash = md5($password);
        $name = ucfirst($name);
        $firstname = ucfirst($firstname);
        $city = ucfirst($city);
        $pays = ucfirst($pays);
        $uevValue = '0';

        $req = $conn->prepare("INSERT INTO user (id, prenom, nom, email, pwd, birth, city, country, phone, created_at, uevValue) VALUES (null,:prenom, :nom, :email, :pwd, :birth, :city, :country, :phone, :created_at, :uevValue)");

        // $data = $req->execute();
        if($req->execute(array(
            "prenom" => $firstname,
            "nom" => $name,
            "email" => $mail, 
            "pwd" => $passwordHash,
            "birth" => $birthday,
            "city" => $city,
            "country" => $pays,
            "phone" => $tel,
            "created_at" => date("Y-m-d H:i:s"),
            "uevValue" => $uevValue
            ))){
            return true;
        }else{
            return false;
        }
            

}




?>