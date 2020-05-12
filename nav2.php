<?php

// session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<header>

    <nav>

        <ul id="navUl">
            <li><a href="accueil.php">Accueil</a></li>
            <li class="navTiret"> | </li>
            <li><a href="indexAjax.php">Sites</a></li>
            <li class="navTiret"> | </li>
            <li><a href="carte.php">Carte</a></li>
            <li class="navTiret"> | </li>
            <li><a href="contact_form.php">Contact</a></li>
            <li class="navTiret"> | </li>
            <li><a href="connexion.php">Connexion</a></li>
            <li class="navTiret"> | </li>
            <li><a href="inscription.php">Inscription</a></li>
            <li class="navTiret"> | </li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
        <?php
        if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
            $session_pseudo = $_SESSION['pseudo'];
            ?>
            <div class="divConnSession">
                <p><?= "Bienvenue $session_pseudo"?></p>
                <p><a class="aaa" href="comment_individuel.php">Mes commentaires</a></p>
                <p><a class="aaa" href="deconnexion.php">Se déconnecter</a></p>
            </div>
        <?php
        }

        if (isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
            $session_admin = $_SESSION['loginAdmin'];
            ?>
        <div class="divConnSession">
            <p><?= "Bienvenue $session_admin." ?><p>
            <p><?= "Vous êtes connecté en tant qu'administrateur."?></p>
            <p><a class="aaa" href="pageAdmin.php">Page Admin</a></p>
            <p><a class="aaa" href="deconnexion.php">Se déconnecter</a></p>
        </div>
        <?php
        }

        ?>


    </nav>

</header>
