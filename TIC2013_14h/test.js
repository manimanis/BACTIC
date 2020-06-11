// JavaScript Document
function valider() {
	var ncin, equip;
	
	ncin = document.f.ncin.value;
	equip = document.f.equip.selectedIndex;
	
	if (ncin.length != 8 || isNaN(ncin) || (ncin.charAt(0) != '0' && ncin.charAt(0) != 1)) {
		alert("Le numéro de carte d'identité doit être un nombre composé de 8 chiffres commençant par 0 ou 1");
		return false;
	}
	
	if (equip == 0) {
		alert("Veuillez sélectionner un équipement");
		return false;
	}
	
	return true;
}