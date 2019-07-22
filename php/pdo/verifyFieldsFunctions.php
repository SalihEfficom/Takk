<?php

function checkTextInputs($name,$firstname,$city,$country){
    $ok = false;
    if ((isset($name) && !empty($name)) && (isset($firstname) && !empty($firstname)) && (isset($city) && !empty($city)) && (isset($country) && !empty($country))) {
        $ok = true;
    }
    
    return $ok;
}

function checkBirthDayInputs($birthday){
    $ok = false;
    if (isset($birthday) && !empty($birthday)) {
        $ok = true;
    }

    return $ok;
}

function checkMail($mail){
    $ok = false;
    if (isset($mail) && !empty($mail)) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $ok = true;
        }
        // if (preg_match("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$",$mail)) {
        //     $ok = true;
        // }
    }
    return $ok;     
}

function checkPassword($password){
    $ok = false;
    if (isset($password) && !empty($password)) {
        $ok = true;
    }
    return $ok;
}

function checkTel($tel){
    $ok = false;
    if(preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", $tel)) {
       $ok = true;
    }
    return $ok;
}

function checkDoublons($mail){
    $conn = connection();
    $ok = false;
    $result = $conn->prepare("SELECT * FROM user where email= :mail");
    $result->execute(array(
        "mail" => $mail
    ));

    $num_rows = $result->rowCount();
    if($num_rows < 1){
        return true;
    }

    return $ok;
}

?>