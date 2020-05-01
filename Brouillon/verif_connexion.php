<?php

session_start();

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    $session_pseudo = $_SESSION['pseudo'];
    echo "Bienvenue $session_pseudo.";
}
else {
    echo '<p>Vous n\'êtes pas connecté au site. Vous ne pouvez donc pas accéder à cette page.</p>';
    echo '<p>Merci de vous vous rendre à la page <a class="aaa" href="../connexion.php">Connexion</a>.</p>';
    }

echo '<p><a class="aaa" href="../deconnexion.php">Se déconnecter</a></p>';
?>



