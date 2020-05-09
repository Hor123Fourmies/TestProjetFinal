<?php
session_start();
define('PAGE', 'vosCommentaires');
include "nav.php";

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
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
    $texte = utf8_encode($row['texte']);
    $tarifs = utf8_encode($row['tarifs']);
    $horaires = utf8_encode($row['horaires']);
    $siteInternet = $row['site_internet'];


?>
    <div id="presentation_detail">

        <div id="divPhotoDetail">
            <img alt="<?= $titreSite ?>" src="Photos/<?php echo $photo ?>\">
        </div>

        <div id="divTexteDetail">
            <p class="pTitre"><?php echo utf8_encode($titreSite) ?> </p>
            <p class="pDivTexteDetail"><?php echo nl2br($texte) ?> </p>
            <h5 class="pDivTexteDetail">Horaires</h5>
            <p class="pDivTexteDetail"><?php echo nl2br($horaires) ?> </p>
            <h5 class="pDivTexteDetail">Tarifs</h5>
            <p class="pDivTexteDetail"><?php echo nl2br($tarifs) ?> </p>
            <p class="pDivTexteDetail"><a href="http://<?php echo $siteInternet?>" target="_blank"><?php echo utf8_encode($siteInternet) ?> </a></p>
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
            echo "<p class='pNbComm'>Il n'y a aucun commentaire.</p>";
            break;
        case $cpte_comment === 1:
            echo "<p class='pNbComm'>Il y a un commentaire.</p>";
            break;
        case $cpte_comment > 1:
            echo "<p class='pNbComm'>Il y a ". $cpte_comment. " commentaires.</p>";
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
        <div id="divCommRep">
            <p style="font-size: 12px"><?= "Rédigé par ".$pseudo." le ".$date ?> </p>
            <p><?php echo utf8_encode($texteComment)?></p>
        </div>
        <?php

// Boucle qui affiche les réponses liées aux commentaires

        $sql_reponse = "SELECT * FROM reponse_comment WHERE id_comment = $idComment";
           //$result_comment = $conn->query($sql_comment);
        $result_reponse = mysqli_query($conn, $sql_reponse);
        $conn->query($sql_reponse);
        while ($row = mysqli_fetch_array($result_reponse)){
            $idReponse = $row['idReponse'];
            $texteReponse = $row['texte_reponse'];
            $login = $row['login'];
            $dateR = $row['date_reponse'];
            $dateR = date("d-m-Y");
            ?>
            <div id="divRepAdm">
                <p style="font-size: 12px"> Réponse rédigée par <?=$login?> le <?= $dateR ?></p>
                <p class="pRepAdm"><?= utf8_encode($texteReponse)?></p>

            </div>

            <?php
        }

    }


    ?>

            <div id="divPagination">
                <?php
                for ($i = 1; $i <= $nbPages; $i++) {
                    if ($i == $page) {
                        echo '<b>' . $i . '</b> ';
                    } else {
                        echo '<a href="vosCommentaires.php?id=' . $idSiteGet . '&page=' . $i . '">' . $i . '</a> ';
                    }

                }

                ?>
            </div>
        </div>
        <?php

    }
} else {
    echo $conn->error;
}

?>


<?php
include "footer.php";
?>

    </body>