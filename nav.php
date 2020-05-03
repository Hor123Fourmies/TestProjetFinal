<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<header>

    <nav>

        <ul>
            <li><a <?php if(PAGE == 'accueil'){ echo ' class="nav_active"'; } ?> href="accueil.php">Accueil</a></li>
            <li> | </li>
            <li><a <?php if(PAGE == 'indexAjax'){ echo ' class="nav_active"'; } ?> href="indexAjax.php">Sites</a></li>
            <li> | </li>
            <li><a <?php if(PAGE == 'contact'){ echo ' class="nav_active"'; } ?> href="contact_form.php">Contact</a></li>
            <li> | </li>
            <li><a <?php if(PAGE == 'connexion'){ echo ' class="nav_active"'; } ?> href="connexion.php">Connexion</a></li>
            <li> | </li>
            <li><a <?php if(PAGE == 'inscription'){ echo ' class="nav_active"'; } ?> href="inscription.php">Inscription</a></li>
            <li> | </li>
            <li><a <?php if(PAGE == 'admin'){ echo ' class="nav_active"'; } ?> href="admin.php">Admin</a></li>
        </ul>
        <?php
        if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
            $session_pseudo = $_SESSION['pseudo'];
            ?>
            <div class="divConnSession">
                <p><?= "Bienvenue $session_pseudo"?></p>
                <p><a class="aaa" href="deconnexion.php">Se déconnecter</a></p>
            </div>
        <?php
        }

        if (isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
            $session_admin = $_SESSION['loginAdmin'];
            ?>
        <div class="divConnSession">
            <p><?= "Bienvenue $session_admin. Vous êtes connecté en tant qu'administrateur"?></p>
            <p><a class="aaa" href="deconnexion.php">Se déconnecter</a></p>
        </div>
        <?php
        }



        ?>


    </nav>

</header>

