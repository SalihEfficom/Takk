<?php
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: Pages/inscription.php");
    exit();
}
echo $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
</head>

<body>
<!--    <form action="php/pdo/disconnect.php" method="post">-->
<!--        <input type="submit" value="Se deconnecter">-->
<!--    </form>-->
</body>
</html>
