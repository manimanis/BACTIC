function calc_sommediv() {
  var n = parseInt(document.f.n.value);
  if (isNaN(n) || n <= 1) {
    alert("Veuillez saisir un entier > 1!");
    return;
  }
  document.f.res.value = sommediv(n);
}

function sommediv(n) {
  var s = 1;
  for (var i = 2; i <= Math.sqrt(n); i++) {
    if (n % i == 0) {
      s += (i + n / i);
    }
  }
  return s;
}


function calc_nbresamis(mini, maxi) {
  var b_inf = parseInt(document.f.b_inf.value);
  var b_sup = parseInt(document.f.b_sup.value);
  if (isNaN(b_inf) || isNaN(b_sup) || b_sup <= b_inf || b_inf < mini || b_sup > maxi) {
    alert("Saisie non valide!");
    return;
  }
  document.f.res.value = nbres_amis(b_inf, b_sup);
}

function nbres_amis(b_inf, b_sup) {
  var res = '';
  for (var i = b_inf; i <= b_sup; i++) {
    var j = sommediv(i);
    var k = sommediv(j);
    if (k == i && i != j) {
      res += '(' + i + ', ' + j + ')\n';
    }
  }
  return res;
}