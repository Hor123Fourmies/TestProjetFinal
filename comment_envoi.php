<?php

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

/*
function secureDonneesForm($donnees_form){
    // neutralisation des <>
    $donnees_form = htmlspecialchars($donnees_form);
    // Suppression des espaces inutiles
    $donnees_form = trim($donnees_form);
    // Suppression des \
    $donnees_form = stripslashes($donnees_form);

    return $donnees_form;
}
*/

$idSite = $_POST['idSite'];

$texte_comment = $_POST['commentaire'];
//$texte_comment = secureDonneesForm($texte_comment);
//$texte_commentA = str_replace("à", "a", $texte_comment);


$pseudo = $_POST['pseudo'];

$today = $_POST['date'];

/*
$sql_postComment = "INSERT INTO commentaires VALUES(NULL, '$idSite', '$texte_comment','$pseudo','$today')";
if($conn->query($sql_postComment)){
    $retour = "Merci $pseudo. Votre commentaire a bien été enregistré.";
    header("refresh:2;url=vosCommentaires.php?id=$idSite");
    echo $retour;
}
else{
    echo "erreur";
}
*/

// Requête préparée

if(!empty($texte_comment)){
    $stmt = $conn->prepare("INSERT INTO commentaires (id_site, texte_comment, pseudo_user, date) VALUES (?,?,?,?)");

    $stmt->bind_param("isss", $idSite, $texte_comment, $pseudo, $today);

    if($stmt->execute()){
        $merci = "Merci $pseudo.";
        $retour = " Votre commentaire a bien été enregistré.";
        print $merci;
        echo '<br>';
        print $retour;
        // header("refresh:2;url=vosCommentaires.php?id=$idSite");
        ?>
        <script lang="JavaScript">
                function redirect() {
                    window.location="https://chimaycoupsdecoeur.000webhostapp.com/vosCommentaires.php?id=<?= $idSite?>"
                }
                setTimeout("redirect()",2500); // delai en millisecondes
            </script>
        <?php
//$stmt->execute();

        $stmt->close();

    }else{
        print $conn->error;
    }
}
else{
    echo "<p>Le champ 'Votre commentaire' est vide.</p>";
    echo "<p>Retour automatique à la page précédente...</p>";
    // header("refresh:2;url=comment_post.php?id=$idSite");
?>
    <script lang="JavaScript">
        function redirect() {
            window.location="https://chimaycoupsdecoeur.000webhostapp.com/comment_post.php?id=<?= $idSite?>"
        }
        setTimeout("redirect()",2500); // delai en millisecondes
    </script>
<?php

}

include "footer2.php";
?>

