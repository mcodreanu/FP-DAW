function cortarCadenaMitad() {
    
  let txt = document.getElementById("txt").innerText;

  let valor = txt.length/2;

  document.getElementById("txt-res").innerHTML = txt.slice(0, valor) + "<br><br>" + txt.slice(valor);
}