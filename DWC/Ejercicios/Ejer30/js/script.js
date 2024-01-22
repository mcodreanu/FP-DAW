window.onload = function randomEmoji(){
  let randomNum = Math.floor(Math.random() * (128586 - 128512 + 1) + 128512);

  document.getElementById("emoti").innerHTML = "&#" + randomNum + ";";
}