function verif() {
  var nom_prenom = document.f.nom_prenom.value;
  var produit = document.f.nom_prenom.value;
  var qte = parseInt(document.f.qte.value);

  if (nom_prenom.length == 0) {
    alert('Indiquer votre nom et prénom!');
    return false;
  }

  if (produit.length == 0) {
    alert('Sélectionner un produit!');
    return false;
  }

  if (isNaN(qte) || qte <= 0) {
    alert('Indiquer la quantité à acheter!');
    return false;
  }

  return true;
}