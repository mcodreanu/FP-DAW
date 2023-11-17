function toOctal() {
    
  let decimal = parseInt(document.getElementById("decimal").value);
  let octal = document.getElementById("octal");

  if (!isNaN(decimal)) {
    octal.innerHTML = decimal.toString(8);
  } else {
    octal.innerHTML = "Tienes que escribier un número";
  }
}