<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pomodoro</title>
    <link rel="stylesheet" href="css/pomodoro.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <h1>Pomodro ⏲ con 🛎</h1>

    <figure class="clock">
      <div class="mins">0</div>
      <div>:</div>
      <div class="secs">00</div>
      <audio
        src="http://soundbible.com/mp3/service-bell_daniel_simion.mp3"
      ></audio>
      <svg class="progress-ring" height="120" width="120">
        <circle
          class="progress-ring__circle"
          stroke-width="8"
          fill="transparent"
          r="50"
          cx="60"
          cy="60"
        />
      </svg>
    </figure>

    <div class="btn-group">
      <button class="start">Comenzar</button>
      <button class="reset">Reiniciar</button>
      <button class="pause">Pausar</button>
      <button class="return" onclick="window.location.href='add.php';">Regresar</button>
    </div>

    <form action=".">
      <label for="focusTime">Tiempo de Concentracion</label>
      <input type="number" value="1" id="focusTime" />
      <label for="breakTime">Tiempo de Descanso</label>
      <input type="number" value="1" id="breakTime" />
      <button type="submit">Guardar ajustes</button>
    </form>

    <script src="js/settings.js"></script>
    <script src="js/timer.js"></script>
    <script src="js/progress.js"></script>

    <script>
      var url = document.URL;
      var id = url.substring(url.lastIndexOf('=') + 1);

      const startBtn2 = document.querySelector(".start");

      startBtn2.addEventListener("click", () => {
        var estimatedHours = localStorage.getItem("focusTime") * 60;
        UpdateRecord(id, estimatedHours);
      });

      function UpdateRecord(id, estimatedHours)
      {
          jQuery.ajax({
          type: "POST",
          url: "includes/updateTime.php",
          data: {
            id: id,
            estimatedHours: estimatedHours
          },
          cache: false,
        });
      }
    </script>
  </body>
</html>
