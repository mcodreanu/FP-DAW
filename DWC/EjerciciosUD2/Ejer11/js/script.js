function tirarDau() {
    
  let caras = document.getElementById("caras").value;
  let dau = Math.floor((Math.random() * caras) + 1);

  document.getElementById("dau").innerHTML = dau;
}