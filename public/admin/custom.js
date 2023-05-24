$(document).ready(function () {
    textime();
    updateClock();
});
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    var amPm = hours < 12 ? " AM" : " PM";

    hours = hours % 12;
    hours = hours ? hours : 12;
    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    var timeString = hours + ":" + minutes + amPm;
    document.getElementById("clock").innerHTML = timeString;
}

setInterval(updateClock, 1000);

function number(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
}

function textime() {
    var time = new Date().getHours();
    var message;

    if (time >= 5 && time < 11) {
        message = 'Good Morning';
    } else if (time >= 11 && time < 17) {
        message = 'Good Afternoon';
    } else {
        message = 'Good Night';
    }
    document.getElementById("texttime").innerHTML = message;

}

setInterval(textime, 120000);