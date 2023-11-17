function splitEmail() {
    
  let email = document.getElementById("email").value;
  let usuari = document.getElementById("usuari");
  let domini = document.getElementById("domini");

  let datos = email.split("@");
  
  usuari.innerHTML = datos[0];
  domini.innerHTML = datos[1];
}