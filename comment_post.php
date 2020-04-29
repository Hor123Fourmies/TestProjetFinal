<?php

define('PAGE', 'comment_post');

include "nav.php";
include "verif_connexion.php";

$today = date("Y-m-d");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

$idSiteGet = $_GET['id'];

$sql = "SELECT id, titre_site FROM site WHERE id=$idSiteGet";
$result = $conn->query($sql);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
    $idSite = $row['id'];
    $titre_site = $row['titre_site'];
}
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

<?php echo $_SESSION['pseudo'];?>

<h3>Poster un commentaire</h3>

<form id="comment_form" method="post" action="comment_envoi.php">
    <fieldset>
        <legend>Insérer votre commentaire</legend>
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
            <label for="idSite">Id :</label>
            <input type="text" name="idSite" id="idSite" value="<?php echo $idSite?>">
        </p>

        <p>
            <label for="site">Site :</label>
            <input type="text" name="site" id="site" value="<?php echo $titre_site?>">
        </p>


        <p>
            <label for="commentaire">Votre commentaire :</label>
            <textarea name="commentaire" id="commentaire" rows="" cols=""></textarea>
        </p>

        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo'] ?>"><?php echo $_SESSION['pseudo'] ?>
        </p>

        <p>
            <label for="date">Date :</label>
            <input type="hidden" name="date" id="date" value="<?php echo $today ?>"><?php echo $today ?>
        </p>

        <p>
            <input type="submit" name="PostComment" id="" value="Poster le commentaire">
        </p>

    </fieldset>
</form>

<?php

