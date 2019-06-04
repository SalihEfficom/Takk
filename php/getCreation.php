<?php
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
// header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

session_start();
$mysqli = new mysqli("localhost", "root", "", "takk");
$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);
// var_dump($getInfoUser['id']);
if ($result = $mysqli->query("SELECT * from communaute where admin=".$getInfoUser['id'])) {
   
    $row = $result->fetch_array();
    print_r($row);
    $result->close();
}
