<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande de pizza</title>
</head>
<body>
  <h1>Commande de pizza</h1>
  <?php

  if (!isset($_POST['idpizza']) || !isset($_POST['tel']) || !isset($_POST['qtecmd']) || !isset($_POST['motpass'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $idpizza = $_POST['idpizza'];
  $qtecmd = $_POST['qtecmd'];
  $tel = $_POST['tel'];
  $motpass = $_POST['motpass'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2020');

  $query = "SELECT * FROM client WHERE tel = '$tel' AND motpass = '$motpass'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo "<p>N° de téléphone ou mot de passe erroné!</p>";
  } else {
    $datecmd = date('Y-m-d H:i:s');
    $query = "INSERT INTO commande (idpizza, tel, datecmd, qtecmd)
              VALUES ('$idpizza', '$tel', '$datecmd', '$qtecmd')";
    $res = mysql_query($query);
    if ($res) {
      echo "<p>Opération réussie!</p>";
    } else {
      echo "<p>Echec de l'opération!</p>";
    }
  }
  
  ?>
</body>
</html>