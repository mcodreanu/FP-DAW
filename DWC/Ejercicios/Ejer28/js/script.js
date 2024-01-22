function validarExamen() {
  let respuesta1 = document.getElementById("pregunta1").value;
  let respuesta2 = document.getElementById("pregunta2").value;
  let respuesta3 = document.getElementById("pregunta3").value;
  let respuesta4 = document.getElementById("pregunta4").value;
  let res = document.getElementById("res");
  let respuestasValidas = 0;

  if (respuesta1 == "yellow") {
    respuestasValidas++;
  }
  if (respuesta2  == "cat") {
    respuestasValidas++;
  }
  if (respuesta3  == "window") {
    respuestasValidas++;
  }
  if (respuesta4  == "man") {
    respuestasValidas++;
  }

  res.innerHTML = "Tens un " + respuestasValidas + " sobre 4";
}