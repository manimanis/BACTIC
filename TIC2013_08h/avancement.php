<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Avancement de la Saisie</title>
</head>

<body>
	<h1>Avancement de la Saisie</h1>
	<?php
	mysql_connect("127.0.0.1", "root", "");
	mysql_set_charset('utf8');
	mysql_select_db("bd_8h_2013");

	$req = "SELECT COUNT(*) as nbe FROM eleve";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	$nbe = $ligne["nbe"];

	$req = "SELECT COUNT(*) as nbm FROM matiere";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	$nbm = $ligne["nbm"];

	$req = "SELECT COUNT(*) as nbn FROM note";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	$nbn = $ligne["nbn"];

	$p = intval($nbn * 100 / ($nbe * $nbm));

	echo "<p><b>Pourcentage d'avancement :</b> $p%</p>";
	?>
</body>

</html>