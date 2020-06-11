function estAlpha(str) {
    var i;
    for (i = 0; i < str.length; i++) {
        var c, v;
        c = str.charAt(i);
        v = (c >= 'a') && (c <= 'z') ||
            (c >= 'A') && (c <= 'Z') ||
            (c == ' ');
        if (!v) return false;
    }
    return true;
}

function espaces(ch) {
    var ch1 = '', 
        i = 0;
        
    do {
        // Sauter tous les espaces
        while (i < ch.length && 
               ch.charAt(i) == ' ') i++;

        // Nouveau mot ?
        if (i < ch.length) {
            // Précéder le mot par un espace
            // s'il n'est pas le premier
            if (ch1 != '') {
                ch1 += ' ';
            }
            
            // Mettre le premier caractère du mot en majuscules
            // puis passer au caractère suivant
            ch1 += ch.charAt(i).toUpperCase();
            i++;

            // Ajouter les autres caractères du mot
            while (i < ch.length && 
                   ch.charAt(i) != ' ') {
                ch1 += ch.charAt(i);
                i++;
            }
        }
    } while (i < ch.length);
    
    return ch1;
}

function verif() {
    var cin = document.f.cin.value;
    var nom = document.f.nom.value;
    var prenom = document.f.prenom.value;
    var tel = document.f.tel.value;
    var article = document.f.article.selectedIndex;
    var prix_propose = parseInt(document.f.prix_propose.value);
    
    if (cin.length != 8 || isNaN(cin) || 
        (cin.charAt(0) != '0' && cin.charAt(0) != '1')) {
        alert("CIN est un nombre de 8 chiffres commençant par 0 ou 1");
        return false;
    }
   
    if (nom.length < 3 || nom.length > 30 || !estAlpha(nom)) {
        alert("Le nom doit être composé de lettres et d'espaces (entre 3 et 30 caractères)");
        return false;
    }
    
    if (prenom.length < 3 || prenom.length > 30 || !estAlpha(prenom)) {
        alert("Le prénom doit être composé de lettres et d'espaces (entre 3 et 30 caractères)");
        return false;
    }
    
    if (tel.length != 8 || isNaN(tel) || tel.charAt(0) == '0') {
        alert("Téléphone est un nombre de 8 chiffres ne commençant pas par 0");
        return false;
    }
    
    if (article == 0) {
        alert("Sélectionner un article");
        return false;
    }
    
    if (isNaN(prix_propose) || prix_propose <= 0) {
        alert("Le prix prosposé doit être un entier strictement positif");
        return false;
    }
    
    return true;
}