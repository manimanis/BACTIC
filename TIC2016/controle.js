function annee() {
	var dt = new Date();
	document.f.aaaa.value = dt.getFullYear();
}

function estBissextile(a) {
  return (a % 100 != 0 && a % 4 == 0) || (a % 400 == 0);
}

function nbreJours(m, a) {
  switch (m) {
      case 1: case 3: case 5: case 7: case 8: case 10: case 12:
          return 31;
      case 4: case 6: case 9: case 11:
          return 30;
      case 2:
          if (estBissextile(a)) {
              return 29;
          }
          return 28;
  }
  return 0;
}

// format date : jj/mm/aaaa
//               0123456789
function estDate(jj, mm, aaaa) {
  if (isNaN(jj) || isNaN(mm) || isNaN(aaaa) || mm < 1 || mm > 12 || jj < 1 || jj > 31) {
      return false;
  }

  var nbj = nbreJours(mm, aaaa);
  if (jj > nbj) {
      return false;
  }

  return true;
}

function verif() {
  var idpiece = document.f.idpiece.value;
  var idsalle = document.f.idsalle.value;
  var jj = parseInt(document.f.jj.value);
  var mm = parseInt(document.f.mm.value);
  var aaaa = parseInt(document.f.aaaa.value);

	if (idpiece == '') {
		alert("Sélectionner une pièce!");
		return false;
  }
  
	if (idsalle == '') {
		alert("Sélectionner une Salle!");
		return false;
  }
  
	if (!estDate(jj, mm, aaaa)) {
		alert("Date incorrecte!");
		return false;
  }
  
	return  true;
}



