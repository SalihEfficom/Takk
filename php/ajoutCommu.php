<?php
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");



function before ($thisa, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $thisa));
};
$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

$nom = (isset($_GET["nom"])) ? $_GET["nom"] : NULL;
$description = (isset($_GET["description"])) ? $_GET["description"] : NULL;
$ville = before(', France',(isset($_GET["ville"])) ? $_GET["ville"] : NULL);
$motcle = (isset($_GET["motcle"])) ? $_GET["motcle"] : NULL;

$result = $mysqli->query("INSERT INTO community(name,description,city,keyword,admin) VALUES('".$nom."','".$description."','".$ville."','".$motcle."',".$getInfoUser['id'].")");
$resultUser = $mysqli->query("INSERT INTO user_community(idUser,idCommunity) VALUES(".$getInfoUser['id'].",".$mysqli->insert_id.")");

echo "id user : ".$getInfoUser['id'];

$result->close();

?>
