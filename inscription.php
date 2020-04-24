<?php
define('PAGE', 'inscription');
include "nav.php";

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
    <h3> Formulaire d'inscription </h3>

<form id="inscription_form" method="post" action="inscription.php">

    <fieldset>

        <legend>Vos informations d'inscription</legend>

        <p>
            <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"/>

        </p>

        <p>
            <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp"/>
        </p>

        <p>
            <label for="mdp2">Confirmation du mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2"/>
        </p>

        <p>
            <label for="email">Adresse e-mail :</label>
                <input type="text" name="email" id="email"/>
        </p>

        <P>
            <input type="hidden" name="adresse" id="input_adresse">
        </p>

        <input type="submit" name="envoi" value="M'inscrire"/>


    </fieldset>

</form>
    </body>
</html>

<?php