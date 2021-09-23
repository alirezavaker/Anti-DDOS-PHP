// آدرس صفحه ای که میخواهید به آن هدایت شود را اینجا وارد کنید.
const indexPage = window.location.href;
const beforPage = "http://localhost/anti-ddos.php";
function redirectPage() {
  if (window.location.href == indexPage) {
    setInterval(() => {
      window.location = beforPage;
    }, 10000);
  } else {
  }
}
//timer

let minutesLabel = document.getElementById("minutes");
let secondsLabel = document.getElementById("seconds");
let totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
  let valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}
