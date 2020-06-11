function email_valide(ch) {
    if (ch.length == 0 || ch.length > 50) {
        return false;
    }
    var iat = ch.indexOf('@');
    var ipt = ch.lastIndexOf('.');

    if (iat == -1 || ipt == -1 || ipt < iat) {
        return false;
    }

    var ch1 = ch.substring(0, iat),
        ch2 = ch.substring(iat+1, ipt),
        ch3 = ch.substring(ipt+1);
    if (ch1.length < 3 || !est_alpha(ch1) ||
        ch2.length < 3 || !est_alpha(ch2) ||
        ch3.length < 2 || ch3.length > 4 || !est_alpha(ch3)) {
        return false;
    }

    return true;
}

function est_alpha(ch) {
    if (ch.length == 0) {
        return false;
    }
    for (var i = 0; i < ch.length; i++) {
        var c = ch.charAt(i);
        var v = (c >= 'A' && c <= 'Z') ||
                (c >= 'a' && c <= 'z') ||
                (c >= '0' && c <= '9');
        if (!v) return false;
    }
    return true;
}

function mdp_valide(ch) {
    if (ch.length != 6) {
        return false;
    }

    var cmaj = 0, cmin = 0, cchi = 0;
    for (var i = 0; i < ch.length; i++) {
        var c = ch.charAt(i);
        if (c >= 'A' && c <= 'Z') cmaj++;
        if (c >= 'a' && c <= 'z') cmin++;
        if (c >= '0' && c <= '9') cchi++;
        if (cmaj > 0 && cmin > 0 && cchi > 0) {
            return true;
        }
    }

    return false;
}

function test() {
    var mail = document.f.mail.value;
    var mdp = document.f.mdp.value;
    var genre = document.f.genre.value;
    var q1 = document.f.q1;
    var q2 = document.f.q2;
    var q3 = document.f.q3;
    var r1 = '', r2 = '', r3 = '';

    if (!email_valide(mail)) {
        alert("Email invalide!");
        return false;
    }

    if (!mdp_valide(mdp)) {
        alert("Le mot de passe doit être composé de 6 caractères dont au moins une majuscule, une miniscule et un chiffre!");
        return false;
    }

    if (genre == '0') {
        alert("Veuillez sélectionner votre genre!");
        return false;
    }

    for (var i = 0; i < q1.length; i++) {
        if (q1[i].checked) {
            r1 = q1[i].value;
            break;
        }
    }

    for (var i = 0; i < q2.length; i++) {
        if (q2[i].checked) {
            r2 = q2[i].value;
            break;
        }
    }

    for (var i = 0; i < q3.length; i++) {
        if (q3[i].checked) {
            r3 = q3[i].value;
            break;
        }
    }

    if (r1 == '' || r2 == '' || r3 == '') {
        alert("Veuillez répondre aux questions!");
        return false;
    }

    return true;
}

function test2() {
    var nums = document.f.nums.value;

    if (nums == '0') {
        alert("Veuillez sélectionner un thème!");
        return false;
    }

    return true;
}