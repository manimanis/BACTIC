function calc_ppcm() {
  var n = parseInt(document.f.n.value);
  var m = parseInt(document.f.m.value);
  if (isNaN(n) || isNaN(m) || n < m || m < 1) {
    alert("Veuillez saisir deux entiers n et m (1 < m <= N)!");
    return;
  }
  document.f.res.value = ppcm(n, m);
}

function ppcm(a, b) {
  var p = a;
  while (p % b != 0) {
    p += a;
  }
  return p;
}


function calc_primalite() {
  var n = parseInt(document.f.n.value);
  var m = parseInt(document.f.m.value);
  if (isNaN(n) || isNaN(m) || n < m || m < 1) {
    alert("Veuillez saisir deux entiers n et m (1 < m <= N)!");
    return;
  }
  var prim = 'Les deux entiers ne sont pas premiers entre eux!';
  if (primalite(n, m)) {
    prim = 'Les deux entiers sont premiers entre eux!';
  }
  document.f.res.value = prim;
}

function primalite(a, b) {
  return ppcm(a, b) == (a * b);
}