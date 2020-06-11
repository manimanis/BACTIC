<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Changement de la ville</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1>Changement de la ville </h1>
<p>
  <?php
	if (!isset($_POST["ncin"]) || !isset($_POST["nville"])) {
		echo "<p>Utiliser le formulaire de changement de ville</p>";
		echo "<p><a href='menu.html'>Retour</a></p>";
		die();
	}
	
	$ncin = $_POST["ncin"];
	$nville = $_POST["nville"];
	
	if ($ncin == "" || $nville == "") {
		echo "<p>Tous les champs sont obligatoires</p>";
		echo "<p><a href='menu.html'>Retour</a></p>";
		die();
	}
	
	mysql_connect("127.0.0.1", "root", "");
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
	
	$req = "UPDATE demandeur SET ville = '$nville' WHERE ncin = '$ncin'";
	mysql_query($req);
	
	if (mysql_affected_rows() == -1) {
		echo "<p>Erreur lors de la mise à jour</p>";
		echo "<p><a href='menu.html'>Retour</a></p>";
		die();
	}
	
	echo "<p>Succès de l'opération</p>";
?>
</p>
<p><a href='menu.html'>Retour</a></p>
</body>
</html>
