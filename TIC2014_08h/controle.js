function estNumerique(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= '0' && c <= '9');
    if (!v) return false;
  }
  return true;
}

function estAlpha(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z');
    if (!v) return false;
  }
  return true;
}

function verif_ajout() {
  var mat = document.f.mat.value;
  var nom = document.f.nom.value;
  var prenom = document.f.prenom.value;

  if (isNaN(mat) || mat.length != 4 || !estNumerique(mat)) {
    alert('Indiquer un matricule de 4 chiffres!');
    return false;
  }

  if (nom.length == 0 || !estAlpha(nom)) {
    alert('Indiquer un nom composé uniquement de lettres alphabétiques!');
    return false;
  }

  if (prenom.length == 0 || !estAlpha(prenom)) {
    alert('Indiquer un prénom composé uniquement de lettres alphabétiques!');
    return false;
  }

  return true;
}

function verif_consultation() {
  var mat = document.f.mat.value;
  var detailcons = document.f.detailcons.value;
  var nbjours = document.f.nbjours.value;

  if (isNaN(mat) || mat.length != 4 || !estNumerique(mat)) {
    alert('Indiquer un matricule de 4 chiffres!');
    return false;
  }

  if (detailcons.length == 0) {
    alert('Remplir le champ Détail!');
    return false;
  }

  if (isNaN(nbjours) || nbjours < 0) {
    alert('Le prochain RDV doit être >= 0!');
    return false;
  }

  return true;
}