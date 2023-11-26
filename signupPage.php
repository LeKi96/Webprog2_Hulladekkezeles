<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Regisztráció</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css" />
  </head>
  <body
    style="
      background-image: url('../public/images/background.jpg');
      background-size: cover;
    "
  >
    <!--Nav Bar-->
    <?php require_once('../public/navbar.php') ?>

    <h2 id="HeadLine">REGISZTRÁCIÓ</h2>

    <div id="divs">
      <form
        action="index.php?action=register"
        method="POST"
        id="sign-up-form"
        onsubmit="return validateForm()">
        <label id="signupLN">Vezetéknév:</label> <br />
        <input type="text" name="lastName" required /><br />
        <label id="signupFN">Keresztnév:</label> <br />
        <input type="text" name="firstName" required /><br />
        <label id="signupUN">Felhasználónév:</label><br />
        <input type="text" name="username" required /><br />
        <label id="signupPwd">Jelszó (legalább 10 karakter):</label><br />
        <input type="password" name="password" required /><br />
        <button id="signupSubmit" type="submit">Regisztráció</button>
      </form>
    </div>
  </body>
</html>