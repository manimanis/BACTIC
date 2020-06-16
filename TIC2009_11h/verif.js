function estNumTel(ch) {
  if (isNaN(ch) || parseInt(ch) != ch || ch.length != 8) {
    return false;
  }
  return true;
}

function verif() {
  var nom_prenom = document.f.nom_prenom.value;
  var age = parseInt(document.f.age.value);
  var diplome = document.f.diplome.value;
  var specialite = document.f.specialite.value;;
  var tel = document.f.tel.value;

  if (nom_prenom == '') {
    alert('Indiquer votre nom et prénom!');
    return false;
  }

  if (isNaN(age) || age < 18 || age > 60) {
    alert('Indiquer un age entre 18 et 60!');
    return false;
  }

  if (diplome == '') {
    alert('Sélectionner votre diplôme!');
    return false;
  }

  if (specialite == '') {
    alert('Indiquer votre spécialité!');
    return false;
  }

  if (!estNumTel(tel)) {
    alert('Indiquer un numéro de téléphone!');
    return false;
  }

  return true;
}