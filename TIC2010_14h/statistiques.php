<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des livres empruntés</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Liste des livres empruntés</h1>
  <?php

  if (!isset($_POST['typelivre'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $typelivre = $_POST['typelivre'];
  
  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_14h');

  echo "<h2>Type livre : {$typelivre}</h2>";

  $query = "SELECT *
            FROM livre AS l INNER JOIN emprunt AS e ON l.numlivre = e.numlivre
            WHERE typelivre = '$typelivre'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo "<p>Aucun livre n'a été emprunté de cette catégorie!</p>";
  }

  while ($livre = mysql_fetch_assoc($res)) {
    echo "<h3>{$livre['titrelivre']}</h3>";
    echo "<p><b>Numéro livre</b>: {$livre['numlivre']}</p>";
    echo "<p><b>Titre livre</b>: {$livre['titrelivre']}</p>";
    echo "<p><b>Nombre d'exemplaire</b>: {$livre['nbrexemplairesdisp']}</p>";

    $query = "SELECT COALESCE(COUNT(numlivre), 0) AS nbremprunte 
              FROM emprunt 
              WHERE numlivre = '{$livre['numlivre']}' 
              GROUP BY numlivre";
    $res1 = mysql_query($query);
    $emprunt = mysql_fetch_assoc($res1);
    echo "<p><b>Exemplaires empruntés</b>: {$emprunt['nbremprunte']}</p>";
  }  
  ?>
</body>
</html>