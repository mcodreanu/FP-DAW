function calcularCoeficiente() {
    
    let valor1 = document.getElementById("valor1").value;
    let valor2 = document.getElementById("valor2").value;
    
    let x;

    if (isNaN(valor1) || isNaN(valor2)) {
      x = "Valor erroni";
    } else {
      x = -valor2/valor1;
    }

    document.getElementById("res").innerHTML = x;
}