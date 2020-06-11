<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Inscription à une offre</title>
	<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<h1>Inscription à une offre</h1>
	<p>
		<?php
		if (!isset($_POST["ncin"]) || !isset($_POST["ref"])) {
			echo "<p>Utiliser le formulaire d'inscription</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		$ncin = $_POST["ncin"];
		$ref = intval($_POST["ref"]);

		if ($ncin == "" || $ref <= 0) {
			echo "<p>Tous les champs sont obligatoires</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		mysql_connect("127.0.0.1", "root", "");
		mysql_set_charset('utf8');
		mysql_select_db("bd_10h_2013");

		$req = "SELECT *
						FROM demandeur
						WHERE ncin = '$ncin'";
		$res = mysql_query($req);
		if (mysql_num_rows($res) == 0) {
			echo "<p>Vous n'êtes pas inscrit, veuillez vous inscrire</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}
		$demandeur = mysql_fetch_assoc($res);

		$req = "SELECT *
			FROM offre
			WHERE ref = '$ref'";
		$res = mysql_query($req);
		if (mysql_num_rows($res) == 0) {
			echo "<p>Désolé il n'y a pas d'offre pour cette référence</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		$req = "SELECT *
			FROM choix_offre
			WHERE ref_offre = '$ref' AND ncindemandeur = '$ncin'";
		$res = mysql_query($req);
		if (mysql_num_rows($res) != 0) {
			echo "<p>Vous-vous êtes déjà inscrit dans cette offre</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		$date = date("Y-m-d H:i:s");
		$req = "INSERT INTO choix_offre (ncindemandeur, ref_offre, date_choix)
			VALUES ('$ncin', '$ref', '$date')";
		mysql_query($req);

		if (mysql_affected_rows() == -1) {
			echo "<p>Erreur l'insertion</p>";
			echo "<p><a href='menu.html'>Retour</a></p>";
			die();
		}

		echo "<p>Succés de l'opération</p>";
		?>
	</p>
	<p><a href="menu.html">Retour</a></p>
	<p>&nbsp;</p>
</body>

</html>