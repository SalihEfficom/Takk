<?php

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;

if ($result = $mysqli->query("SELECT * from statut JOIN community ON community.id=statut.idAsso where idAsso=".$id)) {

    $v = array();
    while($row = $result->fetch_array()){
        $v[] = $row;
    }
    echo json_encode($v);

    $result->close();
}
