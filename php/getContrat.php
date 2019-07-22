<?php

header("Access-Control-Allow-Origin: *");
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

if ($result = $mysqli->query("SELECT * from contract JOIN user ON user.id=contract.idSender where idSender=".$getInfoUser['id'])) {

    $v = array();
    while($row = $result->fetch_array()){
        $v[] = $row;
    }
    echo json_encode($v);

    $result->close();
}

?>