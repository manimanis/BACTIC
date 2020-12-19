function estCIN(ch) {
    return ch.length == 8 && !isNaN(ch) && parseInt(ch) == ch;
}

function selectedRadio(radio) {
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return radio[i].value;
        }
    }
    return '';
}

function valide() {
    var cin = document.f.cin.value;
    var nom = document.f.nom.value;
    var prenom = document.f.prenom.value;

    var ex2 = selectedRadio(document.f.ex2);
    var ex3_1 = document.f.ex3_1.value;
    var ex3_2 = document.f.ex3_2.value;
    var ex3_4 = document.f.ex3_4.value;

    if (!estCIN(cin)) {
        alert('Entrer un CIN valide composé de 8 chiffres!');
        return false;
    }

    if (nom.length == 0 || prenom.length == 0) {
        alert('Indiquer votre nom et votre prénom!');
        return false;
    }

    if (ex2 == '' || ex3_1.length == 0 || ex3_2.length == 0 || ex3_4.length == 0) {
        alert('Veuillez répondre aux questions du test!');
        return false;
    }

    return true;
}