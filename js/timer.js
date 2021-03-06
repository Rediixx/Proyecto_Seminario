const el = document.querySelector(".clock");
const bell = document.querySelector("audio");

const mindiv = document.querySelector(".mins");
const secdiv = document.querySelector(".secs");

const startBtn = document.querySelector(".start");
localStorage.setItem("btn", "focus");

const sessionTime = document.querySelector(".sessionTime");
const timeLeft = document.querySelector(".timeLeft");

let initial, totalsecs, perc, paused, mins, seconds, counter1, counter2, timeLeftNumber;

counter1 = 0;
counter2 = 0;
timeLeftNumber = parseInt(document.querySelector(".timeLeft").innerText.replace(/\D/g, ""));

startBtn.addEventListener("click", () => {

  let btn = localStorage.getItem("btn");

  if (btn === "focus") {
    mins = +localStorage.getItem("focusTime") || 1;
  } else {
    mins = +localStorage.getItem("breakTime") || 1;
  }

  seconds = mins * 60;
  totalsecs = mins * 60;
  setTimeout(decremenT(), 60);
  startBtn.style.transform = "scale(0)";
  paused = false;
  
});

function decremenT() {

  mindiv.textContent = Math.floor(seconds / 60);
  secdiv.textContent = seconds % 60 > 9 ? seconds % 60 : `0${seconds % 60}`;
  sessionTime.textContent = "Tiempo en sesion: " +counter2 +":" +String(counter1).padStart(2, '0');
  timeLeft.textContent = "Tiempo restante: " +timeLeftNumber +" minutos";
  
  if (circle.classList.contains("danger")) {
    circle.classList.remove("danger");
  }

  if (seconds > 0) {
    perc = Math.ceil(((totalsecs - seconds) / totalsecs) * 100);
    setProgress(perc);
    seconds--;
    counter1++;
    if (counter1 == 60) {
      counter1 = 0;
      counter2++;
      timeLeftNumber--;
    }
    initial = window.setTimeout("decremenT()", 1000);
    if (seconds < 10) {
      circle.classList.add("danger");
    }
  } else {
    mins = 0;
    seconds = 0;
    bell.play();
    let btn = localStorage.getItem("btn");

    if (btn === "focus") {
      startBtn.textContent = "start break";
      startBtn.classList.add("break");
      localStorage.setItem("btn", "break");
    } else {
      startBtn.classList.remove("break");
      startBtn.textContent = "start focus";
      localStorage.setItem("btn", "focus");
    }
    
    startBtn.style.transform = "scale(1)";
  }

}