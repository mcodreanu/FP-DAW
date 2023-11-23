function jugar() {
    let jugador1 = parseInt(prompt("Jugador 1: Pedra[1], Paper[2], Tisora[3]"));
    let jugador2 = parseInt(prompt("Jugador 2: Pedra[1], Paper[2], Tisora[3]"));

    if (jugador1 === 1) {
        document.getElementById("jugador1").innerHTML = "&#129308;";
    } else if (jugador1 === 2) {
        document.getElementById("jugador1").innerHTML = "&#129306;";
    } else if (jugador1 === 3) {
        document.getElementById("jugador1").innerHTML = "&#128406;";
    } else {
        alert("Hay que introducir 1, 2 o 3");
        jugador1 = parseInt(prompt("Jugador 1: Pedra[1], Paper[2], Tisora[3]"));
    }

    if (jugador2 === 1) {
        document.getElementById("jugador2").innerHTML = "&#129307;";
    } else if (jugador2 === 2) {
        document.getElementById("jugador2").innerHTML = "&#129306;";
    } else if (jugador2 === 3) {
        document.getElementById("jugador2").innerHTML = "&#128406;";
    } else {
        alert("Hay que introducir 1, 2 o 3");
        jugador1 = parseInt(prompt("Jugador 2: Pedra[1], Paper[2], Tisora[3]"));
    }

    if (jugador1 === 1 && jugador2 === 3) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 1 && jugador1 === 3) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 2";
    } else if (jugador1 === 3 && jugador2 === 2) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 3 && jugador1 === 2) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 2";
    } else if (jugador1 === 2 && jugador2 === 1) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 2 && jugador1 === 1) {
        document.getElementById("ganador").innerHTML = "Ha guanyat el jugador 2";
    } else {
        document.getElementById("ganador").innerHTML = "Empat!";
    }
}