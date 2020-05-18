<?php
define('PAGE', 'accueil');
include "nav.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="Viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!--
    <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container">
    <div id="carousel_nature" class="carousel slide carousel-fade" data-ride="carousel"
         data-interval="4000" data-pause="hover">

        <ul class="carousel-indicators">
            <li data-target="#carousel_nature" data-slide-to="0" class="active"></li>
            <li data-target="#carousel_nature" data-slide-to="1"></li>
            <li data-target="#carousel_nature" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="chateauTrelon" src="Photos/chateauTrelon.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3 style="color:white">Culture</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="aquascopeVirelles" src="Photos/aquaVirelles.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h3 style="color:white">Nature</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="secretChimay" src="Photos/secretChimay.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3 style="color:white">Aventure</h3>
                </div>
            </div>
        </div>

        <!-- Contrôles -->
        <a class="carousel-control-prev" href="#carousel_nature" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carousel_nature" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
</div>

<div id="divAccueil">
    <p>
        Bienvenue sur mon nouveau site internet, réalisé dans le cadre de mon projet de fin d'année.
    </p>
    <p>
        Je suis heureuse de partager avec vous mes 'coups de coeur' à visiter à Chimay et aux alentours, en Belgique et en France !
    </p>
    <p>
        Il y en a pour tous les goûts : des endroits magiques à découvrir en toutes saisons !
    </p>
</div>


<footer style="height: auto">
    <ul class="ulFooter">
        <li class="liFooter">Copyright 2020</li>
        <li class="liFooter" id="liPlanSite">Plan du site
            <ul class="ulPlan">
                <li class="liPlan"><a class="aFooter" href="accueil.php">Accueil</a></li>
                <li class="liPlan"><a class="aFooter" href="indexAjax.php">Sites</a></li>
                <li class="liPlan"><a class="aFooter" href="carte.php">Carte</a></li>
                <li class="liPlan"><a class="aFooter" href="contact_form.php">Contact</a></li>
                <li class="liPlan"><a class="aFooter" href="connexion.php">Connexion</a></li>
                <li class="liPlan"><a class="aFooter" href="inscription.php">Inscription</a></li>
                <li class="liPlan"><a class="aFooter" href="admin.php">Admin</a></li>
            </ul>
        </li>
        <li class="liFooter"><a <?php if (PAGE == 'mentionsLeg') {
                echo ' class="footer_active"';
            } ?> href="mentionsLeg.php">Mentions légales</a></li>
        <li class="liFooter"><a <?php if (PAGE == 'polConf') {
                echo ' class="footer_active"';
            } ?> href="polConf.php">Politique de confidentialité</a></li>
        <li class="liFooter"><a <?php if (PAGE == 'cgu') {
                echo ' class="footer_active"';
            } ?> href="cgu.php">Conditions d'utilisation</a></li>
        <li class="liFooter"><a <?php if (PAGE == 'contact') {
                echo ' class="footer_active"';
            } ?> href="contact_form.php">Contact</a></li>
    </ul>
</footer>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>