<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Suppression de commentaires</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php
  mysql_connect("127.0.0.1", "root", "");

  // pour bien afficher les caractères accentués
  mysql_set_charset('utf8');
  
  mysql_select_db("tic2012_14h");

  $pseudo = $_POST['pseudo'];
  $num_sujet = $_POST["num_sujet"];

  $res = mysql_query("SELECT COUNT(*) FROM Membre WHERE pseudo = '$pseudo'");
  $row = mysql_fetch_array($res);

  if ($row[0] == 0) {
    echo '<p class="error">Pseudo Incorrect.</p>';
    die();
  }

  $res = mysql_query("SELECT COUNT(*) 
                      FROM Commentaire 
                      WHERE pseudo = '$pseudo' 
                        AND numsujet = '$num_sujet'");
  $row = mysql_fetch_array($res);

  if ($row[0] == 0) {
    echo '<p class="error">Vous n\'avez pas commenté le sujet sélectionné</p>';
    die();
  }

  mysql_query("DELETE FROM commentaire 
            WHERE pseudo = '$pseudo' 
              AND numsujet = '$num_sujet'");
  if (mysql_affected_rows() == -1) {
    echo '<p class="error">La suppression des données a échoué.</p>';
  } else {
    echo '<p class="success">Données suprimées avec succés.</p>';
  }
  ?>
</body>

</html>