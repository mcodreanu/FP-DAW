let numero = prompt('Dame un número entre el 1 y el 10');

if (numero < 1 || numero > 10) {
    numero = prompt('Dame un número entre el 1 y el 10');
} else {
    if (numAleatorio(numero)) {
        document.write("¡Enhorabuena, has acertado!");
    } else {
        document.write("Lo sentimos, NO has acertado.")
    }
}

function numAleatorio(numero) {
    let numRandom = Math.floor(Math.random() * (10 - 1 + 1)) + 1;
    
    if (numRandom === numero) {
        return true;
    } else {
        return false;
    }
}