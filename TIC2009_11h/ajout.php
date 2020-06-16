<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <link rel="stylesheet" href="css.css">
</head>

<body>
  <h1>Inscription</h1>
  <?php
  if (!isset($_POST['nom_prenom']) || !isset($_POST['age']) || !isset($_POST['diplome']) || !isset($_POST['specialite']) || !isset($_POST['tel'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $nom_prenom = $_POST['nom_prenom'];
  $age = intval($_POST['age']);
  $diplome = $_POST['diplome'];
  $specialite = $_POST['specialite'];
  $tel = $_POST['tel'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2009_11h');

  $query = "SELECT * FROM employe WHERE nom_prenom='$nom_prenom' OR tel = '$tel';";
  $res = mysql_query($query);
  if (mysql_num_rows($res) > 0) {
    $employe = mysql_fetch_assoc($res);
    if ($employe['nom_prenom'] == $nom_prenom) {
      echo "<p>Une personne s'est déjà inscrite utilisant le même nom et prénom</p>";
    }
    if ($employe['tel'] == $tel) {
      echo "<p>Une personne s'est déjà inscrite utilisant le même numéro de téléphone</p>";
    }
  } else {
    $query = "INSERT INTO employe (nom_prenom, age, diplome, specialite, tel)
            VALUES ('$nom_prenom', '$age', '$diplome', '$specialite', '$tel')";
    $res = mysql_query($query);
    if ($res) {
      echo "<p>Vous êtes inscrit.</p>";
    } else {
      echo "<p>Echec de l'inscription.</p>";
    }
  }
  ?>
</body>

</html>