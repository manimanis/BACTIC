<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Consultation de commentaires</title>
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

  $res = mysql_query("SELECT * 
                    FROM Commentaire 
                    WHERE pseudo = '$pseudo' 
                      AND numsujet = '$num_sujet' 
                    ORDER BY datecom DESC");

  if (mysql_num_rows($res) == 0) {
    echo '<p class="error">Vous n\'avez pas commenté le sujet sélectionné</p>';
    die();
  }

  echo "<table>\n";
  while ($row = mysql_fetch_array($res)) {
    echo "<tr>\n";
    echo "<th>Date</th>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td>" . $row["datecom"] . "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<th>Contenu</th>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td>" . $row["contenu"] . "</td>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
  ?>
</body>

</html>