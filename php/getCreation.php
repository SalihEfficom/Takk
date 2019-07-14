<?php
session_start();

include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
header("Content-Type: application/json");


$getCreations = getCreations($_SESSION['mail'],$_SESSION['password']);


echo json_encode($getCreations);



function getCreations($mail,$mdp){
    $data[] = array("success" => false,"data" => '');
    if(isset($_SESSION['mail'],$_SESSION['password'])){
        $mysqli = new mysqli("localhost", "root", "", "nvtakk");
        $getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);
        if ($result = $mysqli->query("SELECT * from community where admin=".$getInfoUser['id'])) {
            $row = $result->fetch_all(PDO::FETCH_LAZY);
            $rowCounts = $result->num_rows;
            if($rowCounts == 0){
                $data = array("success" => false,"data" =>"Vous n'avez actuellement aucune communautés de crées.");
            }else{
                $data = array("success" => true,"data" =>$row);
            }

            $result->close();
            
        }else{
            $data = array("success" => false,"data" =>"Echec lors de l'execution de la reuqetes");
        }
    }

    return $data;
}


