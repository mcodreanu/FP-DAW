function calcularDataMajor() {
    
  let date1 = new Date(document.getElementById("date1").value);
  let date2 = new Date(document.getElementById("date2").value);
  
  if (date1 > date2){
    document.getElementById("dataMajor").innerHTML = date1.getDate() + "/" + (date1.getMonth() + 1) + "/" + date1.getFullYear();
  } else {
    document.getElementById("dataMajor").innerHTML = date2.getDate() + "/" + (date2.getMonth() + 1) + "/" + date2.getFullYear();
  }
}