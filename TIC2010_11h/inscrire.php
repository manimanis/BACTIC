<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription d'un assuré</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Inscription d'un assuré</h1>
  <?php

  if (!isset($_POST['matricule']) || !isset($_POST['ncin']) || !isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['etatcivil']) || !isset($_POST['typeassurance']) || !isset($_POST['nbrenfant'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $matricule = $_POST["matricule"];
  $ncin = $_POST['ncin'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $etatcivil = $_POST['etatcivil'];
  $typeassurance = $_POST['typeassurance'];
  $nbrenfant = intval($_POST['nbrenfant']);

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_11h');

  $query = "SELECT * FROM assure WHERE matricule = '$matricule' OR ncin = '$ncin'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) != 0) {
    echo ("<p>Transaction échouée : Numéro de matricule '$matricule' et/ou le numéro CIN '$ncin' déjà utilisées</p>");
    while ($abonne = mysql_fetch_assoc($res)) {
      echo "<p><b>Matricule</b>: {$abonne['matricule']}</p>";
      echo "<p><b>N° CIN</b>: {$abonne['ncin']}</p>";
      echo "<p><b>Nom & Prénom</b>: {$abonne['nom']} {$abonne['prenom']}</p>";
      echo "<p><b>Etat civil</b>: {$abonne['etatcivil']}</p>";
      echo "<p><b>Type d'assurance</b>: {$abonne['typeassurance']}</p>";
      echo "<p><b>Nombre d'enfants</b>: {$abonne['nbrenfant']}</p>";
    }
    die();
  }
  
  $query = "INSERT INTO assure (matricule, ncin, nom, prenom, etatcivil, typeassurance, nbrenfant)
            VALUES ('$matricule', '$ncin', '$nom', '$prenom', '$etatcivil', '$typeassurance', '$nbrenfant')";
  $res1 = mysql_query($query);
  if ($res1) {
    echo "<p>L'abonné est inséré avec succès!</p>";
  } else {
    echo "<p>Echec de l'opération.</p>";
  }
  ?>
</body>
</html>