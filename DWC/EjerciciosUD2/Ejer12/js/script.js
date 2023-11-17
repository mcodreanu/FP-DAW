window.onload = function fechaActual() {
    
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