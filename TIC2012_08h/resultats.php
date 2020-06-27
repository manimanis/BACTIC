<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td>Numéro</td>
				<td>Nom & Prénom</td>
				<td>Niveau</td>
				<td>Genre</td>
				<td>Nombre de votes</td>
			</tr>
<?php
mysql_connect("127.0.0.1", "root", "");
mysql_set_charset('utf8');
mysql_select_db("tic2012_08h");

$req = "SELECT * FROM eleve WHERE candidat = 'O' ORDER BY niveau, genre, nom, prenom";
$res = mysql_query($req);
while ($arr = mysql_fetch_assoc($res)) {
	$req1 = "SELECT COUNT(nume) AS nbr FROM vote WHERE numc = '{$arr['num']}'";
	$nbr = mysql_fetch_assoc(mysql_query($req1)) or die(mysql_error());
	echo "<tr>";
	echo "<td>".$arr['num']."</td>";
	echo "<td>".$arr['nom']." ".$arr["prenom"]."</td>";
	echo "<td>".$arr['niveau']."</td>";
	echo "<td>".$arr['genre']."</td>";
	echo "<td>".$nbr['nbr']."</td>";
	echo "</tr>";
}
?>
		</table>
	</body>
</html>