<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistiques Sondages</title>
</head>

<body>
    <?php
    if (!isset($_POST['nums'])) {
        die("<p>Veuillez utiliser le formulaire des statistiques!</p>");
    }

    mysql_connect('127.0.0.1', 'root', '');
    mysql_select_db('bd2019');

    $nums = intval($_POST['nums']);
    $today = date('Y-m-d');

    /* Déterminer si le sondage a été bien lancé */
    $req = "SELECT * FROM Sondage WHERE NumS = '$nums' AND DateDebut <= '$today'";
    $res = mysql_query($req);

    if (mysql_num_rows($res) == 0) {
        die("<p>Sondage non encore lancé!</p>");
    }

    /* Déterminer le nombre de participants à un thème donné tout en déterminant le nombre d'hommes et de femmes */
    $req = "SELECT COUNT(IdParticipant) AS NbParticipants, 
                   SUM(IF(Genre='M',1,0)) AS NbMasc, 
                   SUM(IF(Genre='F',1,0)) AS NbFemin
            FROM Participant
            WHERE IdParticipant IN (SELECT DISTINCT IdParticipant FROM Reponse WHERE NumS='$nums')";
    $res = mysql_query($req);
    $nbpart = mysql_fetch_assoc($res);
    if ($nbpart['NbParticipants'] == 0) {
        die("<p>Aucune participation  enregistrée pour à ce moment!</p>");
    }
    ?>
    <h1>Statistiques du sondage</h1>
    <p>
        <strong>Nombre total des participants au sondage :</strong> <?php echo $nbpart['NbParticipants']; ?>
    </p>
    <p>
        <strong>Nombre de femmes :</strong> <?php echo $nbpart['NbFemin']; ?>
    </p>
    <p>
        <strong>Nombre d'hommes :</strong> <?php echo $nbpart['NbMasc']; ?>
    </p>
    <?php
    $req = "SELECT q.NumQ, q.Contenu,
                (SELECT COUNT(Rep) FROM Reponse AS r1 WHERE r1.NumQ=q.NumQ AND r1.NumS=q.NumS AND Rep='O') AS NbOui,
                (SELECT COUNT(Rep) FROM Reponse AS r1 WHERE r1.NumQ=q.NumQ AND r1.NumS=q.NumS AND Rep='N') AS NbNon,
                (SELECT COUNT(Rep) FROM Reponse AS r1 WHERE r1.NumQ=q.NumQ AND r1.NumS=q.NumS AND Rep='S') AS NbSansAvis
            FROM Question AS q 
            WHERE q.NumS='1'
            ORDER BY 1";
    $res = mysql_query($req) or die(mysql_error());

    if (mysql_num_rows($res) == 0) {
        die("<p>Aucune participation  enregistrée pour à ce moment!</p>");
    }

    ?>
    <table border="1" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="2">&nbsp;</th>
            <th colspan="3">Pourcentages</th>
        </tr>
        <tr>
            <th>N°</th>
            <th width="65%">Question</th>
            <th width="10%">"Oui"</th>
            <th width="10%">"Non"</th>
            <th width="10%">"Sans Avis"</th>
        </tr>
        <?php
        while ($row = mysql_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?php echo $row['NumQ']; ?></td>
                <td><?php echo $row['Contenu']; ?></td>
                <td align="right"><?php echo round($row['NbOui'] * 100 / ($row['NbOui'] + $row['NbNon'] + $row['NbSansAvis']), 1); ?>%</td>
                <td align="right"><?php echo round($row['NbNon'] * 100 / ($row['NbOui'] + $row['NbNon'] + $row['NbSansAvis']), 1); ?>%</td>
                <td align="right"><?php echo round($row['NbSansAvis'] * 100 / ($row['NbOui'] + $row['NbNon'] + $row['NbSansAvis']), 1); ?>%</td>
            </tr>
        <?php
    }
    ?>
    </table>
</body>

</html>