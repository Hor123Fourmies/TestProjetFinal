<?php
session_start();
define('PAGE', 'polConf');
include "nav2.php";
?>

    <h2 style="color: #027373; text-align: center">Politique de confidentialité</h2>

    <div style="margin-left: 10%; margin-right: 10%">
        <h4>Photos</h4>
        <p>
            Les photos et illustrations sont soit réalisées par l'auteur du site, soit des images libres de droit.
        </p>

        <h4>Données personnelles</h4>

        <p>
            Les données personnelles collectées sont destinées exclusivement à un usage interne. En aucun cas ces
            données ne seront cédées ou vendues à des tiers.
            Pour toute demande concernant la modification ou la suppression de vos données, veuillez nous écrire via notre formulaire de contact.
            <br><br>
            <a href=contact_form.php>Formulaire de contact</a>
        </p>

    </div>

<?php
include "footer.php";