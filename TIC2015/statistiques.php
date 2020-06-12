<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        td, th {
            border: #000 solid 1px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<?php 
if (!isset($_POST['matricule'])) {
    die("<p>Sélectionner un pilote svp!</p>");
}

mysql_connect('127.0.0.1', 'root', '');
mysql_set_charset('utf8');
mysql_select_db('bd_2015');

$matricule = $_POST['matricule'];

$query = "SELECT * FROM pilote WHERE  matricule = '$matricule'";
$res = mysql_query($query) or die(mysql_error());
$pilote = mysql_fetch_assoc($res);

echo "<p><strong>{$pilote['Nom']} {$pilote['Prenom']}</strong> a effectué les vols suivants:</p>";

echo "<table>";
echo "<tr><th>Marque</th><th>Durée Totale</th><th>Nbre de vols</th></tr>";
$query = "SELECT matpilote, marque, SUM(duree) AS total_duree, COUNT(duree) AS nbr_vols
          FROM vol AS v
            INNER JOIN avion AS a ON a.idavion = v.idavion
          WHERE matpilote = '$matricule'
          GROUP BY matpilote, marque";
$res = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>".$row['marque']."</td>";
    echo "<td>".$row['total_duree']."</td>";
    echo "<td>".$row['nbr_vols']."</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>