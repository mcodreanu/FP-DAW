function leerCadena() {
    
  let cadena = window.prompt("Escribe una frase:");

  let paraules = cadena.split(" ")

  document.getElementById("num-paraules").innerHTML = paraules.length;

  document.getElementById("primera-darrera-paraula").innerHTML = paraules[0] + "," + paraules[paraules.length-1];

  document.getElementById("ordre-invers").innerHTML = paraules.reverse();

  document.getElementById("a-z").innerHTML = paraules.sort();

  document.getElementById("z-a").innerHTML = paraules.sort().reverse();

  document.getElementById("palindromo").innerHTML = palindromo(cadena);
}

function palindromo(str) {
  let re = /[\W_]/g;
  let lowRegStr = str.toLowerCase().replace(re, '');
  let reverseStr = lowRegStr.split('').reverse().join(''); 
  return reverseStr === lowRegStr;
}