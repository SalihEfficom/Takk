<?php
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
session_start();
if (!isset($_SESSION['mail']) || !isset($_SESSION['password'])) {
    header("Location: accueil_deco.html");
    exit();
}

$getInfoUser = getInfoMembre($_SESSION['mail'], $_SESSION['password']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../Script/editProfil.js"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Content/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Script/fonctionxmlhttp.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="../Script/commu_carte.js"></script>
    <script defer src="../Script/commu.js"></script>
    <script src="../Script/fonctionxmlhttp.js"></script>

    <style>
        .profil-top-container {
            height: 40vh;
            margin: -10px;
            padding: 20px;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: karla;
            color: white;
            font-size: 2rem;
            text-transform: uppercase;
            background-image: linear-gradient(to right top, #ff5722, #ff7142, #ff8860, #ff9e7e, #ffb39b);        }
        .sedeco  {
            background: white;
            border: none;
            font-family: karla;
            text-transform: uppercase;
            font-size: 0.9rem;
            border-radius: 70px;
            padding: 16px;
            box-shadow: 0 0 20px 6px #ff5d296b;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
            top: -16px;
            font-weight: bold;
        }
        .no-plus .menu-btn {
            display: none;
        }
    </style>
</head>


<body>


<div class="no-plus">
    <?php
    include '../Components/menu.php';
    ?>
</div>

<div class="profil-top-container">


    <?php
    $mysqli = new mysqli("localhost", "root", "", "nvtakk");

    $id = (isset($_GET["id"])) ? $_GET["id"] : NULL;

    if ($result = $mysqli->query("SELECT * from user where id=".$id)) {

    $v = array();
    while($row = $result->fetch_array()){
    $v[] = $row;


    //    echo $v;



    ?>

    <div>
        <?php echo $row['prenom'];?>
        <?php echo $row['nom'];?>

    </div>
    <div>
        <?php echo $row['city'];?>  |
        <?php echo $row['country'];?>

    </div>
</div>
<form action="../php/pdo/disconnect.php" method="post" style="width: 100%;">
    <input  class="sedeco" type="submit" value="Se deconnecter">
</form>

<div class="container profil    ">
    <span class="heading"> Contact</span>
    <ul>
        <li>                <?php echo $row['email'];?>
        </li>
        <li>                <?php echo $row['phone'];?>
        </li>
    </ul>
    <?php } $result->close(); } ?>

    <div id="editButton">
        <button onclick="myFunction();" class="editButton btn btn-outline-secondary" id="editButton">editez profil</button>
    </div>
</div>

</div class="error">

</div>
</body>
<script type="text/javascript">
    function myFunction() {

        $(".profil").replaceWith(`<div class="editingProfil">
        <form id="myForm">
            <input value="<?php echo $row['nom']; ?>" class="in mb-3" type="text" name="name" id="name" placeholder="Nom">
            <input value="<?php echo $row['prenom']; ?>" class="mb-3" type="text" name="firstname" id="firstname" placeholder="Prénom">
            <input class="mb-3" type="date" name="date" id="date" placeholder="Date de naissance">
            <input value="<?php echo $row['city']; ?>" class="mb-3" type="text" name="city" id="city" placeholder="Ville">
            <input type="hidden" id="mail" value="<?php echo $_SESSION['mail']; ?>">
            <input type="hidden" id="password" value="<?php echo $_SESSION['password']; ?>">
            <input value="<?php echo $row['country'];?>" class="mb-3" type="text" id="pays" name="pays" placeholder="Pays" required>
            <input value="<?php echo $row['phone'];?>" class="mb-3" type="tel" id="tel" name="tel" required placeholder="Numéro de téléphone">
            <input type="button" class='btn btn-outline-secondary'" value="Editer" onclick="editSubscribing(readData);">

        </form>
    </div>`);

        document.getElementById("date").value = "<?php echo $getInfoUser['birth']; ?>";


    }
</script>

</html>
