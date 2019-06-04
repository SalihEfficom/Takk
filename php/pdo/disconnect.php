<?php
session_start();

session_unset();

session_destroy();

header("Location: ../../Pages/accueil_deco.html");


?>
