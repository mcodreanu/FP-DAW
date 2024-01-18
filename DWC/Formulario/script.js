function basico() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("basico");

    res.innerHTML = "Basico: <br>";

    for (let i = 0; i < datos.length; i++) {
        res.innerHTML += datos[i].value + "<br>";
    }
}

function academicos() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("info");

    res.innerHTML = "Academicos: <br>";

    for (let i = 0; i < datos.length; i++) {
        if (document.getElementsByClassName("info").checked)
        {
            res.innerHTML += datos[i].value + "<br>";
        }
    }
}

function contacto() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("contacto");

    res.innerHTML = "Contacto: <br>";

    for (let i = 0; i < datos.length; i++) {
        res.innerHTML += datos[i].value + "<br>";
    }
}