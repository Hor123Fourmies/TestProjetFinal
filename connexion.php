<?php
define('PAGE', 'connexion');
include "nav.php";
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
*/

$servername = "localhost";
$username = "id13641339_hortense";
$password = ">yG^B9e^}(MCYS^e";
$dbname = "id13641339_project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

function secureDonneesForm($donnees_form){
    // neutralisation des <>
    $donnees_form = htmlspecialchars($donnees_form);
    // Suppression des espaces inutiles
    $donnees_form = trim($donnees_form);
    // Suppression des \
    $donnees_form = stripslashes($donnees_form);
    return $donnees_form;
}


if (isset($_POST['connexion'])) {

    $pseudo = $_POST['pseudo'];
    $pseudo = secureDonneesForm($pseudo);

    $motDePasse = $_POST['mdp'];
    $motDePasse = secureDonneesForm($motDePasse);
    $motDePasse = sha1($motDePasse);

    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $sql_pseudo = $conn->query("SELECT COUNT(*) FROM `user_connexion` where pseudo = '$pseudo'");
        $row = mysqli_fetch_array($sql_pseudo);
        $compte_pseudo = $row['COUNT(*)'];

// Si le pseudo existe
        if ($compte_pseudo != 0) {
            $sql_connexion = "SELECT pseudo, mdp FROM user_connexion WHERE pseudo='$pseudo'";
            $result = $conn->query($sql_connexion);
            while ($row = $result->fetch_assoc()) {
                if ($motDePasse == $row['mdp']) {
                    // session_start();
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['mdp'] = $motDePasse;
                    echo "Bienvenue $pseudo";
                    // header("refresh:2;url=https://chimaycoupsdecoeur.000webhostapp.com/indexAjax.php");
                    ?>
                    <script lang="JavaScript">

                        function redirect() {
                            window.location="https://chimaycoupsdecoeur.000webhostapp.com/indexAjax.php"
                        }
                        setTimeout("redirect()",2500); // delai en millisecondes
                    </script>
                    <?php

                }
                else {
                    $erreur_identifiant = "Vous n'avez pas rentré les bons identifiants.";
                }
            }
        }
        else{
            $erreur_identifiant2 = "Les identifiants sont incorrects.";
        }
    }
    else{
        $erreur_champVide = "Au moins un des champs est vide.";
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
        <title>Inscription</title>
        <link rel="stylesheet" href="styles.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>
    <body>

    <h3> Formulaire de connexion </h3>

    <form id="connexion_form" method="post" action="connexion.php">

        <fieldset>

            <legend>Vos informations de connexion</legend>

            <span>Merci de bien vouloir entrer vos identifiants de connexion afin de pouvoir poster votre commentaire.</span>

            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" minlength="3" maxlength="25"/>
            </p>

            <p>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" minlength="4" maxlength="12"/>
            </p>

            <P>
                <input type="hidden" name="adresse" id="input_adresse">
            </p>

            <span class="messErrConnexion"><?php if (isset($erreur_identifiant)) echo $erreur_identifiant ?></span>
            <span class="messErrConnexion"><?php if (isset($erreur_identifiant2)) echo $erreur_identifiant2 ?></span>
            <span class="messErrConnexion"><?php if (isset($erreur_champVide)) echo $erreur_champVide ?></span>

        </fieldset>
        <p class="pBtn"><input type="submit" name="connexion" value="Connexion"/></p>
    </form>
<!--
    <form  method="post" action="deconnexion.php">
        <input type="submit" id="deconnexion" name="deconnexion" value="Se déconnecter" onclick="deconnexion()">
    </form>

       <p><a class="aaa" href="deconnexion.php">Se déconnecter</a>
-->

    <?php
    include "footer.php";
    ?>

    </body>
</html>