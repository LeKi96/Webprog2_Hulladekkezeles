<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Regisztráció</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
  </head>
  <body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;

    "
    >
    <!--Nav Bar-->
    <?php require_once('Sources/navbar.php') ?>
    <br>
    <h2 id="HeadLine">REGISZTRÁCIÓ</h2>

    <div id="divs">
      <form
        action="process-sign-up.php"
        method="POST"
        id="sign-up-form"
        onsubmit="return validateForm()">
        <label id="signupUN">Felhasználónév:</label><br />
        <input type="text" name="username" required /><br />
        <label id="signupPwd">Jelszó (legalább 10 karakter):</label><br />
        <input type="password" name="password" required /><br />
        <button id="signupSubmit" type="submit">Regisztráció</button>
      </form>
    </div>
  </body>
</html>