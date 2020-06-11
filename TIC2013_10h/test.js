// JavaScript Document
function verifCIN(ncin) {
	if (ncin.length == 0) {
		return false;
	}

	if (ncin.length != 8 || isNaN(ncin) || (ncin.charAt(0) != '0' && ncin.charAt(0) != '1')) {
		alert("La carte d'identité doit être formée par 8 chiffres et doit commencer par 0 ou 1");
		return false;
	}
	return true;
}

function verifNomVille(nville) {
	if (nville.length == 0) {
		return false;
	}

	if (nville.length < 4 || nville.charAt(0) < 'A' || nville.charAt(0) > 'Z') {
		alert("Le nom de ville doit commencer par une lettre majuscule");
		return false;
	}

	return true;
}

function verifReference(ref) {
	if (ref.length == 0) {
		return false;
	}

	if (isNaN(ref) || parseInt(ref) != ref || ref <= 0) {
		alert("La référence doit être un entier strictement positif");
		return false;
	}

	return true;		
}

function verifForm1() {
	var ncin = document.f.ncin.value;
	var nville = document.f.nville.value;

	if (ncin.length == 0) {
		alert('Veuillez indiquer votre numéro de CIN!');
		return false;
	}

	if (nville.length == 0) {
		alert('Veuillez indiquer le nom de la ville!');
		return false;
	}

	return verifCIN(ncin) && verifNomVille(nville);
}

function verifForm2() {
	var domaine, ville;
	
	domaine = document.f.domaine.value;
	ville = document.f.ville.value;
	
	if (domaine == '' && ville == '') {
		alert("Veuillez remplir au moins un champ");
		return false;
	}

	if (ville != '' && !verifNomVille(ville)) {
		return false;
	}
	
	return true;
}

function verifForm3(elem) {
	var ncin, ref;
	
	ncin = document.f.ncin.value;
	ref = document.f.ref.value;

	if (ncin.length == 0) {
		alert('Veuillez indiquer votre numéro de CIN!');
		return false;
	}

	if (ref.length == 0) {
		alert('Veuillez indiquer le numéro de référence!');
		return false;
	}
	
	return verifCIN(ncin) && verifReference(ref);
}
