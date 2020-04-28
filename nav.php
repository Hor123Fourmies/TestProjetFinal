<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
</head>

<!--
<nav>
    <ul>
        <li><a <?php if(PAGE == 'onglet1'){ echo ' class="nav_active"'; } ?> href="onglet1.php">Onglet1</a></li>
        <li><a <?php if(PAGE == 'onglet2'){ echo ' class="nav_active"'; } ?> href="onglet2.php">Onglet2</a></li>
    </ul>
</nav>
-->

<header>

    <nav>

        <ul>
            <li><a class="aNav" <?php if(PAGE == 'accueil'){ echo ' class="nav_active"'; } ?> href="accueil.php">Accueil</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'indexAjax'){ echo ' class="nav_active"'; } ?> href="indexAjax.php">Sites</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'contact'){ echo ' class="nav_active"'; } ?> href="contact_form.php">Contact</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'inscription'){ echo ' class="nav_active"'; } ?> href="inscription.php">Inscription</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'connexion'){ echo ' class="nav_active"'; } ?> href="connexion.php">Connexion</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'deconnexion'){ echo ' class="nav_active"'; } ?> href="deconnexion.php">Déconnexion</a></li>
            <li> | </li>
            <li><a class="aNav" <?php if(PAGE == 'comment_post'){ echo ' class="nav_active"'; } ?> href="comment_post.php">Poster un commentaire</a></li>
        </ul>

    </nav>

</header>

