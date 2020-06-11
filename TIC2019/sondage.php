<?php
if (!isset($_POST['mail']) || !isset($_POST['mdp']) || !isset($_POST['genre']) || !isset($_POST['q1']) || !isset($_POST['q2']) || !isset($_POST['q3'])) {
    die("<p>Veuillez utiliser le formulaire du sondage!</p>");
}

mysql_connect('127.0.0.1', 'root', '');
mysql_select_db('bd2019');

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$genre = $_POST['genre'];
$q1 = substr($_POST['q1'], 1, 1);
$q2 = substr($_POST['q2'], 1, 1);
$q3 = substr($_POST['q3'], 1, 1);
$date = date('Y-m-d');
$nums = 1; /* Puisque le formulaire concerne le sondage ayant NumS = 1 */


$req = "SELECT * FROM participant WHERE Mail = '$mail'";
$res = mysql_query($req);

if (mysql_num_rows($res) == 1) {
    /* Le participant est trouvé dans la base de données */
    $part = mysql_fetch_assoc($res);

    /* Le participant a utilisé un mot de passe incorrect */
    if ($part['Mdp'] != $mdp) {
        die("<p>Erreur d'authentification!</p>");
    }

    /* Trouver les réponses de ce participant aux questions du sondage */
    /* si elle existent */
    $req = "SELECT * 
            FROM Reponse 
            WHERE NumS = '$nums' and IdParticipant = '{$part["IdParticipant"]}'
            ORDER BY NumQ";
    $res = mysql_query($req);

    if (mysql_num_rows($res) != 0) {
        /* Le participant va mettre à jour ses réponses */
        $req = "UPDATE Reponse
                SET Rep = '$q1'
                WHERE NumQ = '1' AND NumS = '$nums' AND IdParticipant = '{$part["IdParticipant"]}'";
        $res1 = mysql_query($req);

        $req = "UPDATE Reponse
                SET Rep = '$q2'
                WHERE NumQ = '2' AND NumS = '$nums' AND IdParticipant = '{$part["IdParticipant"]}'";
        $res2 = mysql_query($req);

        $req = "UPDATE Reponse
                SET Rep = '$q3'
                WHERE NumQ = '3' AND NumS = '$nums' AND IdParticipant = '{$part["IdParticipant"]}'";
        $res3 = mysql_query($req);

        if ($res1 && $res2 && $res3) {
            die("<p>Mise à jour effectuée avec succès!</p>");
        } else {
            die("<p>Erreur durant la mise à jour des données!</p>");
        }
    } else {
        /* Le participant participe pour la première fois dans ce sondage*/
        $req = "INSERT INTO Reponse (NumQ, NumS, IdParticipant, Rep)
                VALUES 
                    ('1', '$nums', '{$part["IdParticipant"]}', '$q1'),
                    ('2', '$nums', '{$part["IdParticipant"]}', '$q2'),
                    ('3', '$nums', '{$part["IdParticipant"]}', '$q3')";
        if (mysql_query($req)) {
            die("<p>Particpation au sondage effectuée avec succès!</p>");
        } else {
            die("<p>Erreur lors de la particpation au sondage!</p>");
        }
    }
} else {
    /* Nouveau participant et nouvelle particpation */
    $req = "INSERT INTO Participant (Mail, Mdp, Genre)
            VALUES ('$mail', '$mdp', '$genre')";
    $res1 = mysql_query($req);

    if (!$res1) {
        die("<p>Erreur lors de l'inscription du participant!</p>");
    }

    /* Chercher l'enregistrement inséré pour retrouver son IdParticipant */
    $req = "SELECT * FROM participant WHERE Mail = '$mail'";
    $res = mysql_query($req);
    $part = mysql_fetch_assoc($res);
    
    $req = "INSERT INTO Reponse (NumQ, NumS, IdParticipant, Rep)
                VALUES 
                    ('1', '$nums', '{$part["IdParticipant"]}', '$q1'),
                    ('2', '$nums', '{$part["IdParticipant"]}', '$q2'),
                    ('3', '$nums', '{$part["IdParticipant"]}', '$q3')";
    if (mysql_query($req)) {
        die("<p>Inscription et particpation au sondage effectuées avec succès!</p>");
    } else {
        die("<p>Erreur lors de l'inscription et de la participation au sondage!</p>");
    }
}
?>