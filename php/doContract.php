<?php
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

$idStatut = (isset($_GET["idStatut"])) ? $_GET["idStatut"] : NULL;

$resultStatut = $mysqli->query("SELECT idAuthor from statut where id=". $idStatut);
$row = $resultStatut->fetch_array();
$today = date("Y-m-d H:i:s");
$result = $mysqli->query("INSERT INTO contract(idStatus,idReceiver,created_at,idSender) VALUES(" . $idStatut . "," . $row['idAuthor'] . ", '" . $today . "',".$getInfoUser['id'].")");

$result->close();

?>