<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lekérdezés</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="Sources/script.js"></script>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
</head>
<body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    "
  >

  <?php require_once('Sources/navbar.php') ?>

<br>
    <header>
        <h1>Lekérdezés</h1>
    </header>


<div class="collectionForm">
    <form id="collectionForm" action="Sources/lekerdezes-process.php" method="post">

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

        <input id="collectionSubmit" type="button" value="Generálás" onclick="generateReport()">
    </form>
</div>

<div id="resultContainer">
        <!-- Az eredmény itt jelenik meg AJAX hívás után -->
    </div>


    <footer>
  <div class="footer-content">
    <p>&copy; 2023 hulladékkezelés</p>
    <ul class="footer-links">
      <li><a href="./homePage.php">Kezdőlap</a></li>
      <?php if(isset($_SESSION["user_id"])): ?>
        <li><a href="./lekerdezes.php">Lekérdezés</a></li>
        <li><a href="./restApiTest.php">Rest API teszt</a></li>
        <li><a href="./szolgaltatasok.php">Szolgáltatások kezelése</a></li>
        <li><a href="./pdfImport.php">PDF Generálás</a></li>
        <?php if($user["Privilages"] == 1): ?>
          <li><a href="./admin.php">Felhasználók kezelése</a></li>
        <?php endif; ?>
      <?php else: ?>
        <!-- Display only the "Kezdőlap" link for visitors -->
        <li><a href="./homePage.php">Kezdőlap</a></li>
      <?php endif; ?>
    </ul>
  </div>
</footer>

</body>
</html>