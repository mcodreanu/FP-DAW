window.onload = function dateNow() {
    let date = new Date();
    let res = document.getElementById("date");

    let day = date.getDay();
    let month = date.getMonth();
    let hour = date.getHours();
    let minutes = date.getMinutes();

    switch (day) {
        case 0:
            day = "domingo";
            break;
        case 1:
            day = "lunes";
            break;
        case 2:
            day = "martes";
            break;
        case 3:
            day = "miercoles";
            break;
        case 4:
            day = "jueves";
            break;
        case 5:
            day = "viernes";
            break;
        case 6:
            day = "sabado";
            break;
        default:
            break;
    }

    switch (month) {
        case 0:
            month = "enero";
            break;
        case 1:
            month = "febrero";
            break;
        case 2:
            month = "marzo";
            break;
        case 3:
            month = "abril";
            break;
        case 4:
            month = "mayo";
            break;
        case 5:
            month = "junio";
            break;
        case 6:
            month = "julio";
            break;
        case 7:
            month = "agosto";
            break;
        case 8:
            month = "setiembre";
            break;
        case 9:
            month = "octubre";
            break;
        case 10:
            month = "noviembre";
            break;
        case 11:
            month = "diciembre";
            break;
        default:
            break;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    res.innerHTML = "Hoy es " + day + ", " + date.getDate() + " de " + month + " de " + date.getFullYear() + "<br>Son las " + hour + ":" + minutes;
}