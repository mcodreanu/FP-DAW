window.onload = function calcularTiempoEnDias() {
    
  let date1 = new Date("2015/01/01 01:00:01");
  let date2 = new Date("2015/02/14 02:05:23");
  
  let diferencia = date2.getTime() - date1.getTime();
  let difSegundos = date2.getSeconds() - date1.getSeconds();
  let difMinutos = date2.getMinutes() - date1.getMinutes();
  let difHoras = date2.getHours() - date1.getHours(); 
  let difDias = Math.trunc(diferencia / (1000 * 60 * 60 * 24));

  let resTiempo = document.getElementById("resTiempo");

  resTiempo.innerHTML = "Entre la data " + date1 + " i la data " + date2 + " hi ha: " + difDias + "d:" + difHoras + "h:" + difMinutos + "m:" + difSegundos + "s";
}