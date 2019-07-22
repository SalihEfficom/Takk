<?php

session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

$id = (isset($_GET["idAsso"])) ? $_GET["idAsso"] : NULL;

$result = $mysqli->query("INSERT INTO user_community(idUser,idCommunity) VALUES('" . $getInfoUser['id'] . "'," . $id . ")");

echo "INSERT INTO user_community(idUser,idCommunity) VALUES('" . $getInfoUser['id'] . "'," . $id . ")";

$result->close();

