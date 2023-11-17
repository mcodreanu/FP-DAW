function esPalindromo() {

  let src = document.getElementById("src").value;
  let lowRegStr = src.toLowerCase().replace(/[\W_]/g, '');
  let reverseStr = lowRegStr.split('').reverse().join(''); 
  
  if (reverseStr === lowRegStr) {
    document.getElementById("resPalindromo").innerHTML = "Es palindromo.";
  } else {
    document.getElementById("resPalindromo").innerHTML = "No es palindromo.";
  }
}