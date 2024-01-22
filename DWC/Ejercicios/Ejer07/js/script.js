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