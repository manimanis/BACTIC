<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programme Annuel</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  if (isset($_GET['annee'])) {
    $annee = intval($_GET['annee']);
  } else {
    $annee = date('Y');
  }
  ?>
  <h1>Programme Annuel en <?php echo $annee ?></h1>
  <table class="table">
    <tr>
      <th>N° d'ordre</th>
      <th>Titre de la pièce</th>
      <th>Libellé de la salle</th>
      <th>Date du spectacle</th>
    </tr>
    <?php
    mysql_connect('localhost', 'root', '');
    mysql_set_charset('utf8');
    mysql_select_db('tic2016');

    $query = "SELECT * 
	      FROM spectacle AS sp
          INNER JOIN piece AS p ON sp.idpiece = p.idpiece
          INNER JOIN salle AS s ON sp.idsalle = s.idsalle
        WHERE datespectacle like '$annee%'
        ORDER BY datespectacle ASC, titre ASC;";
    
    $res = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($res) == 0) {
      echo "<tr><td colspan=\"4\">Aucun spectacle programmé actuellement en $annee.</td></tr>";
    } else {
      $index = 1;
      while ($ligne = mysql_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $index . "</td>";
        echo "<td>" . $ligne['titre'] . "</td>";
        echo "<td>" . $ligne['libelle'] . "</td>";
        echo "<td>" . $ligne['datespectacle'] . "</td>";
        echo "</tr>";
        $index++;
      }
      echo "</Table>";
    }
    ?>
  </table>
</body>

</html>