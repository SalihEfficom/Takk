<?php
include "verifyFieldsFunctions.php";
include "insertSubscribe.php";
header("Content-Type: application/json");

$textInputs = checkTextInputs($_POST['name'],$_POST['firstname'],$_POST['city']);
$birthDayInput = checkBirthDayInputs($_POST['birthday']);
$mailInput = checkMail($_POST['mail']);
$pwdInput = checkPassword($_POST['password']);


if ($textInputs && $birthDayInput && $mailInput && $pwdInput) {
    if(insertSubscribe($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['birthday'],$_POST['mail'],$_POST['password'])){
        echo true;
    }else{
        echo false;
    }
} else {
        echo false;
}

?>