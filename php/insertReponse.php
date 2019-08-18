<?php

session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");


$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

$idStatut = (isset($_GET["idStatut"])) ? $_GET["idStatut"] : NULL;
$txtContent = (isset($_GET["txtContent"])) ? $_GET["txtContent"] : NULL;
$today = date("Y-m-d");

$result = $mysqli->query("INSERT INTO comment(txtContent,idUser,posted_at,idStatus) VALUES('" . $txtContent . "'," . $getInfoUser['id'] . ",'". $today ."',". $idStatut.")");

$result->close();

