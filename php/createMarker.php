<?php
/**
 * Created by PhpStorm.
 * User: rayan
 * Date: 06/04/2019
 * Time: 14:29
 */

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "takk");

$result = $mysqli->query("SELECT * FROM communaute");
$v = array();
while($row=mysqli_fetch_array($result)){
    $v[] = $row;
}
echo json_encode($v);
$result->close();
?>