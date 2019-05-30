<?php
/**
 * Created by PhpStorm.
 * User: rayan
 * Date: 05/03/2019
 * Time: 13:59
 */


$mysqli = new mysqli("localhost", "root", "", "testtakk");
//include '../connexionBdd/bddTakk.php';
//mysqli_query($con,"SELECT message from poste_message where id_user=1");
//
//mysqli_close($con);
//
//if ($result = $mysqli->query("INSERT INTO user('nom','prenom','email') VALUE ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['mail']."')")) {
//    $row = $result->fetch_array();
//    $result->close();
//}

$query="INSERT INTO user(nom,prenom,email) VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['mail']."')";
var_dump($query);
if (mysqli_query($mysqli, $query)) {
    echo "New record created successfully";
}
$mysqli->close();