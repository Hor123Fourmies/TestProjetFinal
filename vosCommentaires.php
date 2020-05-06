<?php
session_start();
define('PAGE', 'vosCommentaires');
include "nav.php";

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Vos_commentaires</title>
        <link rel="stylesheet" href="styles.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>

    <body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

$idSiteGet = $_GET['id'];

?>

<button class="btnAdmin"><a href="indexAjax.php">Retour aux sites</a></button>

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
            <img alt="<?= $titreSite ?>" src="Photos/<?php echo $photo ?>\">
        </div>

        <div id="divTexteDetail">
            <p class="pTitre"><?php echo utf8_encode($titreSite) ?> </p>
            <p style="margin-left: 5%"><?php echo utf8_encode($texte) ?> </p>

        </div>

    </div>


<?php

// Les commentaires

    ?>

<p class="pBtn"><button class="btnAdmin""><a href=<?php echo "comment_post.php?id=$idSiteGet"?>>Poster un commentaire</a></button></p>


<h3>Commentaires</h3>

        <div id="commentaires_detail">


    <?php

    $total_comment = $conn->query("SELECT COUNT(*) FROM `commentaires` WHERE id_site = $idSiteGet");
    $row = mysqli_fetch_assoc($total_comment);
    $cpte_comment = $row['COUNT(*)'];

    switch ($cpte_comment){
        case $cpte_comment === 0:
            echo "Il n'y a aucun commentaire.";
            break;
        case $cpte_comment === 1:
            echo "Il y a un commentaire.";
            break;
        case $cpte_comment > 1:
            echo "Il y a ". $cpte_comment. " commentaires.";
            break;
    }

    $limite = 6;
    $nbPages = ceil($cpte_comment/$limite);

    if (!isset($_GET['page'])){
        $page = 1;
    }
    else{
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page - 1) * $limite;


    $sql_comment = "SELECT id, texte_comment, pseudo_user, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaires WHERE id_site = $idSiteGet ORDER BY id desc LIMIT $this_page_first_result,$limite";
    //$result_comment = $conn->query($sql_comment);
    $result_comment = mysqli_query($conn, $sql_comment);
    $conn->query($sql_comment);
    echo $conn->error;

    /*
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
    */


    while ($row = mysqli_fetch_array($result_comment)){
        $idComment  = $row['id'];
        $texteComment = $row['texte_comment'];
        $pseudo = $row['pseudo_user'];
        $date = $row['date'];
        ?>
        <p><?= "Rédigé par ".$pseudo." le ".$date ?> </p>
        <p><?php echo utf8_encode($texteComment)?></p>

        <?php

// Boucle qui affiche les réponses liées aux commentaires

        $sql_reponse = "SELECT * FROM reponse_comment WHERE id_comment = $idComment";
           //$result_comment = $conn->query($sql_comment);
        $result_reponse = mysqli_query($conn, $sql_reponse);
        $conn->query($sql_reponse);
        while ($row = mysqli_fetch_array($result_reponse)){
            $idReponse = $row['idReponse'];
            $texteReponse = $row['texte_reponse'];
            ?>
            <p style="color:#027373"><?= utf8_encode($texteReponse)?></p>
            <?php
        }

    }


    ?>

    <div id="divPagination">
        <?php
        for ($i = 1; $i <= $nbPages; $i++){
            if($i == $page){
                echo '<b>'.$i.'</b> ';
            }
else{
    echo '<a href="vosCommentaires.php?id='.$idSiteGet.'&page=' . $i . '">' . $i . '</a> ';
}

        }

        ?>
    </div>
        </div>
<?php

    }
    }

    else{
    echo $conn->error;
    }

    ?>
































</div>
    </body>