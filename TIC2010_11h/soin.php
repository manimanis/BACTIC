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

  if (!isset($_POST['matricule']) || !isset($_POST['datesoin']) || !isset($_POST['montantsoin'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $matricule = $_POST['matricule'];
  $montantsoin = $_POST['montantsoin'];
  $datesoin = substr($_POST["datesoin"],6) .'-' . substr($_POST["datesoin"], 3, 2) . '-' . substr($_POST["datesoin"], 0, 2);

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_11h');

  $query = "SELECT * FROM assure WHERE matricule = '$matricule'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    die("Opération échouée: L'assuré '$matricule' n'est pas encore inscrit ou bien vérifier le matricule!");
  }

  $query = "SELECT * FROM soin WHERE matricule = '$matricule' AND datesoin = '$datesoin'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) != 0) {
    die("Opération échouée: L'assuré ne peut pas effectuer plus d'un soin dans la journée.");
  }

  $query = "INSERT INTO soin (matricule, datesoin, montantsoin) VALUES ('$matricule', '$datesoin', '$montantsoin')";
  $res = mysql_query($query);
  if ($res) {
    echo ("<p>Succès de l'opération</p>");
  } else {
    echo ("<p>Echec de l'opération</p>");
  }
  ?>
</body>
</html>