<link rel="stylesheet" href="styles.css">

Bonjour, <?php echo htmlspecialchars($_POST['nom']); ?>.
Tu as <?php echo (int)$_POST['age']; ?> ans.

<?php echo $_POST['choix'];?>

<?php echo $_POST['frites'];?>

<p>Si tu veux changer de prénom, <button><a href="form.php">clique ici</a></button> pour revenir à la page formulaire.php.</p>

<?php


if (isset($_POST['valider'])) {
    $pseudo = $_POST['pseudo'];
    $ville = $_POST['ville'];
    echo 'Salut ' . $pseudo . 'de ' . $ville . '<br/>Bienvenue sur mon site !';
}

//*************************
//isset ou !empty()-> + secure
// htmlentities() ou au moins htmlspecialchars().
//*************************

//*************************
  /*****************************************
  *  Constantes et variables
  *****************************************/
define('LOGIN','Rasmus');  // Login correct
define('PASSWORD','lerdorf');  // Mot de passe correct
$message = '';      // Message à afficher à l'utilisateur

/*****************************************
 *  Vérification du formulaire
 *****************************************/
// Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
    // Le login est-il rempli ?
    if(empty($_POST['login']))
    {
        $message = 'Veuillez indiquer votre login svp !';
    }
    // Le mot de passe est-il rempli ?
    elseif(empty($_POST['motDePasse']))
    {
        $message = 'Veuillez indiquer votre mot de passe svp !';
    }
    // Le login est-il correct ?
    elseif($_POST['login'] !== LOGIN)
    {
        $message = 'Votre login est faux !';
    }
    // Le mot de passe est-il correct ?
    elseif($_POST['motDePasse'] !== PASSWORD)
    {
        $message = 'Votre mot de passe est faux !';
    }
    else
    {
        // L'identification a réussi
        $message = 'Bienvenue '. LOGIN .' !';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>Formulaire d'identification</title>
</head>
<body>
<?php if(!empty($message)) : ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="post">
    <fieldset>
        <legend>Identifiant</legend>
        <p>
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" value="<?php if(!empty($_POST['login'])) { echo htmlspecialchars($_POST['login'], ENT_QUOTES); } ?>" />
        </p>
        <p>
            <label for="password">Mot de passe :</label>
            <input type="password" name="motDePasse" id="password" value="" />
            <input type="submit" name="submit" value="Identification" />
        </p>
    </fieldset>
</form>
</body>
</html>
**********************

**********************
Configuration temporaire du serveur web
<?php
// Désactivation des magic_quotes_gpc
ini_set('magic_quotes_gpc', 0);
?>
***********************

***********************
<?php
$_REQUEST;
?>
***********************

<html><body>
<form method="post" action="verif.php">
Votre email : <input type="text" name="email" size="20">
<input type="submit" value="OK">
</form></body></html>
Votre email:

Le code PHP de verif.php
(ne copiez/collez pas ce code dans votre éditeur, retapez-le ou gare aux erreurs...)
Donne comme résultat à l'écran après envoi "OK"

<?php
$email = $_POST['email'];
$point = strpos($email,".");
$aroba = strpos($email,"@");

if($point=='')
{
echo "Votre email doit comporter un <b>point</b>";
}
elseif($aroba=='')
{
echo "Votre email doit comporter un <b>'@'</b>";
}
else
{
echo "Votre email est: '<a href=\"mailto:"."$email"."\"><b>$email</b></a>'";
}
?>
Erreur n°1 : Votre email doit comporter un point !
Erreur n°2 : Votre email doit comporter un '@' !

Si pas d'erreur : Votre email est : email@email.com

Comme son nom l'indique, la fonction strpos() retourne la position d'un caractère dans une chaîne si celui-ci existe, autrement strpos() retourne "rien". C'est ce que nous utilisons pour savoir si les point et @ sont bien présents dans l'email.

Exemple : Si strpos() retourne "10" cela veut dire que le premier caractère recherché est placé juste après les 10 premiers caractères donc en 11e position dans la chaîne, puisque vous devez toujours vous rappeler que php commence à compter à 0 et non pas 1.

// LES SESSIONS