function estNumerique(ch) {
    for (var i = 0; i < ch.length; i++) {
        var c = ch.charAt(i);
        var v = (c >= '0' && c <= '9');
        if (!v) return false;
    }
    return true;
}

function estCIN(ch) {
    return ch.length == 8 && estNumerique(ch) && (ch.charAt(0) == '0' || ch.charAt(0) == '1');
}

function checkedRadio(radio) {
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return radio[i].value;
        }
    }
    return '';
}

function verifier() {
    var matricule = document.f.matricule.value;
    var ncin = document.f.ncin.value;
    var nom = document.f.nom.value;
    var prenom = document.f.prenom.value;
    var etatcivil = checkedRadio(document.f.etatcivil);
    var nbrenfant = document.f.nbrenfant.value;
    var typeassurance = document.f.typeassurance.value;

    if (matricule.length != 10 || !estNumerique(matricule)) {
        alert('Entrer un matricule de 10 chiffres!');
        return false;
    }

    if (!estCIN(ncin)) {
        alert('Entrer un numéro CIN composé de 8 chiffres commençant par 0 ou 1!');
        return false;
    }

    if (nom.length == 0) {
        alert('Entrer un nom!');
        return false;
    }

    if (prenom.length == 0) {
        alert('Entrer un prénom!');
        return false;
    }

    if (etatcivil == '') {
        alert('Indiquer l\'état civil!');
        return false;
    }

    if ((etatcivil == 'C' && nbrenfant != 0) || nbrenfant < 0) {
        alert('Nombre d\'enfants incorrect!');
        return false;
    }

    if (typeassurance == '') {
        alert('Indiquer le type d\'assurance!');
        return false;
    }

    return true;
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
function estDate(ch) {
    if (ch.length != 10) {
        return false;
    }
    var p1 = ch.indexOf('/');
    var p2 = ch.lastIndexOf('/');
    if (p1 != 2 || p2 != 5) {
        return false;
    }

    var jj = parseInt(ch.substring(0, 2));
    var mm = parseInt(ch.substring(3, 5));
    var aaaa = parseInt(ch.substring(6));
    if (isNaN(jj) || isNaN(mm) || isNaN(aaaa) || mm < 1 || mm > 12 || jj < 1 || jj > 31) {
        return false;
    }

    var nbj = nbreJours(mm, aaaa);
    if (jj > nbj) {
        return false;
    }

    return true;
}

function valider() {
    var matricule = document.f.matricule.value;
    var datesoin = document.f.datesoin.value;
    var montantsoin = document.f.montantsoin.value;

    if (matricule.length != 10 || !estNumerique(matricule)) {
        alert('Entrer un matricule de 10 chiffres!');
        return false;
    }

    if (!estDate(datesoin)) {
        alert('Entrer une date de soins valide!');
        return false;
    }

    if (isNaN(montantsoin) || montantsoin <= 0) {
        alert('Entrer un montant de soins strictement positif!');
        return false;
    }

    return true;
}

function tester() {
    var matricule = document.f.matricule.value;

    if (matricule.length != 10 || !estNumerique(matricule)) {
        alert('Entrer un matricule de 10 chiffres!');
        return false;
    }

    return true;
}