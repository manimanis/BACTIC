<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout de livres</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Ajout de livres</h1>
  <?php

  if (!isset($_POST['numlivre']) || !isset($_POST['typelivre']) || !isset($_POST['titrelivre']) || !isset($_POST['nbrexemplaires'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $numlivre = $_POST['numlivre'];
  $typelivre = $_POST['typelivre'];
  $titrelivre = $_POST['titrelivre'];
  $nbrexemplaires = intval($_POST['nbrexemplaires']);

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_14h');

  $query = "SELECT * FROM livre WHERE numlivre = '$numlivre'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) != 0) {
    echo ("<p>Transaction échouée : Un livre portant le numéro '$numlivre' est déjà utilisé.</p>");
  } else {
    $query = "INSERT INTO livre (numlivre, typelivre, titrelivre, nbrexemplairesdisp)
              VALUES ('$numlivre', '$typelivre', '$titrelivre', '$nbrexemplaires')";
    $res1 = mysql_query($query);
    if ($res1) {
      echo "<p>Le livre a été inséré avec succès!</p>";
    } else {
      echo "<p>Echec de l'opération.</p>";
      die();
    }
  }

  $query = "SELECT * FROM livre WHERE numlivre = '$numlivre'";
  $res = mysql_query($query);
  $livre = mysql_fetch_assoc($res);

  echo "<p><b>Numéro livre</b>: {$livre['numlivre']}</p>";
  echo "<p><b>Type livre</b>: {$livre['typelivre']}</p>";
  echo "<p><b>Titre livre</b>: {$livre['titrelivre']}</p>";
  echo "<p><b>Nombre d'exemplaire</b>: {$livre['nbrexemplairesdisp']}</p>";
  ?>
</body>
</html>