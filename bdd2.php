
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
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
    <span><?php echo $idTh?></span>
    <h2><?php echo $titre_theme?></h2>
</div>

<div id="flexSite">
<?php

$sql = "SELECT id, photo, titre_site, commune, texte FROM site WHERE id_theme = $idTh";
$result = $conn->query($sql);
echo $conn->error;


while ($row = $result->fetch_assoc()) {

$titre = $row['titre_site'];
$texte = $row['texte'];
$commune = $row['commune'];

?>

<div class ="divSite">

    <span><?php echo $row['id'] . "<br>" ?></span>
    <div><a href="vosCommentaires.php"><img src="Photos/<?php echo $row["photo"] ?>\"></a></div>
    <a href="contact_form.php"><h4 class="titre"><?php echo utf8_encode($titre) ?></h4></a>
    <h5><?php echo utf8_encode($commune)?></h5>
    <p class="texte"><?php echo utf8_encode($texte) . "<br><br>" ?></p>

</div>



<?php
}
?>
</div>

<?php

}
?>

</body>
</html>
