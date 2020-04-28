<?php

if(!empty($_POST)){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    $valide = 'true';

    if(empty($nom)){
        $valide = false;
        $erreur_nom = "Vous n'avez pas rempli votre nom.";
        echo $erreur_nom;
    }
    if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $email)){
        $valide = false;
        $erreur_email = "Votre email n'est pas valide.";
    }

    if(empty($email)){
        $valide = false;
        $erreur_email = "Vous n'avez pas rempli votre email.";
        echo $erreur_email;
    }

    if(empty($message)){
        $valide = false;
        $erreur_message = "Vous n'avez pas rempli votre message.";
        echo $erreur_message;
    }

    if($valide){
        echo 'tous les champs sont bien remplis';
    }
}

/*
$nom = $_POST['nom'];
$mail = "";
$sujet = "Test";
$message ="Ceci est un test" ;

$retour = mail('', $sujet, $message);
if ($retour){
    echo "Votre mail a bien été envoyé.";
}
*/


// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'hortensere@aol.com';

// copie ? (envoie une copie au visiteur)
$copie = 'oui'; // 'oui' ou 'non'

// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Messages d'erreur du formulaire
$message_erreur_formulaire = "Vous devez d'abord <a href=\"contact.html\">envoyer le formulaire</a>.";
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

// on teste si le formulaire a été soumis
if (!isset($_POST['envoi']))
{
    // formulaire non envoyé
    echo '<p>'.$message_erreur_formulaire.'</p>'."\n";
}
else
{
    /*
     * cette fonction sert à nettoyer et enregistrer un texte
     */
    function Rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc())
        {
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    };

    /*
     * Cette fonction sert à vérifier la syntaxe d'un email
     */
    function IsEmail($email)
    {
        $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
        return (($value === 0) || ($value === false)) ? false : true;
    }

    // formulaire envoyé, on récupère tous les champs.
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
    $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
    $objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
    $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

    // On va vérifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré

    if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
    {
        // les 4 variables sont remplies, on génère puis envoie le mail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
            'Reply-To:'.$email. "\r\n" .
            'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
            'Content-Disposition: inline'. "\r\n" .
            'Content-Transfer-Encoding: 7bit'." \r\n" .
            'X-Mailer:PHP/'.phpversion();

        // envoyer une copie au visiteur ?
        if ($copie == 'oui')
        {
            $cible = $destinataire.';'.$email;
        }
        else
        {
            $cible = $destinataire;
        };

        // Remplacement de certains caractères spéciaux
        $caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
        $caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );

        $objet = html_entity_decode($objet);
        $objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);

        $message = html_entity_decode($message);
        $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

        // Envoi du mail
        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach($tmp as $email_destinataire)
        {
            if (mail($email_destinataire, $objet, $message, $headers))
                $num_emails++;
        }

        if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
        {
            echo '<p>'.$message_envoye.'</p>';
        }
        else
        {
            echo '<p>'.$message_non_envoye.'</p>';
        };
    }
    else
    {
        // une des 3 variables (ou plus) est vide ...
        echo '<p>'.$message_formulaire_invalide.' <a href="contact.html">Retour au formulaire</a></p>'."\n";
    };
}; // fin du if (!isset($_POST['envoi']))






















// OOP
 /*class email
{
    private $to;
    private $from;
    private $subject;
    private $message;

    //private $retour;

    public function __construct($to, $from, $subject, $message)
    {
        $this->to = "";
        $this->from = "";
        $this->subject = "Test";
        $this->message = "Ceci est un test";


        if (mail($to, $from, $subject, $message))
        {
            echo "Votre message a bien été envoyé.";
        }
        else{
            echo "erreur";
        }

    }


    public function envoyer() {
        $this->destinataire()->expediteur()->sujet()->message();

*/

        /*
         $this->destinataire($this->to);
         $this->expediteur($this->from);
         $this->sujet($this->subject);
         $this->message($this->message);
        */
/*
    }

}
*/

/*
include"classes/email.php";

$to = $_POST['destinataire'];
$from = $_POST['expediteur'];
$subject = $_POST['sujet'];
$message = $_POST['message'];

$email = new email($to, $from, $subject, $message);
$email->envoyer();
*/