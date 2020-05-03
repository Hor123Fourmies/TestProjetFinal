<?php
session_start();
//define('PAGE', 'comment_post');

include "nav.php";
// include "verif_connexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poster un commentaire</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>

<?php


$aujourdhui = date("d-m-Y");
$today = date("Y-m-d");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) || isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
    $session_pseudo = $_SESSION['pseudo'];
    $session_admin = $_SESSION['loginAdmin'];

$idSiteGet = $_GET['id'];
$phrase = "Vous n'êtes pas connecté au site. Vous ne pouvez donc pas accéder à cette page.";


$sql = "SELECT id, titre_site FROM site WHERE id=$idSiteGet";
$result = $conn->query($sql);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
    $idSite = $row['id'];
    $titre_site = $row['titre_site'];
}
?>




<h3>Poster un commentaire</h3>

<form id="comment_form" method="post" action="comment_envoi.php">
    <fieldset>
        <legend>Insérez votre commentaire</legend>
        <!--
        <p>
            <label for="site">Site :</label>
            <select name="site" id="site">
                <option value="">Veuillez effectuer votre choix :</option>
                <option value="1"<?php if ($idSite === '1') { echo "selected = 'selected'";}?>>Château de Trelon</option>
                <option value="2"<?php if ($idSite === '2') { echo "selected = 'selected'";}?>>Château de Chimay</option>
                <option value="3"<?php if ($idSite === '3') { echo "selected = 'selected'";}?>>Grange aux papillons</option>
                <option value="4"<?php if ($idSite === '4') { echo "selected = 'selected'";}?>>Grottes de Neptune</option>
            </select>
        </p>
 -->
        <p>
            <!--
            <label for="idSite">Id :</label>
           -->
            <input type="hidden" name="idSite" id="idSite" value="<?php echo $idSite?>">
        </p>

        <p>
            <label for="site">Site :</label>
            <input type="hidden" name="site" id="site" value="<?php echo utf8_encode($titre_site)?>"><?php echo utf8_encode($titre_site)?>
        </p>


        <p>
            <label for="commentaire">Votre commentaire :</label>
            <textarea name="commentaire" id="commentaire" rows="15" cols="20"></textarea>
        </p>

        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']?>"><?php echo $_SESSION['pseudo']?>
        </p>

        <p>
            <label for="date">Date :</label>
            <input type="hidden" name="date" id="date" value="<?php echo $today ?>"><?php echo $aujourdhui ?>
        </p>

        <p>
            <input type="submit" name="PostComment" id="" value="Poster le commentaire">
        </p>

    </fieldset>
</form>

<?php
}
else{
    echo '<p>Vous n\'êtes pas connecté au site. Vous ne pouvez donc pas accéder à cette page.</p>';
    echo '<p>Merci de vous rendre à la page <a class="aaa" href="connexion.php">Connexion</a>.</p>';
}

?>
</body>
