var addFunctionOnWindowLoad = function(callback){
  if(window.addEventListener){
      window.addEventListener('load',callback,false);
  }else{
      window.attachEvent('onload',callback);
  }
}

addFunctionOnWindowLoad(cambiarColor);
addFunctionOnWindowLoad(fechaActual);
addFunctionOnWindowLoad(setFecha);
addFunctionOnWindowLoad(setFecha2);
addFunctionOnWindowLoad(diaSetmana);
addFunctionOnWindowLoad(calcularTiempoEnDias);

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
function cambiarColor() {
    
    let paragraf = document.getElementById("paragraf");

    paragraf.onmouseover = function() {paragraf.style.color = "blue";}  
    paragraf.onmouseout = function() {paragraf.style.color = "red";}  
}

//Ejercicio 06
function splitEmail() {
    
  let email = document.getElementById("email").value;
  let usuari = document.getElementById("usuari");
  let domini = document.getElementById("domini");

  let datos = email.split("@");
  
  usuari.innerHTML = datos[0];
  domini.innerHTML = datos[1];
}

//Ejercicio 07
function splitEmail_2() {
    
  let email = document.getElementById("email-2").value;
  let usuari = document.getElementById("usuari-2");
  let domini = document.getElementById("domini-2");

  let posicion_separador = email.indexOf("@");

  datos_usuari = email.slice(0, posicion_separador);

  datos_domini = email.slice(posicion_separador + 1);
  
  usuari.innerHTML = datos_usuari;
  domini.innerHTML = datos_domini;
}

//Ejercicio 08
function cortarCadenaMitad() {
    
  let txt = document.getElementById("txt").innerText;

  let valor = txt.length/2;

  document.getElementById("txt-res").innerHTML = txt.slice(0, valor) + "<br><br>" + txt.slice(valor);
}

//Ejercicio 09
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

//Ejercicio 10
function toOctal() {
    
  let decimal = parseInt(document.getElementById("decimal").value);
  let octal = document.getElementById("octal");

  if (!isNaN(decimal)) {
    octal.innerHTML = decimal.toString(8);
  } else {
    octal.innerHTML = "Tienes que escribier un número";
  }
}

//Ejercicio 11
function tirarDau() {
    
  let caras = document.getElementById("caras").value;
  let dau = Math.floor((Math.random() * caras) + 1);

  document.getElementById("dau").innerHTML = dau;
}

//Ejercicio 12
function fechaActual() {
    
  let date = new Date();
  let dateRes = document.getElementById("dateRes");

  let day = date.getDate();
  let month = date.getMonth() + 1;
  let year = date.getFullYear();
  let hours = date.getHours();
  let minutes = date.getMinutes();

  if (day < 10) {
    day = "0" + date.getDate(); 
  }

  if (month < 10) {
    month = "0" + (date.getMonth() + 1);
  }

  if (hours < 10) {
    hours = "0" + date.getHours();
  }

  if (minutes < 10) {
    minutes = "0" + date.getMinutes();
  }

  dateRes.innerHTML = day + "-" + month + "-" + year + " " + hours + ":" + minutes;
}

//Ejercicio 13
function setFecha() {
    
  let newDate = new Date();
  let dateObject = document.getElementById("dateObject");
  let dateFormat = document.getElementById("dateFormat");

  newDate.setDate(21);
  newDate.setMonth(2);
  newDate.setFullYear(2009);
  newDate.setHours(12);
  newDate.setMinutes(15);
  newDate.setSeconds(0);

  dateObject.innerHTML = newDate;

  let dayFormat = newDate.getDate();
  let monthFormat = newDate.getMonth() + 1;
  let yearFormat = newDate.getFullYear();
  let hoursFormat = newDate.getHours();
  let minutesFormat = newDate.getMinutes();

  dateFormat.innerHTML = dayFormat + "/0" + monthFormat + "/" + yearFormat + " " + hoursFormat + ":" + minutesFormat;
}

//Ejercicio 14
function setFecha2() {
    
  let newDate = new Date();
  let dateObject = document.getElementById("dateObject2");
  let dateFormat1 = document.getElementById("dateFormat1");
  let dateFormat2 = document.getElementById("dateFormat2");
  let dateFormat3 = document.getElementById("dateFormat3");

  newDate.setDate(21);
  newDate.setMonth(2);
  newDate.setFullYear(2009);
  newDate.setHours(12);
  newDate.setMinutes(15);
  newDate.setSeconds(0);

  dateObject.innerHTML = newDate;

  newDate.setDate(newDate.getDate() + 3);

  dateFormat1.innerHTML = newDate;

  newDate.setMonth(newDate.getMonth() + 5);

  dateFormat2.innerHTML = newDate;

  newDate.setFullYear(newDate.getFullYear() - 10);

  dateFormat3.innerHTML = newDate;
}

//Ejercicio 15
function diaSetmana() {
    
  let days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
  let date = new Date();
  let diaSetmana = document.getElementById("diaSetmana");
  let dayName = days[date.getDay()];

  diaSetmana.innerHTML = dayName;
}

//Ejercicio 16
function calcularTiempoEnDias() {
    
  let date1 = new Date("2015/01/01 01:00:01");
  let date2 = new Date("2015/02/14 02:05:23");
  let diferencia = date2.getTime() - date1.getTime();
  let difDias = Math.trunc(diferencia / (1000 * 60 * 60 * 24));
  let difHoras = Math.trunc(diferencia / (1000 * 60 * 60));

  let resTiempo = document.getElementById("resTiempo");

  resTiempo.innerHTML = "Entre la data " + date1.getTime() + " i la data " + date2 + " hi ha: " + difDias + "d:" + difHoras;
}