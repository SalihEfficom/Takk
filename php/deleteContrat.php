<?php

header("Access-Control-Allow-Origin: *");
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);
$today = date("Y-m-d H:i:s");
$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;
$result = $mysqli->query("DELETE FROM contract WHERE id=".$id);


?>