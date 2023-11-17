function calcularFactorial() {
   
  let num = document.getElementById("numSencer").value;
  let factorial = 1;
  let resFactorial = document.getElementById("resFactorial");

  if (!isNaN(num)) {
    for(i = num; i > 0; i--){
      factorial *= i;
    }
    resFactorial.innerHTML = "El factorial de " + num + " és: " + factorial;
  } else {
    resFactorial.innerHTML = "Valor incorrecto."
  }
}