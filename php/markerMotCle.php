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

$tab_key = explode(' ',$input_motcle);

$mysqli = new mysqli("localhost", "root", "", "nvtakk");

$v = array();
$max = sizeof($tab_key);
//for($i=0;$i < $max;$i++){
//    var_dump($i);
//    var_dump("SELECT * FROM community where keyword like '%".$tab_key[$i]."%'");
    $result = $mysqli->query("SELECT * FROM community where keyword like '%".$input_motcle."%'");
    while($row=mysqli_fetch_array($result)){
        $v[] = $row;
    }
//}
//var_dump($v);
echo json_encode($v);
$result->close();
?>