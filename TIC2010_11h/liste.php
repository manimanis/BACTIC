<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saisie d'un soin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Saisie d'un soin</h1>
  <?php

  if (!isset($_POST['matricule'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $matricule = $_POST['matricule'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_11h');

  $query = "SELECT * FROM assure WHERE matricule = '$matricule'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    die("Opération échouée: L'assuré '$matricule' n'est pas encore inscrit ou bien vérifier le matricule!");
  }

  $query = "SELECT * FROM soin WHERE matricule = '$matricule' ORDER BY datesoin DESC";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo ("L'assuré n'a pas encore effectué des soins.");
  }
  ?>
  <table class="table">
    <tr>
      <th>Date</th>
      <th>Montant</th>
    </tr>
    <?php
    while ($soin = mysql_fetch_assoc($res)) {
      echo "<tr>";
      echo "<td>" . $soin['datesoin'] . "</td>";
      echo "<td>" . $soin['montantsoin'] . "</td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>