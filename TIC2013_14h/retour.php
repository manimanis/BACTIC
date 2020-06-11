<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document sans titre</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Retour d'un équipement</h1>
<p>
<?php 
if (!isset($_POST["ncin"]) || !isset($_POST["equip"])) {
	echo "<p>Veuillez utiliser le formulaire de retour</p>";
	die();
}

$ncin = $_POST["ncin"];
$equip = $_POST["equip"];

if ($ncin == '') {
	echo "<p>Indiquez le numéro de CIN du client</p>";
	die();
}

mysql_connect("127.0.0.1", "root", "");
mysql_select_db("bd_14h_2013");

$req = "SELECT *
		FROM client
		WHERE ncin = '$ncin'";
$res = mysql_query($req);
if (mysql_num_rows($res) == 0) {
	echo "<p>Numéro de CIN inexistant</p>";
	die();
}

$client = mysql_fetch_assoc($res);
echo "<ul>";
echo "<li><b>Nom & prénom : </b> {$client['nom']} {$client['prenom']}</li>";
echo "<li><b>Téléphone : </b> {$client['tel']}</li>";
echo "</ul>";

$req = "SELECT *
		FROM location
		WHERE ref_equipement = '$equip' AND ncin_client = '$ncin'";
$res = mysql_query($req);
if (mysql_num_rows($res) == 0) {
	echo "<p>Le client n'a pas encore loué cet équipement</p>";
	die();
}

$req = "UPDATE equipement
		SET disponible = 'O'
		WHERE ref = '$equip'";
mysql_query($req) or die(mysql_error());
if (mysql_affected_rows() == -1) {
	echo "<p>Echec de l'opération</p>";
	die();
}

echo "<p>à bientôt</p>";
?>
</p>
</body>
</html>
