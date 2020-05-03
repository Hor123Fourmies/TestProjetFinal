<?php

define('PAGE', 'admin');
include "nav.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

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

$loginAdmin = ($_POST['loginAdmin']);
$loginAdmin = secureDonneesForm($loginAdmin);

$motDePasseAdmin = ($_POST['mdpAdmin']);
$motDePasseAdmin = secureDonneesForm($motDePasseAdmin);
// $motDePasseAdmin = sha1($motDePasseAdmin);


if (isset($_POST['connexionAdmin'])) {
    if (!empty($_POST['loginAdmin']) && !empty($_POST['mdpAdmin'])) {
        $sql_adminConnexion = "SELECT login, mdp FROM user_administration";
        $result = $conn->query($sql_adminConnexion);
        while ($row = $result->fetch_assoc()) {
            if ($loginAdmin == $row['login'] && $motDePasseAdmin == $row['mdp']) {
                session_start();
                $_SESSION['loginAdmin'] = $loginAdmin;
                $_SESSION['mdpAdmin'] = $motDePasseAdmin;
                echo "$loginAdmin. Vous êtes connecté en tant qu'administrateur";
                header("refresh:2;url=pageAdmin.php");
            }
            else {
                echo "Vous n'avez pas rentré les bons identifiants.";
                var_dump($motDePasseAdmin);
                //echo $motDePasseAdmin;

            }
        }
    }
    else{
        echo "Les identifiants sont incorrects";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

</body>
</html>
