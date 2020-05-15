<?php
session_start();

include "nav2.php";

function deconnexion(){

    session_unset();
    session_destroy();
    // header("refresh:2;url=connexion.php");

    ?>
            <script lang="JavaScript">

                function redirect() {
                    window.location="https://chimaycoupsdecoeur.000webhostapp.com/connexion.php"
                }
                setTimeout("redirect()",2000); // delai en millisecondes
            </script>
    <?php
    //header('Location : https://chimaycoupsdecoeur.000webhostapp.com/connexion.php');
    echo "Déconnexion en cours...";
}
deconnexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="Viewport" content="width=device-width, user-scalable=no">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
include "footer2.php";