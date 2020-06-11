<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Ajout d'un commentaire</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php
  mysql_connect("127.0.0.1", "root", "");

  // pour bien afficher les caractères accentués
  mysql_set_charset('utf8');
  
  mysql_select_db("tic2012_14h");

  $pseudo = $_POST["pseudo"];
  $contenu = $_POST["contenu"];
  $date = date("Y-m-d H:i;s");
  $num_sujet = $_POST["num_sujet"];

  $res = mysql_query("SELECT COUNT(*) FROM Membre WHERE pseudo = '$pseudo'");
  $row = mysql_fetch_array($res);

  if ($row[0] == 0) {
    echo '<p class="error">Pseudo Incorrect.</p>';
    die();
  }

  mysql_query("INSERT INTO Commentaire (contenu, datecom, pseudo, numsujet) 
               VALUES ('$contenu','$date','$pseudo','$num_sujet')");

  if (mysql_affected_rows() == -1) {
    echo '<p class="error">L\'insertion des données a échoué.</p>';
  } else {
    echo '<p class="success">Données insérées avec succés.</font></p>';
  }
  ?>
</body>

</html>