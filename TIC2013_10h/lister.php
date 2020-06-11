<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Recherche d'offres</title>
	<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<h1>Recherche d'offres</h1>
	<p>
		<?php
		if (!isset($_POST["domaine"]) || !isset($_POST["ville"])) {
			echo "<p>Utiliser le formulaire de recherche d'offre</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		$domaine = $_POST["domaine"];
		$ville = $_POST["ville"];

		if ($domaine == "" && $ville == "") {
			echo "<p>Un des deux champs est obligatoire</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		mysql_connect("127.0.0.1", "root", "");
		mysql_set_charset('utf8');
		mysql_select_db("bd_10h_2013");

		$req = "SELECT *
			FROM offre
			WHERE domaine_offre = '$domaine' OR ville_entreprise = '$ville'";
		$res = mysql_query($req);
		if (mysql_num_rows($res) == 0) {
			echo "<p>Désolé, il n'y a pas d'offres pour ce domaine et/ou cette ville</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		echo "<table border='1'>";
		echo "<tr>";
		echo "<td>Référence</td>";
		echo "<td>Entreprise</td>";
		echo "<td>Domaine</td>";
		echo "<td>Postes</td>";
		echo "<td>Villes</td>";
		echo "</tr>";

		while ($offre = mysql_fetch_assoc($res)) {
			echo "<tr>";
			echo "<td>{$offre['ref']}</td>";
			echo "<td>{$offre['libelle_entreprise']}</td>";
			echo "<td>{$offre['domaine_offre']}</td>";
			echo "<td>{$offre['nombre_poste']}</td>";
			echo "<td>{$offre['ville_entreprise']}</td>";
			echo "</tr>";
		}
		echo "</table>";
		?>
	</p>
	<p><a href="menu.html">Retour</a></p>
</body>

</html>