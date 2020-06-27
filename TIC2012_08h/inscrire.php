<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php
mysql_connect("127.0.0.1", "root", "");
mysql_set_charset('utf8');
mysql_select_db("tic2012_08h");

$num = $_POST['num'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$niv = $_POST['niv'];
$genre = $_POST['genre'];

$req = "SELECT * FROM eleve WHERE num = '$num'";
$res = mysql_query($req);
if (mysql_num_rows($res) != 0) {
	echo "<p>Elève déjà inscrit.</p>";
	exit;
}

$req = "INSERT INTO eleve (num, nom, prenom, genre, niveau, candidat)
		VALUES ('$num', '$nom', '$prenom', '$genre', '$niv', 'N')";
mysql_query($req);
if (mysql_affected_rows() == -1) {
	echo "<p>Erreur lors de l'insertion!</p>";
	echo mysql_error();
} else {
	echo "L'élève ($num) $nom $prenom est inscrit.";
}
?>
	</body>
</html>