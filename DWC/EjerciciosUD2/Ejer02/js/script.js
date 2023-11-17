function inInterval() {
    
    let num = document.getElementById("num").value;
    
    let res;

    if (isNaN(num) || num < -1 || num > 1) {
      res = "Valor erroni";
    } else {
      res = "Valor correcte";
    }

    document.getElementById("text").innerHTML = res;
}