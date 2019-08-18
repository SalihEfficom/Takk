<?php

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;

if ($result1 = $mysqli->query("SELECT * from statut 
                                    JOIN community ON community.id=statut.idAsso
                                    where idAsso=".$id." 
                                    "
)){
$result2 = $mysqli->query("SELECT * from comment");


    $v = array();
    while($row = $result1->fetch_array()){
        $v[0][] = $row;
    }

    while($row = $result2->fetch_array()){
        $v[1][] = $row;
    }
    echo json_encode($v);

    $result1->close();
    $result2->close();
}
