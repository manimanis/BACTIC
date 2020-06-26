function calc_factprem() {
  var n = parseInt(document.f.n.value);
  if (isNaN(n) || n <= 1) {
    alert("Veuillez saisir un entier > 1!");
    return;
  }
  document.f.res.value = factprem(n).join('x');
}

function factprem(n) {
  var f = 2;
  var sqrt_n = Math.sqrt(n) + 1;
  var fp = [];
  while (n != 1) {
    if (n % f == 0) {
      fp.push(f);
      n /= f;
    } else if (f == 2) {
      f++;
    } else if (f <= sqrt_n) {
      f += 2;
    } else {
      f = n;
    }
  }
  return fp;
}


function calc_nbrespremiers(mini, maxi) {
  var b_inf = parseInt(document.f.b_inf.value);
  var b_sup = parseInt(document.f.b_sup.value);
  if (isNaN(b_inf) || isNaN(b_sup) || b_sup <= b_inf || b_inf < mini || b_sup > maxi) {
    alert("Saisie non valide!");
    return;
  }
  document.f.res.value = nbres_premiers(b_inf, b_sup);
}

function est_premier(n) {
  if (n < 2) return false;
  if (n == 2 || n == 3) return true;
  if (n % 2 == 0) return false;
  var p = 5;
  var sqrt_n = Math.sqrt(n) + 1;
  while (p <= sqrt_n) {
    if (n % p == 0) {
      return false;
    }
    p += 2;
  }
  return true;
}

function nbres_premiers(b_inf, b_sup) {
  var res = "Dans l'intervalle [" + b_inf + ", " + b_sup + "] :\n";
  for (var i = b_inf; i <= b_sup; i++) {
    if (est_premier(i)) {
      res += i + ' est premier\n';
    }
  }
  return res;
}