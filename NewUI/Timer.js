
let timer;
let timeLeft;
let timerDisplay = document.getElementById("timerDisplay");
let startBtn = document.getElementById("startBtn");
let stopBtn = document.getElementById("stopBtn");

function onTimerComplete() {
    timerDisplay.textContent = "0";
}

function startTimer() {
    const durationInput = document.getElementById("duration").value;
    timeLeft = parseInt(durationInput);

    clearInterval(timer);

    timer = setInterval(() => {
        if (timeLeft > 0) {
            timerDisplay.textContent = `${timeLeft}`;
            timeLeft--;
        } else {
            clearInterval(timer);
            onTimerComplete();
        }
    }, 1000);
}

function stopCounter() {
    clearInterval(timer);
    timerDisplay.textContent = "0";
}

startBtn.addEventListener("click", startTimer);
stopBtn.addEventListener("click", stopCounter);
