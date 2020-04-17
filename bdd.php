<?php



?>
************************
<a href="bdd.php?afficher_texte=1">Cliquez ici</a><br>
<?php if (!empty($_GET['afficher_texte'])): ?>
    <div>
        <?php echo 'hello';?>
    </div>
<?php endif; ?>

************************
<?php
// On teste d'abord si "Afficher..." vaut "on"
// Si oui : On change les styles du bloc pour l'afficher,
// On attribue une nouvelle valeur "Masquer..." au bouton
// On ré-attribue la valeur "off" à l'input hidden
// qui cachera le bloc en envoyant $_POST['off']
// sur cette même page.
if ( isset($_POST['on']) )
{
    $display = "display: block; border: 2px solid blue; text-align: center;" ;
    $value_button = "Masquer ce block";
    $hidden_name = "off";
}
// Si $_POST vaut "off" OU si $_POST est vide au démarrage du script :
// On cache le bloc
// On prépare l'affichage du bloc en attribuant la valeur "on"
// à l'input hidden, on règle la valeur du bouton sur "Afficher...""
elseif ( isset($_POST['off']) || empty($_POST) )
{
    $display = "display: none;" ;
    $value_button = "Afficher un block, du texte ou une image";
    $hidden_name = "on";
}
// Valeurs par défault / ou / si on manipule la valeur de $_POST
else {
    $display = "display: none;" ;
    $value_button = "Afficher un block, du texte ou une image";
    $hidden_name = "on";
}
// Affichage HTML du bloc et du formulaire
// note : Le formulaire n'est en rien attaché au bloc
echo '
<div style = "'.$display.'">

<div style="float: right;">
    <form action="bdd.php" method="post" />
        <input type="hidden" name="'.$hidden_name.'">
        <button type="submit"> X </button>
    </form>
</div>

<p>
    <b>On peut afficher un élément masqué auparavant</b>
</p>

<p>
    Un peut de texte s\'affiche maintenant.<br>
    Il peut être masqué lors d\'un click<br>
    sur le même bouton ci-dessous, pratique non ?
</p>

</div>

<p>
    <form action="bdd.php" method="post">

        <input type="hidden" name="'.$hidden_name.'">
        <input type="submit" value="'.$value_button.'">

    </form>
</p>

';
?>
