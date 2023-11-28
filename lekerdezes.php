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

<body>

    <div class="container">
      <form>
        <h1>Hulladékrendszer</h1>
        <div class="form-group">
          <label for="datum">Dátum:</label>
          <input type="text" id="datum" name="datum" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="igeny">Igény napja:</label>
          <input type="text" id="igeny" name="igeny" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="szolgaltatas">Szolgáltatás típusa:</label>
          <input type="text" id="szolgaltatas" name="szolgaltatas" class="form-control">
        </div>
        
        <button onclick="keres()" class="btn btn-secondary my-2">Keresés</button>
        <div id="eredmeny"></div>
      </form>
    </div>

    <script>
        function keres() {
            var datum = document.getElementById('datum').value;
            var igeny = document.getElementById('igeny').value;
            var szolgaltatas = document.getElementById('szolgaltatas').value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('eredmeny').innerHTML = this.responseText;
                }
            };

            xhr.open('GET', 'Sources/lekerdezes-process.php?datum=' + datum + '&igeny=' + igeny + '&szolgaltatas=' + szolgaltatas, true);
            xhr.send();
        }
    </script>

</body>
</html>
