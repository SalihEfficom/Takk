<?php

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "takk");

$nom = (isset($_GET["nom"])) ? $_GET["nom"] : NULL;
$description = (isset($_GET["description"])) ? $_GET["description"] : NULL;
$ville = (isset($_GET["ville"])) ? $_GET["ville"] : NULL;
$motcle = (isset($_GET["motcle"])) ? $_GET["motcle"] : NULL;

$result = $mysqli->query("INSERT INTO communaute(nom,description,ville,motcle) VALUES('".$nom."','".$description."','".$ville."','".$motcle."')");
$result->close();

?>