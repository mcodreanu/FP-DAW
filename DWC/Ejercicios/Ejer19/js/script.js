window.onload = function inspectArray() {
   
    let valors = [true, 5, false, "hola", "Adios", 2];
    let text = [];
    let suma = 0;

    for (let i = 0; i < valors.length; i++) {
      if (typeof valors[i] === "string"){
        text.push(valors[i]);
      } else if (typeof valors[i] === "number"){
        suma += valors[i];
      }
    }

    let palabra = text.sort(function (a, b) {
      return b.length - a.length;
    })[0];

    document.getElementById("textLlarg").innerHTML = "Palabra: " + palabra;
    document.getElementById("sumaNums").innerHTML = "Suma: " + suma;
}