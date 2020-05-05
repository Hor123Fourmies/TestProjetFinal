<?php
define('PAGE', 'onglet1');
?>

<?php

include "nav.php";

echo "Vous êtes à la page 'onglet 1'";


/*
if(!empty($_POST)){
$pseudo = ($_POST['pseudo']);
$motDePasse = $_POST['mdp'];
$confMotDePasse = $_POST['mdp2'];
$email = $_POST['email'];

$valide = true;

if (empty($adresse)) {
    $valide = false;
}


$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

*/
/* Je mets aussi certaines sécurités */
/*
if ($motDePasse == $confMotDePasse) {
*/
/* Mot de passe crypté */
/*
$motDePasse = sha1($motDePasse);

$sql_inscription = "INSERT INTO user_validation VALUES(NULL,'$pseudo', '$motDePasse', '$email')";
if ($conn->query($sql_inscription)) {

?>
echo "Merci $pseudo. Votre inscription a bien été prise en compte. Elle va être soumise à validation."; ?>

else {

?>
echo "Les deux mots de passe que vous avez rentrés ne correspondent pas..."; ?>
}
}
}
*/
/*
if(empty($pseudo)){
$valide = false;
$erreur_pseudo = "Vous n'avez pas rempli votre pseudo.";
}

if(empty($motDePasse)){
$valide = false;
$erreur_mdp = "Vous n'avez pas rempli votre mot de passe.";
}

if(empty($confMotDePasse)){
$valide = false;
$erreur_mdp2 = "Vous n'avez pas confirmé votre mot de passe.";
}

if(empty($email)){
$valide = false;
$erreur_email = "Vous n'avez pas rempli votre email.";
}
*/
?>