<?php
define('PAGE', 'accueil');
include "nav.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="Viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container">
    <div id="carousel_nature" class="carousel slide carousel-fade" data-ride="carousel"
         data-interval="4000" data-pause="hover">

        <ul class="carousel-indicators">
            <li data-target="#carousel_nature" data-slide-to="0" class="active"></li>
            <li data-target="#carousel_nature" data-slide-to="1"></li>
            <li data-target="#carousel_nature" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="" src="Photos/chateauChimay.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Culture</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="" src="Photos/grangePapillons.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h3 style="color:white">Nature</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="" src="Photos/aquascope.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3 style="color:white">Aventure</h3>
                </div>
            </div>
        </div>

        <!-- Contrôles -->
        <a class="carousel-control-prev" href="#carousel_nature" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carousel_nature" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php

echo "Je vous souhaite la bienvenue sur mon site et suis heureuse de partager avec vous mes coups de coeur à visiter à Chimay et aux alentours, en Belgique et en France !";

include "footer.php";
?>

</body>
</html>