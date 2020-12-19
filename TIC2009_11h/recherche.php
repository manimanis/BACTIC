<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Résultat de recherche</title>
  <link rel="stylesheet" href="css.css">
</head>

<body>
  <h1>Recherche d'employés</h1>
  <?php
  if (!isset($_POST['diplome']) && !isset($_POST['specialite'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $diplome = $_POST['diplome'];
  $specialite = $_POST['specialite'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2009_11h');

  $query = "SELECT * FROM employe WHERE diplome='$diplome'";
  if ($specialite != '') {
    $query .= " AND specialite = '$specialite'";
  }
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo "<p>Aucune personne correspondant aux critères n'est trouvée</p>";
  } else {
    ?>
    <table class="table">
      <tr>
        <th>Code</th>
        <th>Nom & Prénom</th>
        <th>Age</th>
        <th>Diplôme</th>
        <th>Spécialité</th>
        <th>Téléphone</th>
      </tr>
    <?php
    while ($employe = mysql_fetch_assoc($res)) {
      echo '<tr>';
      echo '<td>' . $employe['code'] . '</td>';
      echo '<td>' . $employe['nom_prenom'] . '</td>';
      echo '<td>' . $employe['age'] . '</td>';
      echo '<td>' . $employe['diplome'] . '</td>';
      echo '<td>' . $employe['specialite'] . '</td>';
      echo '<td>' . $employe['tel'] . '</td>';
      echo '</tr>';
    }
  }
  ?>
</body>

</html>