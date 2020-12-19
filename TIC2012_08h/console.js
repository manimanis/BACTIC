function checkedRadio(radio) {
  for (var i = 0; i < radio.length; i++) {
    if (radio[i].checked) {
      return radio[i].value;
    }
	}
	return '';
}

function verif_inscription() {
  var num = document.f.num.value;
  var nom = document.f.nom.value;
  var prenom = document.f.prenom.value;
  var genre = checkedRadio(document.f.genre);
  var niv = document.f.niv.value;

  if (num.length != 4 || isNaN(num) || !estNumerique(num)) {
    alert("Donner un numéro composé de 4 chiffres.");
    return false;
  }

  if (nom.length == 0 || !estAlpha(nom)) {
    alert("Donner un nom composé uniquement de lettres.");
    return false;
  }

  if (prenom.length == 0 || !estAlpha(prenom)) {
    alert("Donner un prénom composé uniquement de lettres.");
    return false;
  }

  if (genre == '') {
    alert("Sélectionner un genre SVP!");
    return false;
  }

  if (niv == -1) {
    alert("Sélectionner un niveau SVP!");
    return false;
  }

  return true;
}

function verif_votes() {
  var num = document.f.num.value;
  var cf = checkedRadio(document.f.cf);
  var cg = checkedRadio(document.f.cg);

  if (num.length != 4 || isNaN(num) || !estNumerique(num)) {
    alert("Donner un numéro composé de 4 chiffres.");
    return false;
  }

  if (cf == '' || cg == '') {
    alert("Sélectionner un candidat de chaque genre SVP!");
    return false;
  }

  return true;
}

function estAlpha(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= 'a' && c <= 'z') ||
      (c >= 'A' && c <= 'Z') ||
      (c == ' ');
    if (!v) return false;
  }
  return true;
}

function estNumerique(ch) {
  for (var i = 0; i < ch.length; i++) {
    var c = ch.charAt(i);
    var v = (c >= '0' && c <= '9');
    if (!v) return false;
  }
  return true;
}