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

function estNumerique(ch) {
    for (var i = 0; i < ch.length; i++) {
        var c = ch.charAt(i);
        var v = (c >= '0' && c <= '9');
        if (!v) return false;
    }
    return true;
}

function validerSaisie() {
    var datetrans = document.f.datetrans.value;
    var numcompte = document.f.numcompte.value;
    var libelletrans = document.f.libelletrans.value;
    var monttrans = document.f.monttrans.value;

    if (!estDate(datetrans)) {
        alert('Entrer une date valide au format jj/mm/aaaa!');
        return false;
    }

    if (numcompte.length != 20 || !estNumerique(numcompte)) {
        alert('Entrer un numéro de compte composé de 20 chiffres!');
        return false;
    }

    if (libelletrans.length == 0) {
        alert('Libeller la transaction!');
        return false;
    }

    if (isNaN(monttrans) || parseFloat(monttrans) <= 0.0) {
        alert('Le montant de la transaction doit être positif!');
        return false;
    }

    return true;
}

function validerLister() {
    var numcompte = document.f.numcompte.value;
    var motpasse = document.f.motpasse.value;

    if (numcompte.length != 20 || !estNumerique(numcompte)) {
        alert('Entrer un numéro de compte composé de 20 chiffres!');
        return false;
    }

    if (motpasse.length != 8) {
        alert('Entrer un mot de passe de exactement 8 caractères!');
        return false;
    }

    return true;
}
