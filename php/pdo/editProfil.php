<?php
include "verifyFieldsFunctions.php";
include "updateSubscribe.php";
header("Content-Type: application/json");

$textInputs = checkTextInputs($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['pays'],$_POST['adresse']);

$birthDayInput = checkBirthDayInputs($_POST['birthday']);

$telInput = checkTel($_POST['tel']);

$pwd = md5($_POST['password']);


if ($textInputs && $birthDayInput && $telInput) {
    if(updateSubscribe($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['birthday'],$_POST['mail'],$pwd,$_POST['adresse'],$_POST['pays'],$_POST['tel'])){
        echo true;
    }else{
        echo false;
    }
} else {
        echo false;
}

?>  