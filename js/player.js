var player = document.getElementById("player");
let progress = document.getElementById("progress");
let playbtn = document.getElementById("playbtn");

var playpause = function () {
  if (player.paused) {
    player.play();
  } else {
    player.pause();
  }
}

playbtn.addEventListener("click", playpause);

player.onplay = function () {
  playbtn.classList.remove("fa-play");
  playbtn.classList.add("fa-pause");
}

player.onpause = function () {
  playbtn.classList.add("fa-play");
  playbtn.classList.remove("fa-pause");
}

player.ontimeupdate = function () {
  let ct = player.currentTime;
  current.innerHTML = timeFormat(ct);
  //progress
  let duration = player.duration;
  prog = Math.floor((ct * 100) / duration);
  progress.style.setProperty("--progress", prog + "%");
}

function timeFormat(ct) {
  minutes = Math.floor(ct / 60);
  seconds = Math.floor(ct % 60);

  if (seconds < 10) {
    seconds = "0"+seconds;
  }

  return minutes + ":" + seconds;
}
let progressBar = document.getElementById("progress-bar");

progressBar.addEventListener("click", function(e) {
    const clickX = e.pageX - this.getBoundingClientRect().left; // Отримати позицію кліка відносно прогрес-бару
    const totalWidth = this.clientWidth; // Отримати загальну ширину прогрес-бару
    const clickPercentage = (clickX / totalWidth); // Визначити відсоток для переміщення

    player.currentTime = clickPercentage * player.duration; // Встановити новий час пісні
});
