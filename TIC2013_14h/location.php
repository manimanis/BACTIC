<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document sans titre</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Location d'un équipement</h1>
<p>
<?php 
if (!isset($_POST["ncin"]) || !isset($_POST["equip"]) || !isset($_POST["duree"])) {
	echo "<p>Veuillez utiliser le formulaire de location</p>";
	die();
}

$ncin = $_POST["ncin"];
$equip = $_POST["equip"];
$duree = $_POST["duree"];

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
		FROM equipement
		WHERE ref = '$equip' AND disponible = 'O'";
$res = mysql_query($req);
if (mysql_num_rows($res) == 0) {
	echo "<p>Equipement non disponible</p>";
	die();
}

$equipement = mysql_fetch_assoc($res);
echo "<ul>";
echo "<li><b>Libellé : </b> {$equipement['libelle']}</li>";
echo "<li><b>Prix/heure : </b> {$equipement['prix_heure']} DT</li>";
echo "<li><b>Heures location : </b> $duree Heures</li>";
echo "<li><b>Total : </b> ".($duree * $equipement['prix_heure'])." DT</li>";


$t = time();
$date_loc = date("Y-m-d H:i:s", $t);
$date_ret = date("Y-m-d H:i:s", $t + 3600 * $duree);

echo "<li><b>Date de location : </b> $date_loc</li>";
echo "<li><b>Date de retour : </b> $date_ret</li>";
echo "</ul>";

$req = "INSERT INTO location (ncin_client, ref_equipement, date_loc, date_ret) 
		VALUES ('$ncin', '$equip', '$date_loc', '$date_ret')";
mysql_query($req);
if (mysql_affected_rows() == -1) {
	echo "<p>Echec de l'opération</p>";
	die();
}

$req = "UPDATE equipement
		SET disponible = 'N'
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
