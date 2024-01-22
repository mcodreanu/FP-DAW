function calcularLetraDNI() {
   
  let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

  let numero = prompt("Escribe tu numero de DNI (sin la letra)");

  if (numero < 0 || numero > 99999999) {
    alert("El numero indicado no es válido");
    numero = prompt("Escribe tu numero de DNI (sin la letra)");
  } else {
    let letra = letras[numero % 23];
    alert(numero + letra);
  }
}