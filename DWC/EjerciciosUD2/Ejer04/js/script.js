function calcularAreaYLongitud() {
    
    let radi = document.getElementById("radi").value;
    
    let area = Math.PI * Math.pow(radi, 2);
    let longitud = 2 * Math.PI * radi;

    if (isNaN(radi)) {
        document.getElementById("area").innerHTML = "VALOR ERRONI";
        document.getElementById("longitud").innerHTML = "VALOR ERRONI";
    } else {
        document.getElementById("area").innerHTML = area.toFixed(4);
        document.getElementById("longitud").innerHTML = longitud.toFixed(4);
    }
}