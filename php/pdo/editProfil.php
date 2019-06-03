<?php
include "verifyFieldsFunctions.php";
include "updateSubscribe.php";
header("Content-Type: application/json");

$textInputs = checkTextInputs($_POST['name'],$_POST['firstname'],$_POST['city']);
$birthDayInput = checkBirthDayInputs($_POST['birthday']);

$pwd = md5($_POST['password']);


if ($textInputs && $birthDayInput) {
    if(updateSubscribe($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['birthday'],$_POST['mail'],$pwd)){
        echo true;
    }else{
        echo false;
    }
} else {
        echo false;
}

?>  