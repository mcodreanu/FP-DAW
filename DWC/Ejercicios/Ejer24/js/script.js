function dibujarRectangulo() {

  let srcFil = document.getElementById("srcFil").value;
  let srcCol = document.getElementById("srcCol").value;
  let rectangulo = document.getElementById("rectangulo");

  rectangulo.innerHTML = "";

  for (let filas = 0; filas <= srcFil; filas++) {
    if (filas == 0) {
      for (let col = 0; col <= srcCol; col++) {
        rectangulo.innerHTML += "#";
      }
      rectangulo.innerHTML += "\n";
      filas++;
    } else if (filas == srcFil) {
      for (let col = 0; col <= srcCol; col++) {
        rectangulo.innerHTML += "#";
      }
    } else {
      rectangulo.innerHTML += "#";
      for (let col = 0; col <= srcCol-2; col++) {
        rectangulo.innerHTML += " ";
      }
      rectangulo.innerHTML += "#\n";
    }
  }
}