function basico() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("basico");

    res.innerHTML = "Basico: " + datos[0].innerHTML;
    console.log(datos.innerHTML);
}

function info() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("info");

    res.innerHTML = "Info: " + datos[0].innerHTML;
}

function contacto() {
    let res = document.getElementById("res");

    let datos = document.getElementsByClassName("contacto");

    res.innerHTML = "Contacto: " + datos[0].innerHTML;
}