window.onload = function cambiarColor() {
    
    let paragraf = document.getElementById("paragraf");

    paragraf.onmouseover = function() {paragraf.style.color = "blue";}  
    paragraf.onmouseout = function() {paragraf.style.color = "red";}  
}