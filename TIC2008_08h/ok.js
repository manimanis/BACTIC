function ok() {
    var nom = document.f.nom.value;
    var prenom = document.f.prenom.value;
    var age = parseInt(document.f.age.value);
    var pays = document.f.pays.value;
    var impressions = document.f.impressions.value;

    if (nom.length == 0) {
        alert('Indiquer votre nom!');
        return false;
    }

    if (prenom.length == 0) {
        alert('Indiquer votre prénom!');
        return false;
    }

    if (isNaN(age) || age < 5 || age > 100) {
        alert('Indiquer votre age compris entre 5 et 100!');
        return false;
    }

    if (pays.length == 0) {
        alert('Indiquer votre pays!');
        return false;
    }

    alert('Merci pour votre visite!');
    return false;
}