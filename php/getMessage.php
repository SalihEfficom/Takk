<?php
/**
* Created by PhpStorm.
 * User: rayan
* Date: 05/03/2019
* Time: 09:05
*/
header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "takk");

if ($result = $mysqli->query("SELECT message from poste_message where id_user=1")) {
    $row = $result->fetch_array();
    echo $row['message'];
    $result->close();
}
