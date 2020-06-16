<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des voitures disponibles</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <h1>Liste des voitures disponibles</h1>
  <table class="table">
    <tr>
      <th>Matricule Voiture</th>
      <th>Marque</th>
      <th>Couleur</th>
      <th>Disponible</th>
    </tr>
  <?php
  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2009_14h');

  $query = "SELECT * FROM voiture WHERE disponible = 'Oui'";
  $res = mysql_query($query);
  while ($voiture = mysql_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>{$voiture['matricule_voit']}</td>";
    echo "<td>{$voiture['marque']}</td>";
    echo "<td>{$voiture['couleur']}</td>";
    echo "<td>{$voiture['disponible']}</td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>