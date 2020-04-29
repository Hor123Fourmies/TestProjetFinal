<?php

define('PAGE', 'comment_post');

include "nav.php";
include "verif_connexion.php";

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    $session_pseudo = $_SESSION['pseudo'];
}

$today = date("Y-m-d");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);



$sql = "SELECT id, titre_site FROM site";
$result = $conn->query($sql);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
    $idSite = $row['id'];
    $titre = $row['titre_site'];
    echo $titre;
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

<h3>Poster un commentaire</h3>

<form id="comment_form" method="post" action="comment_post.php">
    <fieldset>
        <legend>Insérer votre commentaire</legend>

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

        <p>
            <label for="commentaire">Votre commentaire :</label>
            <textarea name="commentaire" id="commentaire" rows="" cols=""></textarea>
        </p>

        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $session_pseudo ?>"><?php echo $session_pseudo ?>
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
/*
$texte = $_POST['commentaire'];

$sql_postComment = "INSERT INTO commentaires VALUES(NULL, '$idSite','$texte','$session_pseudo','$today')";
if($conn->query($sql_postComment)){
    $retour = "Merci $session_pseudo. Votre commentaire a bien été enregistré.";
    echo $retour;
}
else{
    echo "erreur";
}
*/
?>

</body>
</html>
