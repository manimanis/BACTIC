function estNumerique(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= '0' && c <= '9');
    if (!v) return false;
  }
  return true;
}

function estAlphabetique(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= 'A' && c <= 'Z') || (c >= 'a' && c <= 'z');
    if (!v) return false;
  }
  return true;
}

function estTelephone(ch) {
  return ch.length == 8 && estNumerique(ch) && ch.charAt(0) > '1';
}

function estMotPasse(ch) {
  return ch.length == 6 && ch.indexOf(' ') == -1;
}

function verif1() {
  var nom = document.f.nom.value;
  var prenom = document.f.prenom.value;
  var tel = document.f.tel.value;
  var adresse = document.f.adresse.value;
  var motpass = document.f.motpass.value;
  var motpass2 = document.f.motpass2.value;

  if (nom.length < 3 || !estAlphabetique(nom)) {
    alert("Le nom doit être composé d'au minimum 3 lettres alphabétiques.");
    return false;
  }

  if (prenom.length < 3 || !estAlphabetique(prenom)) {
    alert("Le prénom doit être composé d'au minimum 3 lettres alphabétiques.");
    return false;
  }

  if (!estTelephone(tel)) {
    alert("Le numéro de téléphone doit être composé de 8 chiffres.");
    return false;
  }

  if (adresse.length < 10) {
    alert("L'adresse doit comporter 10 caractères au minimum.");
    return false;
  }

  if (!estMotPasse(motpass)) {
    alert("Le mot de passe doit être composé de 6 caractères sans espaces.");
    return false;
  }

  if (motpass != motpass2) {
    alert("Les mots de passes ne sont pas identiques.");
    return false;
  }

  return true;
}


function verif2() {
  var idpizza = document.f.idpizza.value;
  var qtecmd = parseInt(document.f.qtecmd.value);
  var tel = document.f.tel.value;
  var motpass = document.f.motpass.value;

  if (idpizza == '') {
    alert("Sélectionner le type du pizza.");
    return false;
  }

  if (isNaN(qtecmd) || qtecmd < 1 || qtecmd > 5) {
    alert("la quantité doit être comprise entre 1 et 5.");
    return false;
  }

  if (!estTelephone(tel)) {
    alert("Le numéro de téléphone doit être composé de 8 chiffres.");
    return false;
  }
  
  if (!estMotPasse(motpass)) {
    alert("Le mot de passe doit être composé de 6 caractères sans espaces.");
    return false;
  }

  return true;
}