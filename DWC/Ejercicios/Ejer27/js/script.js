function esMayuscula(letra) {
  return letra === letra.toUpperCase();
}

function esMinuscula(letra)
{
  return letra === letra.toLowerCase();
} 

function verificarPalabra(){
  let palabra = document.getElementById("palabra").value;
  let res = document.getElementById("res");
  let minusculas = 0;
  let mayusculas = 0;

  for(let i = 0; i < palabra.length; i++)
  {
    let letraActual = palabra.charAt(i);
    if(esMayuscula(letraActual))
    {
      mayusculas++;
    } else if(esMinuscula(letraActual))
    {
      minusculas++;
    }       
  }

  if (minusculas === 0) {
    res.innerHTML = "La palabra está formada solo por mayusculas.";
  } else if (mayusculas == 0) {
    res.innerHTML = "La palabra está formada solo por minusculas.";
  } else {
    res.innerHTML = "La palabra está formada solo por una mezcla.";
  }
}