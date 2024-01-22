window.onload = function juegoDado(){
    let img1 = document.getElementById("img-dado1");
    let img2 = document.getElementById("img-dado2");
    let numRandom1 = Math.floor((Math.random() * (6 - 1 + 1) + 1));
    let numRandom2 = Math.floor((Math.random() * (6 - 1 + 1) + 1));

    document.getElementById("img-dado1").src = "img/" + numRandom1 + ".svg";
    document.getElementById("img-dado2").src = "img/" + numRandom2 + ".svg";

    if (numRandom1 > numRandom2) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 1";
    } else if (numRandom2 > numRandom1) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 2";
    } else {
        document.getElementById("ganador").innerHTML = "Empate";
    }
}