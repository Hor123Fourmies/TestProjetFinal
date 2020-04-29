<?php

define('PAGE', 'vosCommentaires');
include "nav.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="styles.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>
    <body>

    test
<?php
$idSiteGet = $_GET['id'];

$sql = "SELECT id, titre_site FROM site WHERE id=$idSiteGet";
$result = $conn->query($sql);
echo $conn->error;


while ($row = $result->fetch_assoc()) {

    $idSite = $row['id'];
    $titreSite = $row["titre_site"];
    echo utf8_encode($titreSite);

}

