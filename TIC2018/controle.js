function genererCaptcha() {
  var cpt = '';
  for (var i = 0; i < 10; i++) {
    var k = 1 + Math.floor(26 * Math.random());
    var c;
    if (k % 2 == 0) {
      c = String.fromCharCode(64 + k);
    } else {
      c = String.fromCharCode(96 + k);
    }

    cpt = cpt + c;
  }
  document.f.captcha.value = cpt;
}

function nbreLettresMaj(ch) {
  var cpt = 0;
  for (var i = 0; i < ch.length; i++) {
    if (ch.charAt(i) >= 'A' && ch.charAt(i) <= 'Z') {
      cpt++;
    }
  }
  return cpt;
}

function checkedItem(elem) {
  for (var i = 0; i < elem.length; i++) {
    if (elem[i].checked) {
      return elem[i].value;
    }
  }
  return -1;
}

function verif() {
  var h = document.f.h.value;
  var acc = checkedItem(document.f.acc)
  var rest = checkedItem(document.f.rest);
  var pc = document.f.pc.checked;
  var pp = document.f.pp.checked;
  var cw = document.f.cw.checked;
  var cpt = document.f.captcha.value;
  var rep = parseInt(document.f.reponse.value);

  if (h == -1) {
    alert("La sélection d'un hôtel est obligatoire!");
    return false;
  }

  if (acc == -1) {
    alert("Evaluez l'accueil!");
    return false;
  }

  if (rest == -1) {
    alert("Evaluez la restauration!");
    return false;
  }

  if (rep != nbreLettresMaj(cpt)) {
    alert("Vérifier le captcha!");
    return false;
  }

  return true;
}