<?php
session_start();

include "nav.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    $session_pseudo = $_SESSION['pseudo'];
    $session_admin = $_SESSION['loginAdmin'];


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

<h3>Commentaires de <?= $session_pseudo?></h3>

    <div id="divCommentInd">

    <?php

// Compte le nb de commentaires selon chaque utilisateur
    $sql_compteCommentInd = $conn->query("SELECT COUNT(*) FROM `commentaires` WHERE pseudo_user = '$session_pseudo'");
    $row = mysqli_fetch_assoc($sql_compteCommentInd);
    $total = $row['COUNT(*)'];

    ?>

    <div id="divNbCommentInd">

        <?php
    switch ($total){
        case $total === 0:
            echo "Vous n'avez posté aucun commentaire.";
            break;
        case $total === 1:
            echo "Vous avez posté un commentaire.";
            break;
        case $total > 1:
            echo "Vous avez posté ". $total. " commentaires.";
            break;
    }
?>
    </div>

    <?php
// select de tous les commentaires selon le nom de la session

    $sql_commentInd = "SELECT * FROM commentaires WHERE pseudo_user = '$session_pseudo' ORDER BY date DESC";
    $result = $conn->query($sql_commentInd);
    echo $conn->error;

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $idSite = $row['id_site'];
        $pseudo = $row['pseudo_user'];
        $texteComment = utf8_encode($row['texte_comment']);
        $date = date('d-m-Y', strtotime($row['date']));

        $sql_titre = "SELECT id, titre_site FROM site WHERE id = $idSite";
        $result_titre = $conn->query($sql_titre);
        echo $conn->error;
        while ($row = $result_titre->fetch_assoc()){
            $titreSite = $row['titre_site'];
        }


        ?>

            <form method="post" action="comment_individuel.php">
                <!--
                <label for="idComment">id :</label>
                -->
                <div id="detailCommentInd">
                    <input type="hidden" id="idComment" name="idComment" value="<?= $id ?>">
                    <p><?= utf8_encode($titreSite)?> - <?= $date ?></p>
                    <label for="comment"></label>
                    <textarea id="comment" name="comment" cols="10" rows="10"><?= utf8_encode($texteComment) ?></textarea>
                    <p>
                        <button type="submit">Modifier</button>
                    </p>
                </div>

            </form>

        <?php

    }

}
else{
    echo '<p>Vous n\'êtes pas connecté au site. Vous ne pouvez donc pas accéder à cette page.</p>';
    echo '<p>Merci de vous rendre à la page <a class="aaa" href="connexion.php">Connexion</a>.</p>';
}
?>

</div>



    <?php

$idPost = $_POST['idComment'];
$texteComment2 = $_POST['comment'];
$today = date("Y-m-d");

if(isset($texteComment2)){
    $sql_modifComment = "UPDATE commentaires SET texte_comment = '$texteComment2', date = '$today' WHERE id = $idPost";
    $conn->query($sql_modifComment);

    if ($conn->query($sql_modifComment)) {
        ?>
        <div id="divCommUpdate">
            <p>Merci, <?= $session_pseudo?>.</p>
            <p>Votre commentaire a bien été modifié.</p>
        </div>
        <?php
        header("refresh:2;url=comment_individuel.php");
    }
    else {
        print $conn->error;
    }

}



include "footer.php";
?>


</body>
<?php
