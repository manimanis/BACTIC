function checked_radio_value(radio) {
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return radio[i].value;
        }
    }
    return '';
}

function est_alphabetique(ch) {
    for (var i = 0; i < ch.length; i++) {
        var car = ch.charAt(i);
        var valid = (car >= 'A' && car <= 'Z') || (car >= 'a' && car <= 'z');
        if (!valid) {
            return false;
        }
    }
    return true;
}

function est_numerique(ch) {
    for (var i = 0; i < ch.length; i++) {
        var car = ch.charAt(i);
        var valid = (car >= '0' && car <= '9');
        if (!valid) {
            return false;
        }
    }
    return true;
}

function est_email(ch) {
    var pat = ch.indexOf('@');
    var ppt = ch.lastIndexOf('.');

    // Existance de '@' et du '.'
    if (pat == -1 || ppt == -1) {       
        return false;
    }
    // Position du '.' doit être supèrieure à celle du '@'
    if (ppt < pat) {       
        return false;
    }
    // '@' ne doit pas être le premier caractère
    // '.' ne doit pas âtre le dernier caractère
    // '.' ne doit pas être directement après '@'
    // Ces conditions assurent que ch1, ch2 et ch3 ne sont pas vides
    if (pat == 0 || ppt == (ch.length - 1) || (ppt - pat) == 1) {       
        return false;
    }

    ch1 = ch.substring(0, pat);
    ch2 = ch.substring(pat + 1, ppt);
    ch3 = ch.substring(ppt + 1);

    // les trois portions de l'email doivent être alphabétiques
    if (!est_alphabetique(ch1) || !est_alphabetique(ch2) || !est_alphabetique(ch3)) {
        return false;
    }

    // ch3 doit contenir 2 ou 3 lettres
    return (ch3.length == 2) || (ch3.length == 3);
}

function verif_form() {
    var matricule = document.f.matricule.value;
    var nom = document.f.nom.value;
    var prenom = document.f.prenom.value;
    var genre = checked_radio_value(document.f.genre);
    var email = document.f.email.value;

    if (matricule.length != 4
        || !est_alphabetique(matricule.substr(0, 2))
        || !est_numerique(matricule.substr(2, 2))) {
            alert('Le marticule doit être composé de 2 lettres suivies de 2 chiffres');
            return false;
        }
    
    if (nom.length == 0 || !est_alphabetique(nom)) {
        alert('Le nom doit être composé de lettres alphabétiques.');
        return false;
    }

    if (prenom.length == 0 || !est_alphabetique(prenom)) {
        alert('Le prénom doit être composé de lettres alphabétiques.');
        return false;
    }

    if (genre == '') {
        alert('Sélectionner un genre.');
        return false;
    }

    if (!est_email(email)) {
        alert('Email invalide doit être au format: xxx@yyy.zz ou xxx@yyy.zzz');
        return false;
    }

    return true;
}

function verif_stat_form() {
    var matricule = document.f.matricule.value;
    if (matricule == '') {
        alert('Séléctionner un pilote SVP!');
        return false;
    }

    return true;
}