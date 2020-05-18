<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<footer>
    <ul class="ulFooter">
        <li class="liFooter">© 2020</li>
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
        <li class="liFooter"><a <?php if(PAGE == 'mentionsLeg'){ echo ' class="footer_active"'; } ?> href="mentionsLeg.php">Mentions légales</a></li>
        <li class="liFooter"><a <?php if(PAGE == 'polConf'){ echo ' class="footer_active"'; } ?> href="polConf.php">Politique de confidentialité</a></li>
        <li class="liFooter"><a <?php if(PAGE == 'cgu'){ echo ' class="footer_active"'; } ?> href="cgu.php">Conditions d'utilisation</a></li>
        <li class="liFooter"><a <?php if(PAGE == 'contact'){ echo ' class="footer_active"'; } ?> href="contact_form.php">Contact</a></li>
    </ul>
</footer>

<?php