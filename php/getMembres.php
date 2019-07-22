<?php

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;


if ($result = $mysqli->query("SELECT * from user JOIN user_community ON user_community.idUser=user.id where user_community.idCommunity=".$id)) {

    $v = array();
    while($row = $result->fetch_array()){
        $v[] = $row;
    }
    echo json_encode($v);

    $result->close();
}
