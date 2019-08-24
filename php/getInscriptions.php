<?php
session_start();

include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
header("Content-Type: application/json");


$getInscription = getInscriptions($_SESSION['mail'],$_SESSION['password']);


echo json_encode($getInscription);



function getInscriptions($mail,$mdp){
    $data[] = array("success" => false,"data" => '');
    if(isset($mail,$mdp)){
        $mysqli = new mysqli("localhost", "root", "", "nvtakk");
        $getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);
if ($result = $mysqli->query("SELECT c.name,c.admin,mc.idUser from community c inner join user_community mc on c.id= mc.idCommunity inner join user u on u.id=mc.idUser where mc.idUser =".$getInfoUser['id']." and c.admin !=".$getInfoUser['id'])) {
            $row = $result->fetch_all(PDO::FETCH_LAZY);
            $rowCounts = $result->num_rows;
            if($rowCounts == 0){
                $data = array("success" => false,"data" =>"Vous n'avez actuellement rejoins à aucune communautés de crées.");
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


