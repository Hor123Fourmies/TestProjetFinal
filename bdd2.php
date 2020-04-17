
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

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

<?php

$sql = "SELECT id, image, titre, texte FROM patrimoine";
$result = $conn->query($sql);
echo $conn->error;


while ($row = $result->fetch_assoc()) {

$titre = $row['titre'];
$texte = $row['texte'];
    ?>


    <div>

        <span><?php echo $row['id'] . "<br>" ?></span>
        <div><img src="<?php echo $row["image"] ?>\"></div>
        <h3 class="titre"><?php echo $titre?></h3>
        <p class="texte"><?php echo utf8_encode($texte) . "<br><br>" ?></p>

    </div>

<?php
}


?>


