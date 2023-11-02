//Ejercicio 01
function abrirSobre(){
    let img = document.getElementById('sobre');

    img.src = 'img/sobre-abierto.png'; 
    img.setAttribute("onclick", "cerrarSobre()");   
}

function cerrarSobre(){
    let img = document.getElementById('sobre');

    img.src = 'img/sobre-cerrado.png';
    img.setAttribute("onclick", "abrirSobre()"); 
}

//Ejercicio 02
function inInterval() {
    
    let num = document.getElementById("num").value;
    
    let res;

    if (isNaN(num) || num < -1 || num > 1) {
      res = "Valor erroni";
    } else {
      res = "Valor correcte";
    }

    document.getElementById("text").innerHTML = res;
}

//Ejercicio 03
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