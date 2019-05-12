<?php
session_start();

if (!isset($_SESSION['user']))
{
    header("Location: inscription.php");
    exit();
}
// echo $_SESSION['user'];
// print_r($_SESSION['user']); 

echo $_SESSION['user']['nom'];
echo '<br>';
echo $_SESSION['user']['prenom'];
echo '<br>';
echo $_SESSION['user']['ville'];
echo '<br>';
echo $_SESSION['user']['dateNaiss'];
echo '<br>';
echo $_SESSION['user']['mail'];
?>