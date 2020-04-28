<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>

<?php

function deconnexion(){
    session_start();
    session_unset();
    session_destroy();
    header("refresh:2;url=connexion.php");
    echo "Déconnexion en cours...
    ";
}

deconnexion();