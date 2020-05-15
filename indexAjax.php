<?php
define('PAGE', 'indexAjax');
include "nav.php";
//include "bdd2.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>

<!--
<img src="ciel.jpg" id="imageCiel">
<button id="actionUpdate">Click</button>
<p id="dataUpdate">Ce texte va être modifié en utilisant ajax</p>
-->

<div id="dataUpdate">Chargement en cours...</div>


<script src="scriptAjax.js"></script>

<?php
include "footer.php";
?>
</body>
</html>

<?php
