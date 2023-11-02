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

//Ejercicio 04
function calcularAreaYLongitud() {
    
    let radi = document.getElementById("radi").value;
    
    let area = Math.PI * Math.pow(radi, 2);
    let longitud = 2 * Math.PI * radi;

    if (isNaN(radi)) {
        document.getElementById("area").innerHTML = "VALOR ERRONI";
        document.getElementById("longitud").innerHTML = "VALOR ERRONI";
    } else {
        document.getElementById("area").innerHTML = area.toFixed(4);
        document.getElementById("longitud").innerHTML = longitud.toFixed(4);
    }
}

//Ejercicio 05
window.onload = function cambiarColor() {
    
    let paragraf = document.getElementById("paragraf");

    paragraf.onmouseover = function() {paragraf.style.color = "blue";}  
    paragraf.onmouseout = function() {paragraf.style.color = "red";}  
}