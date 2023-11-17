window.onload = function diaSetmana() {
    
  let days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
  let date = new Date();
  let diaSetmana = document.getElementById("diaSetmana");
  let dayName = days[date.getDay()];

  diaSetmana.innerHTML = dayName;
}