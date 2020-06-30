<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des consultations</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Liste des consultations</h1>
  <?php
  $maintenant = mktime();
  $datecons = date("Y-m-d", $maintenant);
  
  mysql_connect("127.0.0.1", "root", "");
  mysql_set_charset('utf8');
  mysql_select_db("TIC2014_08h");

  $req = "SELECT * 
          FROM patient AS p
            INNER JOIN consultation AS c ON p.mat = c.mat";
  $res = mysql_query($req);
  if (mysql_num_rows($res) == 0) {
    die("<p>Aucune consultation pour le $datecons</p>");
  } else {
    echo '<table class="table">';
    echo '<tr>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Date consultation</th>';
    echo '<th>Détails consultation</th>';
    echo '</tr>';
    while ($cons = mysql_fetch_assoc($res)) {
      echo '<tr>';
      echo '<td>' . $cons['nom'] . '</td>';
      echo '<td>' . $cons['prenom'] . '</td>';
      echo '<td>' . $cons['datecons'] . '</td>';
      echo '<td>' . $cons['detailcons'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }
  ?>
</body>

</html>