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
$cf = $_POST['cf'];
$cg = $_POST['cg'];

$req = "SELECT * FROM eleve WHERE num = '$num'";
$res = mysql_query($req);
if (mysql_num_rows($res) == 0) {
	echo "<p>Vous n'êtes pas inscrit.</p>";
	exit;
}

$req = "SELECT * FROM vote WHERE nume = '$num'";
$res = mysql_query($req);
if (mysql_num_rows($res) != 0) {
	echo "<p>Vous avez déjà voté.</p>";
	exit;
}

$req = "INSERT INTO vote (nume, numc)
		VALUES ('$num', '$cf'), ('$num', '$cg')";
mysql_query($req);
if (mysql_affected_rows() == -1) {
	echo "<p>Erreur lors du vote!</p>";
	echo mysql_error();
} else {
	echo "Vous avez voté avec succès.";
}
?>
	</body>
</html>