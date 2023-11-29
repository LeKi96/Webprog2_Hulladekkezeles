<?php
    $host = "mysql.omega:3306";
    $username = "hulladek";
    $password = "TesztJelszo12345";
    $dbname = "hulladek";
    $is_invalid = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $mysqli = new mysqli($host, $username, $password, $dbname);

        $sql = sprintf('SELECT * FROM felhasznalok WHERE Username = "%s"', $mysqli -> real_escape_string($_POST["username"]));

        $result = $mysqli -> query($sql);

        $user = $result -> fetch_assoc();

        if ($user) {
          if ($_POST["password"] === $user["Password"]) {
              session_start();
      
              $_SESSION["user_id"] = $user["id"];
              header('Location: homePage.php');
              exit;
          }
      }

        $is_invalid = true;
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bejelentkezés</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <div>      
      <h2 id="HeadLine">BEJELENTKEZÉS</h2>
      <?php if(isset($is_invalid) && $is_invalid): ?>
          <em>Helytelen felhasználónév és/vagy jelszó!</em>
        <?php endif; ?>
      
      <div id="divs">
        <form method="post">
          <!--Felhasználónév bevitele-->
          <label id="userLabel">Felhasználónév:</label><br />
          <input type="text" name="username" required /><br />
          <!--Jelszó bevitele-->
          <label id="pwdLabel">Jelszó:</label><br />
          <input type="password" name="password" required /><br />
          <!--"Bejelentkezés" gomb-->
          <button id="loginSubmit" class="btn btn-secondary"type="submit">Bejelentkezés</button>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>