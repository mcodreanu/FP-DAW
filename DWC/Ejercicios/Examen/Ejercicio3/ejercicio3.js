window.onload = function randomBolas() {
    let res1 = document.getElementById("res1");
    let randomNum = 0;
    let randomBolas = Math.floor(Math.random()*(15 - 5 + 1)) + 5;
    let arrayBolas = [];

    for (let cont = 0; cont < randomBolas; cont++) {
        randomNum = Math.floor(Math.random()*(10111 - 10102 + 1)) + 10102;

        arrayBolas.push("&#" + randomNum + ";");
    }
    
    for (let pos = 0; pos < arrayBolas.length; pos++) {
        res1.innerHTML += arrayBolas[pos];
    }

    let bolasUnicas = arrayBolas.filter((elemento, index) => {
        return arrayBolas.indexOf(elemento) === index;
    });

    for (let pos = 0; pos < bolasUnicas.length; pos++) {
        res2.innerHTML += bolasUnicas[pos];
    }
}