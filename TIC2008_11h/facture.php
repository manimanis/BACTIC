<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facture</title>
  <link rel="stylesheet" href="css.css">
</head>

<body>
  <h1>Facture</h1>
  <?php
  if (!isset($_POST['nom_prenom']) || !isset($_POST['produit']) || !isset($_POST['qte'])) {
    die("<p>Utiliser le formulaire pour accéder à cette page</p>");
  }

  $nom_prenom = $_POST['nom_prenom'];
  $produit = $_POST['produit'];
  $qte = intval($_POST['qte']);

  mysql_connect('127.0.0.1', 'root', '');
  mysql_set_charset('utf8');
  mysql_select_db('tic2008_11h');

  $query = "SELECT * FROM articles WHERE nom = '$produit'";
  $res = mysql_query($query);
  $prod_infos = mysql_fetch_assoc($res);

  $total = $prod_infos['prix_unit'] * $qte;
  ?>

  <h2>Nom & Prénom: <?php echo $nom_prenom ?></h2>

  <table>
    <tr>
      <td><b>Produit</b></td>
      <td><b>Prix Unitaire</b></td>
      <td><b>Quantité</b></td>
    </tr>
    <tr>
      <td><?php echo $produit; ?></td>
      <td><?php echo $prod_infos['prix_unit']; ?></td>
      <td><?php echo $qte; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><b>Montant à payer</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo $total; ?></td>
    </tr>
  </table>
  <p><a href="commande.html">Retour</a></p>
</body>

</html>