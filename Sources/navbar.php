<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="./homePage.php">ZöldVilág</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./homePage.php">Kezdőlap</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./lekerdezes.php">Lekérdezés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./restApiTest.php">Rest API teszt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./szolgaltatasok.php">Szolgáltatások kezelése</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pdfImport.php">PDF Generálás</a>
        </li>
      </ul>
    </div>
    <?php if(isset($_SESSION["user_id"])): ?>
      <button class="btn" id="login-button">
        <a class="nav-link navbar-btn" aria-current="page" href="./Sources/logout.php">Kijelentkezés</a>
      </button>
    <?php else: ?>
      <button class="btn" id="login-button">
        <a class="nav-link navbar-btn" aria-current="page" href="./loginPage.php">Bejelentkezés</a>
      </button>
    <?php endif; ?>

    <button class="btn" id="signup-button">
      <a class="nav-link navbar-btn" aria-current="page" href="./signupPage.php">Regisztráció</a>
    </button>
  </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="./main.js"></script>
</body>
</html>


