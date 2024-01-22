function jugar() {
    let jugador1 = parseInt(prompt("Jugador 1: Pedra[1], Paper[2], Tisora[3]"));
    let jugador2 = parseInt(prompt("Jugador 2: Pedra[1], Paper[2], Tisora[3]"));
    let imgJugador1 = document.getElementById("jugador1");
    let imgJugador2 = document.getElementById("jugador2");
    let ganador = document.getElementById("ganador");

    if (isNaN(jugador1) || isNaN(jugador2)) {
        alert("Hay que introducir 1, 2 o 3");
        jugador1 = parseInt(prompt("Jugador 1: Pedra[1], Paper[2], Tisora[3]"));
        jugador2 = parseInt(prompt("Jugador 2: Pedra[1], Paper[2], Tisora[3]"));
    }

    if (jugador1 === 1) {
        imgJugador1.innerHTML = "&#129308;";
    } else if (jugador1 === 2) {
        imgJugador1.innerHTML = "&#129306;";
    } else if (jugador1 === 3) {
        imgJugador1.innerHTML = "&#128406;";
    }

    if (jugador2 === 1) {
        imgJugador2.innerHTML = "&#129307;";
    } else if (jugador2 === 2) {
        imgJugador2.innerHTML = "&#129306;";
    } else if (jugador2 === 3) {
        imgJugador2.innerHTML = "&#128406;";
    }

    if (jugador1 === 1 && jugador2 === 3) {
        ganador.innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 1 && jugador1 === 3) {
        ganador.innerHTML = "Ha guanyat el jugador 2";
    } else if (jugador1 === 3 && jugador2 === 2) {
        ganador.innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 3 && jugador1 === 2) {
        ganador.innerHTML = "Ha guanyat el jugador 2";
    } else if (jugador1 === 2 && jugador2 === 1) {
        ganador.innerHTML = "Ha guanyat el jugador 1";
    } else if (jugador2 === 2 && jugador1 === 1) {
        ganador.innerHTML = "Ha guanyat el jugador 2";
    } else {
        ganador.innerHTML = "Empat!";
    }
}