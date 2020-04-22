<?php
define('PAGE', 'contact');
include "nav.php";


if (!empty($_POST)) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    $valide = true;

    if (empty($nom)) {
        $valide = false;
        $erreur_nom = "Vous n'avez pas rempli votre nom.";
    }

    if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $email))  {
            $valide  = false;
            $erreur_email2 = "Votre email n'est pas valide.";
    }

   /*
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valide = false;
            $erreur_email = "Votre email n'est pas valide.";
        }
*/
    if (empty($email)) {
        $valide = false;
        $erreur_email = "Vous n'avez pas rempli votre mail.";
    }

    if (empty($message)) {
        $valide = false;
        $erreur_message = "Vous n'avez pas rempli votre message.";
    }

    if ($valide) {
        echo 'tous les champs sont bien remplis';
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




<h3> Formulaire de contact </h3>


<form id="contact_form" method="post" action="contact_form.php">

    <fieldset>

        <legend>Vos coordonnées</legend>

        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) echo $nom?> "/>
            <span class="messErrContactForm"><?php if(isset($erreur_nom)) echo $erreur_nom?></span>
        </p>

        <p>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email?> "/>
            <span class="messErrContactForm"><?php if(isset($erreur_email)) echo $erreur_email?></span>
            <span class="messErrContactForm"><?php if(isset($erreur_email2)) echo $erreur_email2?></span>


        </p>

    </fieldset>

    <fieldset>

        <legend>Votre message :</legend>

        <p>
            <label for="objet">Objet :</label>
            <input type="text" name="objet" id="objet" value="<?php if(isset($objet)) echo $objet?>" />
        </p>

        <p>
            <label for="message">Message :</label>
            <textarea name="message" id="message" cols="20" rows="10"></textarea>
            <span class="messErrContactForm"><?php if(isset($erreur_message)) echo $erreur_message?></span>
        </p>

    </fieldset>

    <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer votre message" /></div>

</form>


</body>
</html>
