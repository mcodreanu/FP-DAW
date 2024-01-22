function mouseclick() {
    document.getElementById("res").innerHTML = "Event: onclick";
}

function mouseover() {
    document.getElementById("res").innerHTML = "Event: onmouseover";
}

function mouseout() {
    document.getElementById("res").innerHTML = "Event: onmouseout";
}

function mouseenter() {
    document.getElementById("res").innerHTML = "Event: onmouseenter";
}

window.addEventListener("resize", function(){
    let rojo = Math.floor(Math.random() * 256);
    let azul = Math.floor(Math.random() * 256);
    let verde = Math.floor(Math.random() * 256);

    document.body.style.backgroundColor = "rgb(" + rojo + "," + verde + "," + azul + ")";
});