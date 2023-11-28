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

      <div class="collectionForm">
        <form action="Sources/lekerdezes-process.php" method="post">

        <div id="startDate">
            <label for="start_date">Kezdeti dátum:</label> <br>
            <input type="text" id="start_date" name="start_date" placeholder="YYYY-MM-DD" required>
        </div>
        <div id="endDate">
            <label for="end_date">Vég dátum:</label> <br>
            <input type="text" id="end_date" name="end_date" placeholder="YYYY-MM-DD" required>
        </div>

        <div id="wasteType">
            <label for="waste_type">Hulladék típusa:</label> <br>
            <select id="waste_type" name="waste_type" required>
                <option value="1">Műanyag</option>
                <option value="2">Üveg</option>
                <option value="3">Zöld</option>
                <option value="4">Papír</option>
                <option value="5">Kommunális</option>
            </select>
        </div>

            <input id="collectionSubmit" type="submit" value="Generálás">
        </form>
    </div>

    <footer>
      <div class="footer-content">
        <p>&copy; 2023 hulladékkezelés</p>
        <ul class="footer-links">
        <li><a href="./homePage.php">Kezdőlap</a></li>
        <li ><a href="./lekerdezes.php">Lekérdezés</a></li>
        <li><a href="./restApiTest.php">Rest API teszt</a></li>
        <li><a href="./szolgaltatasok.php">Szolgáltatások kezelése</a></li>
        <li><a href="./pdfImport.php">PDF Generálás</a></li>
        </ul>
      </div>
    </footer>
</body>
</html>
