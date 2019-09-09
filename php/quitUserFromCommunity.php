<?php
$conn = mysqli_connect("localhost", "root", "", "nvtakk"); //DB Connection
if(isset($_POST["idCommunity"]) && isset($_POST["idUser"]))
{
    $idComm = $_POST["idCommunity"];
    $idUser = $_POST["idUser"];
 $sql = "DELETE FROM user_community WHERE idUser='".$idUser."' AND idCommunity='".$idComm."'";
 mysqli_query($conn, $sql);
}
?>