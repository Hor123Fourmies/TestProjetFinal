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
            Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données vous
            concernant (loi "Informatique et Libertés" du 6 janvier 1978 modifiée).
            Pour toute demande particulière, contactez-nous par notre formulaire de contact.
            <a href=contact_form.php></a>
        </p>


        <h4>Publication de contenu</h4>
        <p>
            Lorsque vous postez un commentaire sur ce site, celui-ci peut être modéré par l'administrateur du site.
            En effet, certains types de contenu sont à proscrire sur les sites internet.
            Il convient alors que chaque message que vous laissez puisser être lu et corrigé (voire supprimé) par
            l'administrateur du site.
            Tout ceci permet d'avoir du contenu de qualité et surtout du contenu adéquat vis-à-vis de la législation.
            Je vous remercie de votre compréhension.
        </p>

    </div>

<?php
include "footer.php";