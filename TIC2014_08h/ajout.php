<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout d'un patient</title>
</head>

<body>
  <h1>Ajout d'un patient</h1>
  <?php
  if (!isset($_POST["mat"]) || !isset($_POST["nom"]) || !isset($_POST["prenom"])) {
    echo "<p>Veuillez utiliser le formulaire de location</p>";
    die();
  }

  $mat = $_POST["mat"];
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];

  mysql_connect("127.0.0.1", "root", "");
  mysql_set_charset('utf8');
  mysql_select_db("TIC2014_08h");

  $req = "SELECT * FROM patient WHERE mat = '$mat'";
  $res = mysql_query($req);
  if (mysql_num_rows($res) != 0) {
    die("<p>Patient déjà inscrit</p>");
  } else {
    $req = "INSERT INTO patient (mat, nom, prenom) VALUES ('$mat', '$nom', '$prenom');";
    $res = mysql_query($req);
    if ($res) {
      echo "<p>Le nouveau patient est inséré avec succès!</p>";
    } else {
      echo "<p>Echec de l'opération</p>";
    }
  }

  ?>
</body>

</html>