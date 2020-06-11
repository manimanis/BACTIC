function validerSaisieNotes() {
	var num_eleve, matiere, dc, ds;
	
	num_eleve = document.f.num_eleve.value;
	matiere = document.f.matiere.selectedIndex;
	dc = parseFloat(document.f.dc.value);
	ds = parseFloat(document.f.ds.value);
	
	if (num_eleve.length != 5 || num_eleve.substr(0, 3) != '4SI' || isNaN(num_eleve.substr(3, 2))) {
		alert("Le nom de l'élève doit commencer par 4SI suivi de deux chiffres !");		
		return false;
	}
	
	if (matiere == 0) {
		alert("Sélectionner une matière");
		return false;
	}
	
	if (isNaN(dc) || dc < 0 || dc > 20) {
		alert("Taper une note dans l'intervalle [0..20]");
		return false;
	}
	
	if (isNaN(ds) || ds < 0 || ds > 20) {
		alert("Taper une note dans l'intervalle [0..20]");
		return false;
	}
	
	return true;
}

function validerBulletin() {
	var num_eleve;
	
	num_eleve = document.f.num_eleve.value;

	if (num_eleve.length != 5 || num_eleve.substr(0, 3) != '4SI' || isNaN(num_eleve.substr(3, 2))) {
		alert("Le nom de l'élève doit commencer par 4SI suivi de deux chiffres !");		
		return false;
	}
	
	return true;
}