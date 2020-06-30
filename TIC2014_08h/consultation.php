<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout d'une consultation</title>
</head>

<body>
  <h1>Ajout d'une consultation</h1>
  <?php
  if (!isset($_POST["mat"]) || !isset($_POST["detailcons"]) || !isset($_POST["nbjours"])) {
    echo "<p>Veuillez utiliser le formulaire de location</p>";
    die();
  }

  $mat = $_POST["mat"];
  $detailcons = $_POST["detailcons"];
  $nbjours = intval($_POST["nbjours"]);
  $maintenant = mktime();
  $datecons = date("Y-m-d", $maintenant);
  $daterdv = NULL;
  if ($nbjours > 0) {
    $daterdv = date("Y-m-d", $maintenant + 86400 * $nbjours);
  }
  
  mysql_connect("127.0.0.1", "root", "");
  mysql_set_charset('utf8');
  mysql_select_db("TIC2014_08h");

  $req = "SELECT * FROM patient WHERE mat = '$mat'";
  $res = mysql_query($req);
  if (mysql_num_rows($res) == 0) {
    die("<p>Matricule inexistante</p>");
  } else {
    $req = "INSERT INTO consultation (mat, datecons, daterdv, detailcons) 
            VALUES ('$mat', '$datecons', '$daterdv', '$detailcons');";
    $res = mysql_query($req);
    if ($res) {
      echo "<p>La nouvelle consultation est insérée avec succès!</p>";
    } else {
      echo "<p>Echec de l'opération</p>";
    }
  }

  ?>
</body>

</html>