<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Note</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <?php
    if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['cin']) || !isset($_POST['ex1']) || !isset($_POST['ex2']) || !isset($_POST['ex3_1']) || !isset($_POST['ex3_2']) || !isset($_POST['ex3_4'])) {
        die("<p>Utiliser le formulaire pour accéder à cette page</p>");
    }

    $cin = intval($_POST['cin']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ex1 = $_POST['ex1'];
    $ex2 = $_POST['ex2'];
    $ex3_1 = $_POST['ex3_1'];
    $ex3_2 = $_POST['ex3_2'];
    $ex3_4 = $_POST['ex3_4'];

    $note = 0;
    if ($ex1 == '2') $note += 4;
    if ($ex2 == 'MOD') $note += 4;
    if ($ex3_1 == '2') $note += 4;
    if ($ex3_2 == '1') $note += 4;
    if ($ex3_4 == '3') $note += 4;

    mysql_connect('127.0.0.1', 'root', '');
    mysql_set_charset('utf8');
    mysql_select_db('tic2009_08h');

    $query = "SELECT * FROM examen WHERE cin = '$cin'";
    $res = mysql_query($query);
    if (mysql_num_rows($res) != 0) {
        $examen = mysql_fetch_assoc($res);
        $cin = $examen['CIN'];
        $nom = $examen['nom'];
        $prenom = $examen['prenom'];
        $note = $examen['note'];
        echo '<p><b>Erreur :</b> Vous avez déjà répondu à ce test!</p>';
    } else {
        $query = "INSERT INTO examen (cin, nom, prenom, note)
                  VALUES ('$cin', '$nom', '$prenom', '$note')";
        $res = mysql_query($query);
        if ($res) {
            echo '<p>Inséré avec succès!</p>';
        } else {
            echo '<p>Echec de l\'opération!</p>';
        }
    }
    ?>
    <h2>Résultat test</h2>
    <p><b>CIN :</b> <?php echo $cin; ?></p>
    <p><b>Nom :</b> <?php echo $nom; ?></p>
    <p><b>Prénom :</b> <?php echo $prenom; ?></p>
    <p><b>Note :</b> <?php echo $note; ?> / 20</p>
</body>
</html>