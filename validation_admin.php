<?php
session_start();
include "nav2.php";

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
*/

$servername = "localhost";
$username = "id13641339_hortense";
$password = ">yG^B9e^}(MCYS^e";
$dbname = "id13641339_project";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

if (isset($_SESSION['loginAdmin']) && isset($_SESSION['mdpAdmin'])) {
    $session_admin = $_SESSION['loginAdmin'];

    ?>
    <button class="btnAdmin"><a href="pageAdmin.php?">Retour à la page précédente</a></button>
    <?php

    $sql_validation = "SELECT id, pseudo, email, date FROM user_validation ORDER BY id desc";
    $liste = $conn->query($sql_validation);

    if ($liste == TRUE) {
        while ($row = $liste->fetch_assoc()) {
            $id = $row['id'];
            $pseudo = $row['pseudo'];
            $email = $row['email'];
            $today = $row['date'];
            echo '<br>';
            echo '- ' . $id . ' - ' . '<br>';
            echo 'Pseudo : ' . $pseudo . '<br>';
            echo ' E-mail : ' . $email . '<br>';
            echo 'Date : ' . $today . '<br>';
// Les liens « Accepter » et « Refuser » se placent ici.

            echo '<button><a href="validation_admin.php?action=accepter&id=' . $id . '">Accepter</a></button>';
            echo ' | ';
            echo '<button><a href="validation_admin.php?action=refuser&id=' . $id . '">Refuser</a></button>';

            echo '<br/>';
        }
    } else {
        echo "Erreur : " . $sql_validation . "<br>" . $conn->error;
    }


    if (isset($_GET['action']) AND isset($_GET['id'])) {
        $action = $_GET['action'];

        if ($action == "accepter") {
            $id = $_GET['id'];

            $sql_validation2 = "SELECT * FROM user_validation WHERE id='$id'";
            $result = $conn->query($sql_validation2);

            while ($row = $result->fetch_assoc()) {
                $pseudo = $row['pseudo'];
                $mdp = $row['mdp'];
                $email = $row['email'];

                $sql_validToConnect = "INSERT INTO user_connexion VALUES('$id', '$pseudo', '$mdp', '$email', '$today')";
                $transfert_ok = $conn->query($sql_validToConnect);
                echo 'transfert ok';
                $sql_supp_valid = "DELETE FROM user_validation WHERE id='$id'";
                $supp_ok = $conn->query($sql_supp_valid);
            }
        } elseif ($action == "refuser") {
            // Refus
            $id = $_GET['id'];
            $sql_refus = "DELETE FROM user_validation WHERE id='$id'";
            $refus_ok = $conn->query($sql_refus);
            echo "L'id " ?><span
                    style="color:red"><?php echo $id ?></span><?php echo " a été supprimé de la table user_validation.";
        }
    }
}
else{
    echo "Vous devez être connecté en tant qu'administrateur pour accéder à cette page.";
}


include "footer2.php";




