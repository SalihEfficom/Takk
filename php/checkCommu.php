<?php
session_start();
include 'pdo/getInfoMembre.php';
include 'pdo/dbconfig.php';

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;
$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

if ($result = $mysqli->query("SELECT * from user_community WHERE idCommunity=".$id." AND idUser=".$getInfoUser['id'])) {

    $v = array();
    while($row = $result->fetch_array()){
        $v[] = $row;
    }
    if(empty($v)){
        $rep="non";
        echo json_encode($rep);
    }else{
        $rep="yes";
        echo json_encode($rep);
    }

    $result->close();
}
