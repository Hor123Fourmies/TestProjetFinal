<?php
session_start();

include "nav2.php";

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

if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    $session_pseudo = $_SESSION['pseudo'];
    //$session_admin = $_SESSION['loginAdmin'];
    $session_admin = isset($_SESSION['loginAdmin']) ? $_SESSION['loginAdmin'] : NULL;


?>

    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
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
        case $total == 1:
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
        $texteComment = ($row['texte_comment']);
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
                    <p><?= $titreSite?> - <?= $date ?></p>
                    <label for="comment"></label>
                    <textarea id="comment" name="comment" cols="10" rows="10"><?= $texteComment ?></textarea>
                    <p>
                        <button type="submit" name="modif">Modifier</button>
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

// $idPost = $_POST['idComment'];
$idPost = isset($_POST['idComment']) ? $_POST['idComment'] : NULL;
// $texteComment2 = $_POST['comment'];
$texteComment2 = isset($_POST['comment']) ? $_POST['comment'] : NULL;
$texteComment3 = addslashes($texteComment2);
// $texteComment4 = utf8_decode($texteComment3);
$today = date("Y-m-d");

if (isset($_POST['modif'])) {

    if (!empty($texteComment2)) {

        $sql_modifComment = "UPDATE commentaires SET texte_comment = '$texteComment3', date = '$today' WHERE id = $idPost";
        $conn->query($sql_modifComment);

    if ($conn->query($sql_modifComment)) {
        ?>
        <div class="divCommUpdate">
            <p>Merci, <?= $session_pseudo ?>.</p>
            <p>Votre commentaire a bien été modifié.</p>
        </div>

        <script lang="JavaScript">

            function redirect() {
                window.location = "https://chimaycoupsdecoeur.000webhostapp.com/comment_individuel.php"
            }

            setTimeout("redirect()", 2500); // delai en millisecondes
        </script>
    <?php
    }
    else {
        print $conn->error;
    }
    }
    else{
    ?>
        <div class="divCommUpdate">
            <p>Le champ est vide. Votre commentaire ne peut pas être modifié.</p>
        </div>
        <?php
    }
}


include "footer2.php";
?>


</body>
<?php
