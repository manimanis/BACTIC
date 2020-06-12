<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un pilote</title>
</head>
<body>
<?php
if (!isset($_POST['matricule']) || !isset($_POST['nom']) || !isset($_POST['prenom'])
    || !isset($_POST['genre']) || !isset($_POST['email'])) {
        die("<p>Remplir le formulaire d'ajout d'un pilote convenablement!</p>");
}

mysql_connect('127.0.0.1', 'root', '');
mysql_set_charset('utf8');
mysql_select_db('bd_2015');

$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$genre = $_POST['genre'];
$email = $_POST['email'];

$query = "SELECT COUNT(*) AS nb_pilotes FROM pilote WHERE Matricule = '$matricule'";
$row = mysql_fetch_assoc(mysql_query($query)) or die(mysql_error());
$nb_pilotes = $row['nb_pilotes'];
if ($nb_pilotes != 0) {
    die("<p>Pilote existant!</p>");
}

$query = "INSERT INTO pilote (matricule, nom, prenom, genre, email)  
          VALUES ('$matricule', '$nom', '$prenom', '$genre', '$email')";
$res = mysql_query($query);
if ($res) {
    echo "Données insérées avec succès!";
} else {
    echo "Erreur lors de l'insertion des données";
}
?>    
</body>
</html>
