<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout d'un spectacle</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Ajout d'un spectacle</h1>
  <?php
  if (!isset($_POST['idpiece']) || !isset($_POST['idsalle']) || !isset($_POST['jj']) || !isset($_POST['mm']) || !isset($_POST['aaaa'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $idpiece = $_POST["idpiece"];
  $idsalle = $_POST["idsalle"];
  $jj = intval($_POST["jj"]);
  $mm = intval($_POST["mm"]);
  $aaaa = intval($_POST["aaaa"]);
  $date = sprintf("%04d-%02d-%02d", $aaaa, $mm, $jj);

  mysql_connect('localhost', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2016');

  $query = "SELECT * FROM spectacle WHERE datespectacle='$date' AND idsalle='$idsalle';";
  $res = mysql_query($query);
  if (mysql_num_rows($res) != 0) {
    die("<p>Salle déja occupée à cette date</p>");
  }

  $query = "SELECT * FROM spectacle WHERE datespectacle='$date' AND idpiece='$idpiece';";
  $res2 = mysql_query($query);
  if (mysql_num_rows($res2) != 0) {
    die("<p>Piece déja programmée</p>");
  }

  $query = "INSERT INTO spectacle (idpiece, datespectacle, idsalle) 
             VALUES ('$idpiece','$date','$idsalle')";
  $res = mysql_query($query);
  if ($res) {
    echo "<p>Ajout effectué avec succès.</p>";
  } else {
    echo "<p>Erreur d'ajout des informations.</p>";
  }
  ?>
</body>

</html>