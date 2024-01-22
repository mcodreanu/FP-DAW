window.onload = function setFecha() {
    
  let newDate = new Date();
  let dateObject = document.getElementById("dateObject");
  let dateFormat = document.getElementById("dateFormat");

  newDate.setDate(21);
  newDate.setMonth(2);
  newDate.setFullYear(2009);
  newDate.setHours(12);
  newDate.setMinutes(15);
  newDate.setSeconds(0);

  dateObject.innerHTML = newDate;

  let dayFormat = newDate.getDate();
  let monthFormat = newDate.getMonth() + 1;
  let yearFormat = newDate.getFullYear();
  let hoursFormat = newDate.getHours();
  let minutesFormat = newDate.getMinutes();

  dateFormat.innerHTML = dayFormat + "/0" + monthFormat + "/" + yearFormat + " " + hoursFormat + ":" + minutesFormat;
}