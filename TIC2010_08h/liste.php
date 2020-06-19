<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des transactions</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Liste des transactions</h1>
  <?php

  if (!isset($_POST['numcompte']) || !isset($_POST['motpasse'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $motpasse = $_POST['motpasse'];
  $numcompte = $_POST['numcompte'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_08h');

  $query = "SELECT * FROM compte WHERE numcompte = '$numcompte'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    $compte_ok = FALSE;
  } else {
    $compte = mysql_fetch_assoc($res);
    $compte_ok = $compte['motpasse'] == $motpasse;
  }
  if (!$compte_ok) {
    die("<p>Contacter votre banque pour vérifier les paramètres de votre identification.</p>");
  }
  
  $query = "SElECT * FROM transaction WHERE numcompte = '$numcompte'";
  $res = mysql_query($query);
  ?>
  <p><b>Numéro de compte : </b> <?php echo $compte['numcompte']; ?></p>
  <p><b>Nom & Prénom : </b> <?php echo $compte['nomprenom']; ?></p>
  <?php
  if (mysql_num_rows($res) == 0) {
    echo "<p>Aucune transaction actuellement!</p>";
  } else {
  ?>
  <table class="table">
    <tr>
      <th>Id</th>
      <th>Date</th>
      <th>Libellé</th>
      <th>Montant</th>
    </tr>
  <?php 
    while ($trans = mysql_fetch_assoc($res)) {
      echo "<tr>";
      echo "<td>" . $trans['idtrans'] . "</td>";
      echo "<td>" . $trans['datetrans'] . "</td>";
      echo "<td>" . $trans['libelletrans'] . "</td>";
      echo "<td>" . $trans['monttrans'] . "</td>";
      echo "</tr>";
    }
  }
  ?>
  </table>
  <p><b>Solde actuek : </b> <?php echo $compte['solde']; ?></p>
</body>
</html>