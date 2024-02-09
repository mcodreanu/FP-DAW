var firstsec = document.getElementById('f');
var secondsec = document.getElementById('s');
var lastScrollTop = 0;
window.onscroll = function(){
   var st = window.pageYOffset || document.documentElement.scrollTop; 
   if (st > lastScrollTop){
      secondsec.scrollIntoView({behavior: "smooth"});
   } else {
      firstsec.scrollIntoView({behavior: "smooth"});
   }
   lastScrollTop = st <= 0 ? 0 : st; 
} 

document.querySelector('i').addEventListener('click', function() {
    document.querySelector('.menu').classList.toggle('expand');
    document.querySelector('h1').classList.toggle('text-expand');
    document.querySelector('ul').classList.toggle('text-expand');
});