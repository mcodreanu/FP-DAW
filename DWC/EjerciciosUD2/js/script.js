//Ejercicio 01
function abrirSobre(){
    let img = document.getElementById('sobre');

    img.src = 'img/sobre-abierto.png'; 
    img.setAttribute("onclick", "cerrarSobre()");   
}

function cerrarSobre(){
    let img = document.getElementById('sobre');

    img.src = 'img/sobre-cerrado.png';
    img.setAttribute("onclick", "abrirSobre()"); 
}