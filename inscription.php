<?php
define('PAGE', 'inscription');
include "nav.php";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$pseudo = ($_POST['pseudo']);
$motDePasse = $_POST['mdp'];
$confMotDePasse = $_POST['mdp2'];
$email = $_POST['email'];
$erreurs = 'erreur';

/* Test : le visiteur a-t-il soumis le formulaire ? */
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {

    /* Vérification de l'existence des variables. On vérifie aussi qu'elles ne soient pas vides */

    if ((isset($pseudo) && !empty($pseudo)) && (isset($motDePasse) && !empty($motDePasse))
        && (isset($confMotDePasse) && !empty($confMotDePasse)) && (isset($email) && !empty($email))) {

        /* on compare les deux mots de passe */

        if ($motDePasse != $confMotDePasse) {
            $erreur_mdp2 = 'Les deux mots de passe sont différents.';
        }

        else {
            $conn = new mysqli($servername, $username, $password);
            $conn->select_db($dbname);
            $motDePasse = sha1($motDePasse);

            /* on recherche si ce pseudo est déjà utilisé par un autre user */

            $sql = $conn->query("SELECT COUNT(*) FROM `user_connexion` where pseudo = '$pseudo'");
            $row = mysqli_fetch_assoc($sql);
            $doublon = $row['COUNT(*)'];

            if ($doublon[0] == 0) {
                $sql_inscription = "INSERT INTO user_validation VALUES(NULL,'$pseudo', '$motDePasse', '$email')";
                $conn->query($sql_inscription);
                    echo "ok";
                    session_start();
                    $_SESSION['pseudo'] = $pseudo;
                    // header('onglet1.php');
                    // exit();
            } else {
                $erreur_doublon = 'Un membre possède déjà ce pseudo.';
                echo $erreur_doublon;
                // retour à la page ??
            }
        }
    } else {

        if (empty($pseudo)){
            $erreur_pseudo = "Veuillez indiquer votre pseudo";
        }

        if (empty($motDePasse)){
            $erreur_mdp =  "Veuillez indiquer votre mot de passe";
        }

        if (empty($email)){
            $erreur_email =  "Veuillez indiquer votre email";
        }

    }
}

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

    <h3> Formulaire d'inscription </h3>

    <form id="inscription_form" method="post" action="inscription.php">

        <fieldset>

            <legend>Vos informations d'inscription</legend>

            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"/>
                <span class="messErrInscription"><?php if(isset($erreur_pseudo)) echo $erreur_pseudo?></span>

            </p>

            <p>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp"/>
                <span class="messErrInscription"><?php if(isset($erreur_mdp)) echo $erreur_mdp?></span>
            </p>

            <p>
                <label for="mdp2">Confirmation du mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2"/>
                <span class="messErrInscription"><?php if(isset($erreur_mdp2)) echo $erreur_mdp2?></span>
            </p>

            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email"/>
                <span class="messErrInscription"><?php if(isset($erreur_email)) echo $erreur_email?></span>
            </p>

            <P>
                <input type="hidden" name="adresse" id="input_adresse">
            </p>

            <input type="submit" name="inscription" value="Inscription"/>

</fieldset>


<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>



if(!empty($_POST)){
    $pseudo = ($_POST['pseudo']);
    $motDePasse = $_POST['mdp'];
    $confMotDePasse = $_POST['mdp2'];
    $email = $_POST['email'];

    $valide = true;

    if (empty($adresse)) {
        $valide = false;
    }


    $conn = new mysqli($servername, $username, $password);
    $conn->select_db($dbname);


    /* Je mets aussi certaines sécurités */

    if ($motDePasse == $confMotDePasse) {

        /* Mot de passe crypté */
        $motDePasse = sha1($motDePasse);

        $sql_inscription = "INSERT INTO user_validation VALUES(NULL,'$pseudo', '$motDePasse', '$email')";
            if ($conn->query($sql_inscription)) {

            ?>
            echo "Merci $pseudo. Votre inscription a bien été prise en compte. Elle va être soumise à validation."; ?>

            else {

            ?>
            echo "Les deux mots de passe que vous avez rentrés ne correspondent pas..."; ?>
            }
            }
            }

            /*
            if(empty($pseudo)){
            $valide = false;
            $erreur_pseudo = "Vous n'avez pas rempli votre pseudo.";
            }

            if(empty($motDePasse)){
            $valide = false;
            $erreur_mdp = "Vous n'avez pas rempli votre mot de passe.";
            }

            if(empty($confMotDePasse)){
            $valide = false;
            $erreur_mdp2 = "Vous n'avez pas confirmé votre mot de passe.";
            }

            if(empty($email)){
            $valide = false;
            $erreur_email = "Vous n'avez pas rempli votre email.";
            }
            */
            ?>