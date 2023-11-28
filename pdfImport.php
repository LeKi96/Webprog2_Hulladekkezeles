<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generálás</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
</head>
<body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    "
  >

  <?php require_once('Sources/navbar.php') ?>

    <br>
    <h1>Lekérdezés</h1>

    <div class="collectionForm">
        <form action="Sources/generatePdf.php" method="post">

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
        <p>&copy; 2023 Szélerőművek</p>
        <ul class="footer-links">
          <li><a href="homeView.php">Kezdőlap</a></li>
          <li><a href="collectionView.php">Hírek</a></li>
        </ul>
      </div>
    </footer>

</body>
</html>