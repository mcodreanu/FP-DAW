window.onload = function randomImg() {

  let arrayImg = ["img1.jpg", "img2.jpg", "img3.jpg"];
  let randomImg = Math.floor(Math.random() * arrayImg.length);
  let img = document.getElementById("img");

  img.src = "img/" + arrayImg[randomImg];
}