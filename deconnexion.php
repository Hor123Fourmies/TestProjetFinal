

<?php

function deconnexion(){
    session_start();
    session_unset();
    session_destroy();
    header("refresh:2;url=connexion.php");
    echo "vous êtes bien déconnecté";
}

deconnexion();