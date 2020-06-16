<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Location de voitures</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <h1>Location de voitures</h1>
  <?php
  if (!isset($_POST['num_cin']) || !isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['matricule_voit'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $num_cin = $_POST['num_cin'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $matricule_voit = $_POST['matricule_voit'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2009_14h');

  $query = "SELECT * FROM inscription WHERE num_cin = '$num_cin'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    $query = "INSERT INTO inscription (num_cin, nom, prenom) 
              VALUES ('$num_cin', '$nom', '$prenom')";
    $res = mysql_query($query);
    if ($res) {
      echo "<p>Ajout d'un nouveau client</p>";
    } else {
      die("<p>Echec de l'ajout du nouveau client</p>");
    }
  } else {
    echo "<p>Heureux de vous revoir de nouveau: $nom $prenom</p>";
  }

  $query = "SELECT * FROM voiture WHERE matricule_voit = '$matricule_voit'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    die("<p>La voiture ayant le matricule $matricule_voit n'existe pas</p>");
  } else {
    $voiture = mysql_fetch_assoc($res);
    if ($voiture['disponible'] == 'Non') {
      die("<p>La voiture ayant le matricule $matricule_voit n'est pas disponible</p>");
    } else {
      $query = "INSERT INTO location (num_cin, matricule_voit) 
                VALUES ('$num_cin', '$matricule_voit')";
      $res = mysql_query($query);
      if (!$res) {
        die("<p>Impossible de poursuivre l'opération</p>");
      }
      $query = "UPDATE voiture 
                SET disponible = 'Non' 
                WHERE matricule_voit = '$matricule_voit'";
      $res = mysql_query($query);
      if (!$res) {
        die("<p>Impossible de poursuivre l'opération</p>");
      }
      echo "<p>La voiture <b>$matricule_voit</b> a été louée à $nom $prenom avec succès</p>";
    }
  }
  ?>
</body>
</html>