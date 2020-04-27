<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

$sql_validation = "SELECT id, pseudo, email FROM user_validation ORDER BY id desc";
$liste = $conn->query($sql_validation);

if ($liste == TRUE){
    while ($row = $liste->fetch_assoc()) {
        $id = $row['id'];
        $pseudo = $row['pseudo'];
        $email = $row['email'];
        echo '- ' . $id. ' - '. '<br>';
        echo 'Pseudo : '. $pseudo. '<br>';
        echo ' E-mail : '. $email. '<br>';
// Les liens « Accepter » et « Refuser » se placent ici.

        echo '<a href="validation_admin.php?action=accepter&id='.$id.'">Accepter</a>';
        echo ' | ';
        echo '<a href="validation_admin.php?action=refuser&id='.$id.'">Refuser</a>';

        echo '<br/>';
    }
}

else{
    echo "Erreur : " . $sql_validation . "<br>" . $conn->error;
}


if(isset($_GET['action']) AND isset($_GET['id'])) {
    $action = $_GET['action'];

    if ($action == "accepter") {
        $id = $_GET['id'];

        $sql_validation2 = "SELECT * FROM user_validation WHERE id='$id'";
        $result = $conn->query($sql_validation2);

        while ($row = $result->fetch_assoc()) {
            $pseudo = $row['pseudo'];
            $mdp = $row['mdp'];
            $email = $row['email'];

            $sql_validToConnect = "INSERT INTO user_connexion VALUES('$id', '$pseudo', '$mdp', '$email')";
            $transfert_ok = $conn->query($sql_validToConnect);
            echo 'transfert ok';
            $sql_supp_valid = "DELETE FROM user_validation WHERE id='$id'";
            $supp_ok = $conn->query($sql_supp_valid);
        }
    }
    elseif ($action == "refuser"){
    // Refus
    $id = $_GET['id'];
    $sql_refus = "DELETE FROM user_validation WHERE id='$id'";
    $refus_ok = $conn->query($sql_refus);
    }
}
echo "L'id "?><span style="color:red"><?php echo $id?></span><?php echo" a été supprimé de la table user_validation.";





