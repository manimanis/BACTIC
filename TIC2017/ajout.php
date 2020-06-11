<?php
// Protéger la page contre les accès directs
if (!isset($_POST['cin']) || !isset($_POST['nom']) || !isset($_POST['prenom']) || 
    !isset($_POST['tel']) || !isset($_POST['article']) || !isset($_POST['prix_propose'])) {
    die("Utiliser le formulaire pour accéder à cette page.");
}

// Récupération des données
$cin = $_POST['cin'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$article = $_POST['article'];
$prixpropose = $_POST['prix_propose'];

// connexion à la base de données
mysql_connect("127.0.0.1", "root", "");
mysql_select_db("bd_tic_2017");

// récupérer les informations sur l'article 
// sélectionné par l'utilisateur
$req = "SELECT * FROM article WHERE code = '$article'";
$r_art = mysql_fetch_assoc(mysql_query($req));

// Prix Proposé < Prix de base
if ($prixpropose < $r_art['prixbase']) {
    echo "<p>Offre rejetée</p>";
    die();
}

// Vérifier si le client est déjà enregistré
$req = "SELECT * 
        FROM client 
        WHERE cin='$cin'";
$res = mysql_query($req);

// Vérifier qu'il s'agisse d'un nouveau client
$nouv_client = (mysql_num_rows($res) == 0);

// Il est certain qu'un nouveau client
// va déposer une nouvelle offre
$nouv_offre = $nouv_client;

if ($nouv_client) {
    // Insérer le nouveau client
    $req = "INSERT INTO client (cin, nom, prenom, tel) ".
           "VALUES ('$cin', '$nom', '$prenom', '$tel')";
    mysql_query($req);
} else {
    // Vérifier si le client existant a déposé une offre
    // pour cet article
    $req = "SELECT * FROM offre WHERE cin = '$cin' AND code = '$article'";
    $res = mysql_query($req);
    
    $nouv_offre = (mysql_num_rows($res) == 0);
}


if ($nouv_offre) {
    // Insérer une nouvelle offre pour cet article
    // pour ce client
    $req = "INSERT INTO offre (cin, code, prixpropose) ".
           "VALUES ('$cin', '$article', '$prixpropose')";
    mysql_query($req);
    
    if ($nouv_client) {
        // Première offre pour ce client
        echo "<p>Offre enregistrée pour ce nouveau client</p>";
    } else {
        echo "<p>Nouvelle offre enregistrée</p>";
    }
} else {
    // Mettre à jour l'offre du client
    $req = "UPDATE offre ".
            "SET prixpropose = '$prixpropose' ".
            "WHERE  cin = '$cin' AND code = '$article'";
    mysql_query($req);
    echo "<p>Mise à jour faite avec succès</p>";
}


