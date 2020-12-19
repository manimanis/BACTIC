function estNumerique(ch) {
    for (var i = 0; i < ch.length; i++) {
        var c = ch.charAt(i);
        var v = (c >= '0' && c <= '9');
        if (!v) return false;
    }
    return true;
}

function estNumLivre(ch) {
    return ch.length == 5 && estNumerique(ch.substr(1)) && (ch.charAt(0) >= 'A' || ch.charAt(0) <= 'Z');
}

function checkedRadio(radio) {
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return radio[i].value;
        }
    }
    return '';
}

function estCIN(ch) {
    return ch.length == 8 && estNumerique(ch) && (ch.charAt(0) == '0' || ch.charAt(0) == '1');
}

function verif1() {
    var numlivre = document.f.numlivre.value;
    var typelivre = document.f.typelivre.value;
    var titrelivre = document.f.titrelivre.value;
    var nbrexemplaires = document.f.nbrexemplaires.value;

    if (!estNumLivre(numlivre)) {
        alert('Entrer un numéro de livre de 5 caractères commençant par une lettre majuscule!');
        return false;
    }

    if (typelivre == '') {
        alert('Sélectionner le type du livre!');
        return false;
    }

    if (titrelivre == '') {
        alert('Proposer le titre du livre!');
        return false;
    }

    if (isNaN(nbrexemplaires) || nbrexemplaires < 0) {
        alert('Indiquer un nombre d\'exemplaires strictement positif!');
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

function verif2() {
    var cin = document.f.cin.value;
    var dateemprunt = document.f.dateemprunt.value;
    var numlivre = document.f.numlivre.value;

    if (!estCIN(cin)) {
        alert('Entrer un numéro de CIN valide!');
        return false;
    }

    if (!estNumLivre(numlivre)) {
        alert('Entrer un numéro de livre de 5 caractères commençant par une lettre majuscule!');
        return false;
    }

    if (!estDate(dateemprunt)) {
        alert('Entrer une date d\'emprunt valide!');
        return false;
    }

    return true;
}

function verif3() {
    var typelivre = checkedRadio(document.f.typelivre);

    if (typelivre == '') {
        alert('Sélectionner le type de livre!');
        return false;
    }

    return true;
}