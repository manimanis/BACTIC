<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afficher exercice</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <?php
  if (!isset($_POST['ex'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $ex = $_POST['ex'];

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2008_14h');

  $query = "SELECT * FROM exercices WHERE num = '$ex'";
  $res = mysql_query($query);
  if (mysql_num_rows($res) == 0) {
    ?>
    <p>Exercice introuvable <b><?php echo $ex; ?></b></p>
    <?php
  } else {
    $exercice = mysql_fetch_assoc($res);
    ?>
    <h3>Enoncé</h3>
    <div><?php echo $exercice['enonce']; ?></div>
    <h3>Solution</h3>
    <div><code>
      <pre><?php echo $exercice['solution']; ?></pre>
    </code></div>
    <?php
  }
  ?>
</body>
</html>