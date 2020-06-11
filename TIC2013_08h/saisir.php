<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Saisie des notes</title>
</head>

<body>
	<h1>Saisie des notes</h1>
	<?php
	if (!isset($_POST["num_eleve"]) || !isset($_POST["matiere"]) || !isset($_POST["dc"]) || !isset($_POST["ds"])) {
		echo "<p>Utiliser le formulaire pour saisir les données</p>";
		die();
	}

	$num_eleve = $_POST["num_eleve"];
	$matiere = $_POST["matiere"];
	$dc = $_POST["dc"];
	$ds = $_POST["ds"];

	if ($num_eleve == "" || $dc == "" || $ds == "") {
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

	$req = "SELECT * FROM note WHERE NumEleve = '$num_eleve' AND CodeMatiere = '$matiere'";
	$res = mysql_query($req);
	if (mysql_num_rows($res) != 0) {
		echo "<p>Notes déjà saisies</p>";
		die();
	}

	$req = "INSERT INTO note (NumEleve, CodeMatiere, dc, ds)
			    VALUES ('$num_eleve', '$matiere', '$dc', '$ds')";
	mysql_query($req);
	if (mysql_affected_rows() == -1) {
		echo "<p>Erreur d'insertion</p>";
		die();
	}

	echo "<p>Données insérées avec succès</p>";
	?>
</body>

</html>