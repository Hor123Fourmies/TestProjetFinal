<?php
define('PAGE', 'connexion');
include "nav.php";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";



?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
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
                <span class="messErrConnexion"><?php if (isset($erreur_pseudo)) echo $erreur_pseudo ?></span>
                <span class="messErrConnexion"><?php if (isset($erreur_pseudo2)) echo $erreur_pseudo2 ?></span>

            </p>

            <p>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" minlength="6" maxlength="12"/>
                <span class="messErrConnexion"><?php if (isset($erreur_mdp)) echo $erreur_mdp ?></span>
            </p>

            <P>
                <input type="hidden" name="adresse" id="input_adresse">
            </p>

            <input type="submit" name="connexion" value="Connexion"/>

        </fieldset>

    </body>
</html>