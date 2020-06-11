<?php
mysql_connect("127.0.0.1", "root", "");
mysql_select_db("tic_2018");

$h = $_POST['h'];
$acc = $_POST['acc'];
$rest = $_POST['rest'];
$pc = (isset($_POST['pc'])) ? intval($_POST['pc']) : 0;
$pp = (isset($_POST['pp'])) ? intval($_POST['pp']) : 0;
$cw = (isset($_POST['cw'])) ? intval($_POST['cw']) : 0;
$ne = $pc + $pp + $cw;
$date = date('Y-m-d');


$req = "SELECT * FROM evaluation WHERE IdHotel='$h' AND DateEval='$date'";
$res = mysql_query($req);

if (mysql_num_rows($res) != 0) {
    echo "<p>Cet hôtel est déjà évalué!</p>";
} else {
    $req = "INSERT INTO evaluation (DateEval, IdHotel, NoteAccueil, NoteRest, NoteExtra)
            VALUES ('$date', '$h', '$acc', '$rest', '$ne')";
    $res = mysql_query($req);
    if ($res) {
        echo "<p>Evaluation enregistée avec succès!</p>";
    }
}

$req = "SELECT NomHotel, AVG(NoteAccueil) AS n1, AVG(NoteRest) AS n2, AVG(NoteExtra) AS n3
        FROM evaluation AS e, hotel AS h 
        WHERE e.IdHotel = h.IdHotel
        GROUP BY e.IdHotel, NomHotel";
$res = mysql_query($req) or die(mysql_error());
?>
<table border="1" cellspacing="0">
    <tr>
        <th>N°</th>
        <th>Hôtel</th>
        <th>Accueil</th>
        <th>Restauration</th>
        <th>Extra</th>
    </tr>
<?php
$i = 1;
while ($lig = mysql_fetch_assoc($res)) {
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $lig['NomHotel']; ?></td>
        <td><?php echo $lig['n1']; ?></td>
        <td><?php echo $lig['n2']; ?></td>
        <td><?php echo $lig['n3']; ?></td>
    </tr>
<?php 
    $i++;
}
?>
</table>