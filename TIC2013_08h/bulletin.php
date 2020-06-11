<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Bulletin des notes</title>
</head>

<body>
	<h1>Bulletin des notes</h1>
	<?php
	if (!isset($_POST["num_eleve"])) {
		echo "<p>Utiliser le formulaire pour saisir les données</p>";
		die();
	}

	$num_eleve = $_POST["num_eleve"];

	if ($num_eleve == "") {
		echo "<p>Tous les champs sont obligatoires</p>";
		die();
	}

	mysql_connect("127.0.0.1", "root", "");
	mysql_set_charset('utf8');
	mysql_select_db("bd_8h_2013");

	$req = "SELECT * FROM eleve WHERE Numero = '$num_eleve'";
	$res = mysql_query($req);
	if (mysql_num_rows($res) == 0) {
		echo "<p>Elève non inscrit</p>";
		die();
	}
	$eleve = mysql_fetch_assoc($res);

	echo "<p><b>Bulletin de notes de l'élève :</b> {$eleve["NomPrenom"]}</p>";

	$req = "SELECT COUNT(*) as nbm FROM matiere";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	$nbm = $ligne["nbm"];

	$req = "SELECT COUNT(*) as nbn FROM note WHERE NumEleve = '$num_eleve'";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	$nbn = $ligne["nbn"];

	if ($nbn != $nbm) {
		echo "<p>Saisie incomplète des notes</p>";
		die();
	}

	$req = "SELECT * 
			FROM note AS n, matiere AS m
			WHERE n.CodeMatiere = m.Code AND NumEleve = '$num_eleve'
			ORDER BY m.Libelle";
	$res = mysql_query($req);

	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Libellé</th>" .
		"<th>Coefficient</th>" .
		"<th>Contrôle</th>" .
		"<th>Synthèse</th>" .
		"<th>Moyenne</th>" .
		"<th>Produit</th>";
	echo "</tr>";
	while ($ligne = mysql_fetch_assoc($res)) {
		echo "<tr>";
		$moy = sprintf("%0.2f", ($ligne["DS"] * 2 + $ligne["DC"]) / 3);
		$prod = sprintf("%0.2f", $moy * $ligne["coeff"]);
		echo "<td>" . $ligne["libelle"] . "</td>" .
			"<td>" . $ligne["coeff"] . "</td>" .
			"<td>" . $ligne["DC"] . "</td>" .
			"<td>" . $ligne["DS"] . "</td>" .
			"<td>" . $moy . "</td>" .
			"<td>" . $prod . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>

</html>