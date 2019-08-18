<?php

header("Access-Control-Allow-Origin: *");
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);
$today = date("Y-m-d");
$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;
$result = $mysqli->query("UPDATE contract SET isAccepted=1,closed_at='".$today."' WHERE id=".$id);
echo "UPDATE contract SET isAccepted=1,closed_at='".$today."' WHERE id=".$id;


?>