<?php
include '../php/pdo/getInfoMembre.php';
include '../php/pdo/dbconfig.php';
session_start();
if (!isset($_SESSION['mail']) || !isset($_SESSION['password'])) {
    header("Location: inscription.php");
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
</head>

<body>
    <form action="../php/pdo/disconnect.php" method="post">
        <input type="submit" value="Se deconnecter">
    </form>
    <div class="profil">
        <div id="infoProfil">
            <p>
                <?php echo $getInfoUser['mail'];?>
            </p>
            <p>
                <?php echo $getInfoUser['prenom'];?>
            </p>
            <p>
                <?php echo $getInfoUser['nom'];?>
            </p>
            <p>
                <?php echo $getInfoUser['dateNaiss'];?>
            </p>
            <p>
                <?php echo $getInfoUser['ville'];?>
            </p>
            <p>
                <?php echo $getInfoUser['pays'];?>
            </p>
            <p>
                <?php echo $getInfoUser['tel'];?>
            </p>
            <p>
                <?php echo $getInfoUser['adresse'];?>
            </p>

        </div>

        <div id="editButton">
            <button onclick="myFunction();" class="editButton" id="editButton">editez profil (icone)</button>
        </div>
        
    </div>
    </div class="error">

    </div>
</body>
<script type="text/javascript">
    function myFunction() {

        $(".profil").replaceWith(`<div class="editingProfil">
        <form id="myForm">
            <input value="<?php echo $getInfoUser['nom']; ?>" class="in mb-3" type="text" name="name" id="name" placeholder="Nom">
            <input value="<?php echo $getInfoUser['prenom']; ?>" class="mb-3" type="text" name="firstname" id="firstname" placeholder="Prénom">
            <input class="mb-3" type="date" name="date" id="date" placeholder="Date de naissance">
            <input value="<?php echo $getInfoUser['ville']; ?>" class="mb-3" type="text" name="city" id="city" placeholder="Ville">
            <input type="hidden" id="mail" value="<?php echo $_SESSION['mail']; ?>">
            <input type="hidden" id="password" value="<?php echo $_SESSION['password']; ?>">
            <input class="mb-3" type="text" id="pays" name="pays" placeholder="Pays" required>
            <input class="mb-3" type="text" id="adresse" name="adresse" placeholder="Adresse" required>
            <input class="mb-3" type="tel" id="tel" name="tel" required placeholder="Numéro de téléphone">
            <input type="button" value="Editer" onclick="editSubscribing(readData);"> 

        </form>
    </div>`);

        document.getElementById("date").value = "<?php echo $getInfoUser['dateNaiss']; ?>";


    }
</script>

</html>