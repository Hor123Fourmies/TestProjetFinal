<?php
session_start();
define('PAGE', 'vosCommentaires');
include "nav.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="styles.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>
    <body>


<?php
if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    $session_pseudo = $_SESSION['pseudo'];
    echo "Bienvenue $session_pseudo.";
}


$idSiteGet = $_GET['id'];

?>
<button><a href=<?php echo "comment_post.php?id=$idSiteGet"?>>Poster un commentaire</button>

<?php

if($sql = "SELECT * FROM site WHERE id=$idSiteGet"){
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

    $idSite = $row['id'];
    $titreSite = $row['titre_site'];
    $photo = $row['photo'];
    $commune = $row['commune'];
    $texte = $row['texte'];


?>
    <div id="presentation_detail">

        <div id="divPhotoDetail">
            <img src="Photos/<?php echo $photo ?>\">
        </div>

        <div id="divTexteDetail">
            <h3><?php echo utf8_encode($titreSite) ?> </h3>
            <p><?php echo utf8_encode($texte) ?> </p>
        </div>

    </div>


<?php
}

// Les commentaires

    ?>
    <h3>Commentaires</h3>

    <div id="commentaires_detail">
    <?php

$sql_comment = "SELECT id, texte_comment, pseudo_user, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaires WHERE id_site = $idSite ORDER BY id desc";
$result_comment = $conn->query($sql_comment);
echo $conn->error;

while($row = $result_comment->fetch_assoc()) {
    $id = $row['id'];
    echo $id;
    echo '<br>';
    $texteComment = $row['texte_comment'];
    echo utf8_encode($texteComment);
    echo '<br>';
    $pseudo = $row['pseudo_user'];
    echo $pseudo;
    echo '<br>';
    $date = $row['date'];
    echo $date;
    echo '<br>';
}

}
else{
    echo $conn->error;
}



?>

    </div>