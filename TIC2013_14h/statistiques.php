<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document sans nom</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Statistiques</h1>
<p>
<?php 

mysql_connect("127.0.0.1", "root", "");
mysql_select_db("bd_14h_2013");

$req = "SELECT *, (UNIX_TIMESTAMP(date_ret) - UNIX_TIMESTAMP(date_loc)) AS duree
		FROM location AS l, equipement AS e
		WHERE l.ref_equipement = e.ref";
$res = mysql_query($req);
if (mysql_num_rows($res) == 0) {
	echo "<p>Aucune location jusqu'à alors</p>";
	die();
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>libelle</td>";
echo "<th>date de location</td>";
echo "<th>date de retour</td>";
echo "<th>duree (heures)</td>";
echo "<th>prix/heure</td>";
echo "<th>prix</th>";
echo "<tr>";
while ($loc = mysql_fetch_assoc($res)) {
	$duree = $loc['duree'] / 3600;
	$prix = $duree * $loc['prix_heure'];
	echo "<tr>";
	echo "<td>{$loc['libelle']}</td>";
	echo "<td>{$loc['date_loc']}</td>";
	echo "<td>{$loc['date_ret']}</td>";
	echo "<td>$duree</td>";
	echo "<td>{$loc['prix_heure']}</td>";
	echo "<td>$prix</td>";
	echo "<tr>";
}
echo "</table>";

?>
</p>
</body>
</html>
