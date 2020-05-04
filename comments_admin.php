<?php

include "nav.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

$sql_comments = "SELECT * FROM commentaires ORDER BY id DESC";
$result = $conn->query($sql_comments);
echo $conn->error;

$today = date("Y-m-d");

?>
    <div id="comments_admin">
        <?php

while ($row = $result->fetch_assoc()) {
    $idCommentaire = $row['id'];
    $idSite = $row['id_site'];
    $commentaire = $row['texte_comment'];


    $sql_titre = "SELECT id, titre_site FROM site WHERE id = $idSite";
    $result_titre = $conn->query($sql_titre);
    echo $conn->error;
    while ($row = $result_titre->fetch_assoc()){
        $titreSite = $row['titre_site'];

        ?>
            <span> <?= $idCommentaire?></span>
            <span> <?= utf8_encode($titreSite)?></span>
            <span><?= $commentaire ?></span>

        <?php
echo '<br>';
    }

}
?>
    </div>

<form id="form_reponse" method="post" action="comments_admin.php">
                <!--
                <label for="idComment">id :</label>
                -->

        <label for="idComment">Id du commentaire :</label>
        <input id="idComment" name="idComment" value="">

        <label for="reponse">Réponse</label>
        <textarea id="reponse" name="reponse" cols="10" rows="10"></textarea>
        <label for="login">Login :</label>
        <input type="hidden" id="login" name="login" value="Admin">Admin
        <label for="today">Date :</label>
        <input type="hidden" id="today" name="today" value="<?=$today?>"><?=$today?>
        <p>
            <button type="submit">Répondre</button>
        </p>

</form>

<?php

$idPost = $_POST['idComment'];
$reponse = $_POST['reponse'];
$login = $_POST['login'];
$date = $_POST['today'];


if(isset($idPost) && isset($reponse) && isset($login) && isset($date)) {
    $stmt = $conn->prepare("INSERT INTO reponse_comment (id_comment, texte_reponse, login, date_reponse) VALUES (?,?,?,?)");
    $stmt->bind_param("isss", $idPost, $reponse, $login, $date);


    if($stmt->execute()){
        print 'reponse ok';

    }else{
        print $conn->error;
    }

}


//$stmt->execute();

$stmt->close();
