<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertion d'une transaction</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Création d'une transaction</h1>
  <?php

  if (!isset($_POST['datetrans']) || !isset($_POST['libelletrans']) || !isset($_POST['monttrans']) || !isset($_POST['numcompte'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $datetrans = substr($_POST["datetrans"],6) .'-' . substr($_POST["datetrans"], 3, 2) . '-' . substr($_POST["datetrans"], 0, 2);
  $libelletrans = $_POST['libelletrans'];
  $monttrans = doubleval($_POST['monttrans']);
  $numcompte = $_POST['numcompte'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_08h');

  $query = "SELECT * FROM compte WHERE numcompte = '$numcompte'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    die("<p>Transaction échouée : Numéro de compte incorrect $numcompte</p>");
  }
  $compte = mysql_fetch_assoc($res);
  if (doubleval($compte['solde']) < $monttrans) {
    die("<p>Transaction échouée : Solde insuffisant ({$compte['solde']}) pour retirer la somme $monttrans</p>");
  }

  $query = "UPDATE compte SET solde = (solde - $monttrans) WHERE numcompte = '$numcompte'";
  $res1 = mysql_query($query);
  $res2 = FALSE;
  if ($res1) {
    $query = "INSERT INTO transaction (numcompte, datetrans, libelletrans, monttrans)
              VALUES ('$numcompte', '$datetrans', '$libelletrans', '$monttrans')";
    $res2 = mysql_query($query);
  }

  $query = "SELECT * FROM compte WHERE numcompte = '$numcompte'";
  $res = mysql_query($query);
  $compte = mysql_fetch_assoc($res);
  if ($res1 && $res2) {
    echo "<p>Succès de la transaction.</p>";
  }
  ?>
  <p><b>Numéro de compte : </b> <?php echo $compte['numcompte']; ?></p>
  <p><b>Nom & Prénom : </b> <?php echo $compte['nomprenom']; ?></p>
  <p><b>Montant retiré : </b> <?php echo $monttrans; ?></p>
  <p><b>Nouveau solde : </b> <?php echo $compte['solde']; ?></p>
</body>
</html>