function calcularEdad() {
    
  let date = new Date("1984/01/07");
  let month_diff = Date.now() - date.getTime();
  let age_dt = new Date(month_diff);
  let year = age_dt.getUTCFullYear();
  let age = Math.abs(year - 1970);

  document.getElementById("edad").innerHTML = "Edad: " + age;
}