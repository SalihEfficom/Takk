<?php
function checkTextInputs($name,$firstname,$city){
    $ok = false;
    if ((isset($name) && !empty($name)) && (isset($firstname) && !empty($firstname)) && (isset($city) && !empty($city))) {
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

?>