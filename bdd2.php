<?php

session_start();

$servername = "localhost";
$username = "id13641339_hortense";
$password = ">yG^B9e^}(MCYS^e";
$dbname = "id13641339_project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php


$sql_theme = "SELECT id, titre_theme FROM theme";
$result_theme = $conn->query($sql_theme);
echo $conn->error;


while ($row = $result_theme->fetch_assoc()) {

$idTh = $row['id'];
$titre_theme = $row["titre_theme"];

?>

<div class ="divTheme">
    <!--
    <span><?php // echo $idTh?></span>
    -->
    <h2><?php echo $titre_theme?></h2>
</div>

<div id="flexSite">
<?php

$sql = "SELECT * FROM site WHERE id_theme = $idTh";
$result = $conn->query($sql);
echo $conn->error;


while ($row = $result->fetch_assoc()) {


$idSite = $row['id'];
$photo = $row['photo'];
$titre = $row['titre_site'];
$texte = $row['texte'];
$commune = $row['commune'];
$pays = $row['pays'];
$accroche = $row['accroche'];
$siteInternet = $row['site_internet'];

    $sql_compteComment = $conn->query("SELECT COUNT(*) FROM `commentaires` where id_site = '$idSite'");
    $row = mysqli_fetch_assoc($sql_compteComment);
    $total = $row['COUNT(*)'];

?>

<div class ="divSite">

    <!--
    <span><?php //echo $row['id'] . "<br>" ?></span>
    -->
    <div id="photoDivSite"><a href=<?php echo "vosCommentaires.php?id=$idSite"?>><img alt="<?php echo ($titre) ?>" src="https://chimaycoupsdecoeur.000webhostapp.com/Photos/<?=$photo?>"></a></div>
    <div id="divLieu">
        <h5 class="lieu"><?php echo ($commune) ?></h5>
        <h5 class="lieu"><?= $pays ?></h5>
    </div>
    <div id="divDetailSites">
        <a class="aTitre" href=<?php echo "vosCommentaires.php?id=$idSite"?>><h4 class="titre"><?php echo ($titre) ?> (<?php echo $total ?>)</h4></a>
        <p><?= ($accroche)?></p>
        <a href="http://<?php echo $siteInternet?>" target="_blank"><?php echo $siteInternet?></a>
    </div>


</div>



<?php

}
?>
</div>

<?php

}

include "footer.php";
?>

</body>
</html>
