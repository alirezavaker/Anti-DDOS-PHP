let time = new Date();
let t = time.getFullYear();
document.getElementById("year").innerHTML = t;
// timer
document.getElementById("timeredirect").innerHTML = 5;
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}
// redirect user

// آدرس صفحه ای که میخواهید به آن هدایت شود را اینجا وارد کنید.
let indexPage = "/index.php";
function redirectPage() {
  setInterval(() => {
    window.location = indexPage;
  }, 5000);
}
redirectPage();
