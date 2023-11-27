<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Lekérdezés</title>
  </head>
  <body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    "
  >
  <?php require_once('Sources/navbar.php') ?>

    <form>
      <div class="form-group">
        <label for="datum">Kezdő dátum:</label>
        <input type="text" id="startDatum" placeholder="Pl.: 2023.01.01 - csak 2018-as dátum" class="form-control" />
      </div>
      <div class="form-group">
        <label for="datum">Záró dátum:</label>
        <input type="text" id="closeDatum" placeholder="Pl.: 2023.01.01 - csak 2018-as dátum" class="form-control" />
      </div>

      <div class="form-group">
        <label for="hulladek">Válassz hulladék típust:</label>
        <select id="hulladek" name="hulladek" class="form-control">
          <option value="muanyag">Műanyag hulladék</option>
          <option value="uveg">Üveg hulladék</option>
          <option value="zold">Zöldhulladék</option>
          <option value="papir">Papírhulladékok</option>
          <option value="kommunalis">Kommunális hulladék</option>
        </select>
      </div>
      <button onclick="keres()" class="btn btn-secondary m-1" type="submit">Keresés</button>
    </form>
    <div id="eredmeny"></div>
    <body>
      <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"
      ></script>
      <script>
        function keres() {
          // Felhasználótól származó adatok lekérése
          var datum = $('#datum').val();
          var mennyiseg = $('#mennyiseg').val();
          var tipus = $('#tipus').val();

          // Ajax kérés küldése
          $.ajax({
            type: 'GET', // Vagy "GET" az adatok lekérése esetén
            url: 'lekerdezes_process.php', // Az ajax_handler.php fájlban kell implementálni a lekérést
            data: {
              datum: datum,
              mennyiseg: mennyiseg,
              tipus: tipus,
            },
            success: function (data) {
              // Sikeres válasz esetén az eredmény megjelenítése
              $('#eredmeny').html(data);
            },
            error: function (xhr, status, error) {
              // Hiba esetén hibaüzenet megjelenítése
              console.error('Hiba: ' + error);
            },
          });
        }
      </script>
    </body>
  </body>
</html>
