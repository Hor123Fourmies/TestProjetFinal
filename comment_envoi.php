<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

$idSite = $_POST['idSite'];
$texte_comment = utf8_decode($_POST['commentaire']);
$pseudo = $_POST['pseudo'];
$today = $_POST['date'];

$sql_postComment = "INSERT INTO commentaires VALUES(NULL, '$idSite', '$texte_comment','$pseudo','$today')";
if($conn->query($sql_postComment)){
    $retour = "Merci $pseudo. Votre commentaire a bien été enregistré.";
    header("refresh:2;url=vosCommentaires.php?id=$idSite");
    echo $retour;
}
else{
    echo "erreur";
}

?>

</body>
</html>