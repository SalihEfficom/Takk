<?php

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$result = $mysqli->query("SELECT * FROM community");
$v = array();
while($row=mysqli_fetch_array($result)){
    $v[] = $row;
}
echo json_encode($v);
$result->close();
?>