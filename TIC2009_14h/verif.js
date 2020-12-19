function estCIN(ch) {
  if (isNaN(ch) || parseInt(ch) != ch || ch.length != 8) {
    return false;
  }
  return true;
}

function estMatricule(ch) {
  ch = ch.toUpperCase();
  var p = ch.indexOf('TU');
  // Le matricule doit contenir TU
  // Le symbole TU ne doit pas être situé à la fin de la chaine
  if (p == -1 || p == ch.length - 1) {
    return false;
  }
  var v1 = ch.substring(0, p);
  var v2 = ch.substring(p+2);
  if (v1 == '' || isNaN(v1) || parseInt(v1) != v1 || v1 <= 0) {
    return false;
  }
  if (v2 == '' || isNaN(v2) || parseInt(v2) != v2 || v2 <= 0) {
    return false;
  }

  return true;
}

function verif() {
  var num_cin = document.f.num_cin.value;
  var nom = document.f.nom.value;
  var prenom = document.f.prenom.value;
  var matricule_voit = document.f.matricule_voit.value;

  if (!estCIN(num_cin)) {
    alert('Indiquer votre numéro de CIN!');
    return false;
  }

  if (nom == '' || prenom == '') {
    alert('Indiquer votre nom et prénom!');
    return false;
  }

  if (!estMatricule(matricule_voit)) {
    alert('Indiquer le matricule de voiture xxxTUyyyy!');
    return false;
  }

  return true;
}