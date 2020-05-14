<?php

define('PAGE', 'admin');
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


if (isset($_POST['connexionAdmin'])) {

    $loginAdmin = $_POST['loginAdmin'];
    $loginAdmin = secureDonneesForm($loginAdmin);

    $motDePasseAdmin = $_POST['mdpAdmin'];
    $motDePasseAdmin = secureDonneesForm($motDePasseAdmin);
// $motDePasseAdmin = sha1($motDePasseAdmin);

    if (!empty($_POST['loginAdmin']) && !empty($_POST['mdpAdmin'])) {
        $sql_adminConnexion = "SELECT login, mdp FROM user_administration";
        $result = $conn->query($sql_adminConnexion);
        while ($row = $result->fetch_assoc()) {
            if ($loginAdmin == $row['login'] && $motDePasseAdmin == $row['mdp']) {
                // session_start();
                $_SESSION['loginAdmin'] = $loginAdmin;
                $_SESSION['mdpAdmin'] = $motDePasseAdmin;
                echo "$loginAdmin. Vous êtes connecté en tant qu'administrateur.";
                // header("refresh:2;url=pageAdmin.php");

                echo '<script lang="JavaScript">

                function redirect() {
                    window.location="https://chimaycoupsdecoeur.000webhostapp.com/pageAdmin.php"
                }
                setTimeout("redirect()",2000); // delai en millisecondes
            </script>';
            }
            else {
                echo "Vous n'avez pas rentré les bons identifiants.";
                // var_dump($motDePasseAdmin);
                //echo $motDePasseAdmin;

            }
        }
    }
    else{
        echo "Les identifiants sont incorrects.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>



<h3> Page administrateur </h3>

<form id="connexion_form" method="post" action="admin.php">

    <fieldset>

        <legend>Formulaire administrateur</legend>

        <p>
            <label for="loginAdmin">Login :</label>
            <input type="text" name="loginAdmin" id="loginAdmin" minlength="2" maxlength="15"/>
        </p>

        <p>
            <label for="mdpAdmin">Mot de passe :</label>
            <input type="password" name="mdpAdmin" id="mdpAdmin" minlength="2" maxlength="12"/>
        </p>

        <P>
            <input type="hidden" name="adresse" id="input_adresse">
        </p>

    </fieldset>

    <p class="pBtn"><input type="submit" name="connexionAdmin" value="ConnexionAdmin"/></p>

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
