function basico() {
    let res = document.getElementById("res");

    let datos = document.querySelectorAll(".basico").values;

    res.innerHTML = "Basico: " + datos[0];
}