<?php

session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");


$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

$titre = (isset($_GET["titre"])) ? $_GET["titre"] : NULL;
$contenu = (isset($_GET["content"])) ? $_GET["content"] : NULL;
$uev = (isset($_GET["uev"])) ? $_GET["uev"] : NULL;
$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;
$motcle= (isset($_GET["motcle"])) ? $_GET["motcle"] : NULL;

$result = $mysqli->query('INSERT INTO statut(title,txtContent,idAuthor,uevValue,idAsso,motcle) VALUES("' . $titre . '","' . $contenu . '",'. $getInfoUser['id'] .','. $uev.','.$id.',"'.$motcle.'")');

$result->close();

