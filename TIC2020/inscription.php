<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'un client</title>
</head>
<body>
  <h1>Inscription d'un client</h1>
  <?php

  if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['tel']) || !isset($_POST['adresse']) || !isset($_POST['motpass']) || !isset($_POST['motpass2'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $tel = $_POST['tel'];
  $adresse = $_POST['adresse'];
  $motpass = $_POST['motpass'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2020');

  $query = "SELECT * FROM client WHERE tel = '$tel'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    $query = "INSERT INTO client (tel, nom, prenom, adresse, motpass) 
              VALUES ('$tel', '$nom', '$prenom', '$adresse', '$motpass')";
    $res = mysql_query($query);
    if ($res) {
      echo "<p>le client $nom $prenom a été inscrit avec succès</p>";
    } else {
      die("<p>Echec de l'opération</p>");
    }
  } else {
    $client = mysql_fetch_assoc($res);
    if ($client['nom'] == $nom && $client['prenom'] == $prenom) {
      echo "<p>Echec de l'opération : le client $nom $prenom est déjà inscrit!</p>";
    } else {
      echo "<p>Echec de l'opération : Erreur tél, nom e prénom erronés!</p>";
    }
  }
  
  ?>
</body>
</html>