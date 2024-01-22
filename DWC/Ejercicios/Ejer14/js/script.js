window.onload = function setFecha2() {
    
  let newDate = new Date();
  let dateObject = document.getElementById("dateObject2");
  let dateFormat1 = document.getElementById("dateFormat1");
  let dateFormat2 = document.getElementById("dateFormat2");
  let dateFormat3 = document.getElementById("dateFormat3");

  newDate.setDate(21);
  newDate.setMonth(2);
  newDate.setFullYear(2009);
  newDate.setHours(12);
  newDate.setMinutes(15);
  newDate.setSeconds(0);

  dateObject.innerHTML = newDate;

  newDate.setDate(newDate.getDate() + 3);

  dateFormat1.innerHTML = newDate;

  newDate.setMonth(newDate.getMonth() + 5);

  dateFormat2.innerHTML = newDate;

  newDate.setFullYear(newDate.getFullYear() - 10);

  dateFormat3.innerHTML = newDate;
}