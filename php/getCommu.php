<?php
/**
 * Created by PhpStorm.
 * User: rayan
 * Date: 30/05/2019
 * Time: 17:55
 */
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';

header("Content-Type: text/plain");

header("Access-Control-Allow-Origin: *");
$getInfoUser = getInfoMembre($_SESSION['mail'],$_SESSION['password']);
$_SESSION['id'] = $getInfoUser['id'];
var_dump($_SESSION['id']);
?>