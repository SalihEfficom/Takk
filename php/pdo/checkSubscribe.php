<?php
include "verifyFieldsFunctions.php";
include "insertSubscribe.php";
date_default_timezone_set('Europe/Paris');
header("Content-Type: application/json");

$textInputs = checkTextInputs($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['pays']);
$birthDayInput = checkBirthDayInputs($_POST['birthday']);
$mailInput = checkMail($_POST['mail']);
$pwdInput = checkPassword($_POST['password']);

$telInput = checkTel($_POST['tel']);
$checkMail = checkDoublons($_POST['mail']); 



if ($textInputs && $birthDayInput && $mailInput && $pwdInput && $telInput && $checkMail) {
    session_start();
    if(insertSubscribe($_POST['name'],$_POST['firstname'],$_POST['city'],$_POST['birthday'],$_POST['mail'],$_POST['password'],$_POST['pays'],$_POST['tel'])){
        $_SESSION["mail"] = $_POST['mail'];
        $_SESSION["password"] = $_POST['password'];
        echo true;
    }else{
        echo false;
    }
} else {
        echo false;
}

?>