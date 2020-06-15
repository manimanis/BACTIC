function verif() {
  var ex = document.f.ex.value;

  if (ex.length == 0) {
    alert('Sélectionner un exercice!');
    return false;
  }

  return true;
}