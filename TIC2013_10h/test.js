// JavaScript Document
function verifForm1(elem) {
	var ncin, nville;
	
	ncin = document.f.ncin.value;
	nville = document.f.nville.value;
	
	if ((elem == -1 || elem == 0) && (ncin.length != 8 || isNaN(ncin) || (ncin.charAt(0) != '0' && ncin.charAt(0) != '1'))) {
		alert("La carte d'identité doit être formée par 8 chiffres et doit commencer par 0 ou 1");
		return false;
	}
	
	if ((elem == -1 || elem == 1) && (nville.length < 4 || nville.charAt(0) < 'A' || nville.charAt(0) > 'Z')) {
		alert("Le nom de ville doit commencer par une lettre majuscule");
		return false;
	}
	
	return true;
}

function verifForm2(elem) {
	var domaine, ville;
	
	domaine = document.f.domaine.value;
	ville = document.f.ville.value;
	
	if ((elem == -1 || elem == 0) && (domaine == '' && ville == '')) {
		alert("Veuillez remplir au moins un champ");
		return false;
	}
	
	if ((elem == -1 || elem == 1) && (ville != '' && (ville.length < 4 || ville.charAt(0) < 'A' || ville.charAt(0) > 'Z'))) {
		alert("Le nom de ville doit commencer par une lettre majuscule");
		return false;
	}
	
	return true;
}

function verifForm3(elem) {
	var ncin, ref;
	
	ncin = document.f.ncin.value;
	ref = parseInt(document.f.ref.value);
	
	if ((elem == -1 || elem == 0) && (ncin.length != 8 || isNaN(ncin) || (ncin.charAt(0) != '0' && ncin.charAt(0) != '1'))) {
		alert("La carte d'identité doit être formée par 8 chiffres et doit commencer par 0 ou 1");
		return false;
	}

	if ((elem == -1 || elem == 1) && (isNaN(ref) || ref <= 0)) {
		alert("La référence doit être un entier strictement positif");
		return false;
	}
	document.f.ref.value = ref;
	
	return true;
}