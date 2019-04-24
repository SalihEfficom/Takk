<?php
include 'dbconfig.php';
function checkAuth($log,$pwd){
    
    $conn = connection();
    $pwdHash = md5($pwd);
    $sth = $conn->prepare('SELECT * FROM membre WHERE mail = :mail AND pwd = :pwd');
    $sth->bindValue(':mail',$log,PDO::PARAM_STR);
    $sth->bindValue(':pwd',$pwdHash,PDO::PARAM_STR);
    $sth->execute();

    

    $auth = false;
    $data = $sth->fetch();
    $count = $sth->rowCount();

    if (!empty($data)) { 
        $auth = true;
    }

    return $auth;
}
?> 