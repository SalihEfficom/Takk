<?php
/**
 * Created by PhpStorm.
 * User: rayan
 * Date: 06/04/2019
 * Time: 14:29
 */

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");

$input_motcle = (isset($_GET["motcle"])) ? $_GET["motcle"] : NULL;
$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$result = $mysqli->query("SELECT * FROM community where keyword like '%".$input_motcle."%'");
$v = array();
while($row=mysqli_fetch_array($result)){
    $v[] = $row;
}
echo json_encode($v);
$result->close();
?>