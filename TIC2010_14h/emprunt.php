<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emprunt d'un livre</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Emprunt d'un livre</h1>
  <?php

  if (!isset($_POST['numlivre']) || !isset($_POST['cin']) || !isset($_POST['dateemprunt'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $numlivre = $_POST['numlivre'];
  $cin = $_POST['cin'];
  $dateemprunt = substr($_POST["dateemprunt"],6) .'-' . substr($_POST["dateemprunt"], 3, 2) . '-' . substr($_POST["dateemprunt"], 0, 2);

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2010_14h');

  $query = "SELECT * FROM livre WHERE numlivre = '$numlivre' AND nbrexemplairesdisp > 0";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo ("<p>Transaction échouée : Aucune copie du livre numéro '$numlivre' n'est disponible actuellement.</p>");
    die();
  }

  $query = "SELECT * FROM abonne WHERE cin = '$cin'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    echo ("<p>Transaction échouée : Aucun abonné titulaire '$cin' n'est inscrit actuellement.</p>");
    die();
  }
  
  $query = "SELECT * FROM emprunt WHERE numlivre = '$numlivre' AND cin = '$cin' AND dateemprunt = '$dateemprunt'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) != 0)  {
    echo ("<p>Transaction échouée : L'abonné '$cin' a déjà emprunté le livre '$numlivre' le '{$_POST['dateemprunt']}'.</p>");
    die();
  }

  $query = "INSERT INTO emprunt (numlivre, cin, dateemprunt)
            VALUES ('$numlivre', '$cin', '$dateemprunt')";
  $res1 = mysql_query($query);
  $res2 = FALSE;
  if ($res1) {
    $query = "UPDATE livre SET nbrexemplairesdisp = nbrexemplairesdisp - 1 WHERE numlivre = '$numlivre'";
    $res2 = mysql_query($query);
  }
  if ($res1 && $res2) {
    echo "<p>Le livre a été emprunté avec succès!</p>";
  } else {
    echo "<p>Echec de l'opération.</p>";
    die();
  }
  ?>
</body>
</html>