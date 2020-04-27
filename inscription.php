<?php
define('PAGE', 'inscription');
include "nav.php";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

function secureDonneesForm($donnees_form){
    // neutralisation des <>
    $donnees_form = htmlspecialchars($donnees_form);
    // Suppression des espaces inutiles
    $donnees_form = trim($donnees_form);
    // Suppression des \
    $donnees_form = stripslashes($donnees_form);
    return $donnees_form;
}

$pseudo = ($_POST['pseudo']);
$pseudo = secureDonneesForm($pseudo);

$motDePasse = ($_POST['mdp']);
$motDePasse = secureDonneesForm($motDePasse);

$confMotDePasse = ($_POST['mdp2']);
$confMotDePasse = secureDonneesForm($confMotDePasse);

$email = ($_POST['email']);
$email = secureDonneesForm(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

$valide = true;

/* Test : le visiteur a-t-il soumis le formulaire ? */
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {

    /* Vérification de l'existence des variables. On vérifie aussi qu'elles ne soient pas vides */

    if ((isset($pseudo) && !empty($pseudo)) && (isset($motDePasse) && !empty($motDePasse))
        && (isset($confMotDePasse) && !empty($confMotDePasse)) && (isset($email) && !empty($email))) {

        /* Usage exclusif de lettres, de chiffres et _ */
        if (!preg_match('`^\w{3,25}$`', $pseudo)) {
            $valide = false;
            $erreur_pseudo2 = "Certains caractères ne sont pas autorisés ou votre pseudo n'a pas la bonne longueur (entre 3 et 8 caractères).";
        }

        /* on compare les deux mots de passe */
        if ($motDePasse != $confMotDePasse) {
            $valide = false;
            $erreur_mdp2 = "Les deux mots de passe sont différents.";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $valide = false;
            $erreur_email2 = "Votre adresse email n'est pas valide";
        }

        if ($valide){
            $conn = new mysqli($servername, $username, $password);
            $conn->select_db($dbname);
            $motDePasse = sha1($motDePasse);

            /* on recherche si ce pseudo est déjà utilisé par un autre user */

            $sql = $conn->query("SELECT COUNT(*) FROM `user_connexion` where pseudo = '$pseudo'");
            $row = mysqli_fetch_assoc($sql);
            $doublon = $row['COUNT(*)'];

            if ($doublon[0] == 0) {
                $sql_inscription = "INSERT INTO user_validation VALUES(NULL, '$pseudo', '$motDePasse', '$email')";
                if ($conn->query($sql_inscription) == TRUE) {
                    $insertion = "Merci $pseudo. Votre inscription a bien été prise en compte. Elle va être soumise à validation.";
                    // $redirection = "Redirection automatique vers la page 'connexion...'";
                    // session_start();
                    // $_SESSION['pseudo'] = $pseudo;
                    header("refresh:5;url=connexion.php");
                    }
                else{
                    echo "Erreur : " . $sql_inscription . "<br>" . $conn->error;
                }
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
                <input type="text" name="pseudo" id="pseudo" minlength="3" maxlength="25"/>
                <span class="messErrInscription"><?php if (isset($erreur_pseudo)) echo $erreur_pseudo ?></span>
                <span class="messErrInscription"><?php if (isset($erreur_pseudo2)) echo $erreur_pseudo2 ?></span>
                <span class="messErrInscription"><?php if (isset($erreur_doublon)) echo $erreur_doublon ?></span>

            </p>

            <p>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" minlength="6" maxlength="12"/>
                <span class="messErrInscription"><?php if (isset($erreur_mdp)) echo $erreur_mdp ?></span>
            </p>

            <p>
                <label for="mdp2">Confirmation du mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2" minlength="6" maxlength="12"/>
                <span class="messErrInscription"><?php if (isset($erreur_mdp2)) echo $erreur_mdp2 ?></span>
            </p>

            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email"/>
                <span class="messErrInscription"><?php if (isset($erreur_email)) echo $erreur_email ?></span>
                <span class="messErrInscription"><?php if (isset($erreur_email2)) echo $erreur_email2 ?></span>
            </p>



            <P>
                <input type="hidden" name="adresse" id="input_adresse">
            </p>

            <input type="submit" name="inscription" value="Inscription"/>

        </fieldset>

        <div>
            <p style="color:forestgreen"><?php echo $insertion ?></p>
        </div>

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