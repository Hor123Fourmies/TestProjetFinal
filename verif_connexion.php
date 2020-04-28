
<?php
session_start();
if(!isset($_SESSION['pseudo']))
{
    echo '<p>Vous n\'êtes pas connecté au site. Vous ne pouvez donc pas venir sur cette page.</p>';
    echo '<p>Merci de vous vous rendre à la page <a href="connexion.php">Connexion</a>.</p>';
}
else{

}


?>

