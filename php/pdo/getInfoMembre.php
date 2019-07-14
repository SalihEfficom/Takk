<?php
// include 'dbconfig.php';

function getInfoMembre($mail,$pwd){

    $conn = connection();
    $pwdHash = md5($pwd);
    $sth = $conn->prepare('SELECT * FROM user WHERE email = :mail AND pwd = :pwd');
    $sth->bindValue(':mail',$mail);
    $sth->bindValue(':pwd',$pwdHash);
    $sth->execute();


    $data = $sth->fetch(PDO::FETCH_ASSOC);

//     var_dump($data);
//    die; 

    return $data;

}







?>