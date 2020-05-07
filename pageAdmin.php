<?php
session_start();
include "nav.php";


if (isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
            $session_admin = $_SESSION['loginAdmin'];
            ?>


<h4>Valider les nouveaux membres entrants</h4>
<button class="btnAdmin"><a href="validation_admin.php">Valider les nouveaux membres entrants</a></button>

<h4>Afficher tous les membres et leurs commentaires</h4>
<button class="btnAdmin"><a href="comments_admin.php">Répondre aux commentaires</a></button>

<?php

        }
else{
    echo "Vous devez être connecté en tant qu'administrateur pour accéder à cette page.";
}


include "footer.php";
