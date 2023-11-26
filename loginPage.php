<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bejelentkezés</title>
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
    <!--Nav Bar-->
    <?php require_once('Sources/navbar.php') ?>
    
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

        <button id="loginSubmit" type="submit">Bejelentkezés</button>
      </form>
    </div>
  </body>
</html>