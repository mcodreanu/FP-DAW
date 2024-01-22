function calcularNumAleatorio() {

  let numAleatorio = Math.floor((Math.random() * 100) + 1);

  return numAleatorio;
}

let numAleatorio = calcularNumAleatorio();

function juegoAdivinarNum(numAleatorio) {

  let num = document.getElementById("numAdivinar").value;

  if (isNaN(num)) {
    resJuego.innerHTML = "Tienes que escribir un número!";
  }
  if (num == numAleatorio) {
    resJuego.innerHTML = "Has ganado!";
  }
  if (num < numAleatorio) {
    resJuego.innerHTML = "El número es mayor.";
  }
  if (num > numAleatorio) {
    resJuego.innerHTML = "El número es menor.";
  }
}

function cancelarJuego() {
  let resJuego = document.getElementById("resJuego");

  resJuego.innerHTML = "El juego se ha cancelado!"
}