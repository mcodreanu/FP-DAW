window.onload = function numeros(){
    let arrayNum = [];
    let suma = 0;
    let sumaMayor = 0;
    let cantidad = 0;

    for (cont = 0; cont < 8; cont++) {
      let num = prompt("Introduzca un número:")
      if (num == null) {
        return;
      }
      arrayNum.push(parseInt(num));
    }

    for (let i = 0; i < arrayNum.length; i++) {
      suma+=arrayNum[i];

      if (arrayNum[i] > 36) {
        sumaMayor+=arrayNum[i];
      }

      if (arrayNum[i] > 50) {
        cantidad++;
      }
    }

    document.getElementById("res1").innerHTML = "Números introduïts: " + arrayNum;
    document.getElementById("res2").innerHTML = "SUMA = " + suma;
    document.getElementById("res3").innerHTML = "SUMA de números > 36 = " + sumaMayor;
    document.getElementById("res4").innerHTML = "Quantitat de números > 50 = " + cantidad;
}