<?php
session_start();
//define('PAGE', 'comment_post');

include "nav2.php";
// include "verif_connexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="Viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Poster un commentaire</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>


<?php


$aujourdhui = date("d-m-Y");
$today = date("Y-m-d");

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
*/

$servername = "localhost";
$username = "id13641339_hortense";
$password = ">yG^B9e^}(MCYS^e";
$dbname = "id13641339_project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) || isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
    $session_pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;
    $session_admin = isset($_SESSION['loginAdmin']) ? $_SESSION['loginAdmin'] : NULL;;

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


<button class="btnAdmin"><a href=<?php echo "vosCommentaires.php?id=$idSiteGet"?>>Retour à la page précédente</a></button>



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
            <input type="hidden" name="site" id="site" value="<?php echo $titre_site?>"><?php echo $titre_site?>
        </p>


        <p>
            <label for="commentaire">Votre commentaire :</label>
            <textarea name="commentaire" id="commentaire" rows="15" cols="20"></textarea>
        </p>

        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="hidden" name="pseudo" id="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL ?>"><?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL ?>
        </p>

        <p>
            <label for="date">Date :</label>
            <input type="hidden" name="date" id="date" value="<?php echo $today ?>"><?php echo $aujourdhui ?>
        </p>

        <p id="pBtnPostComment" >
            <input type="submit" name="PostComment" value="Poster le commentaire">
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

<?php
include "footer.php";
?>

</body>
