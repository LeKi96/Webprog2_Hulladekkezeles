<?php require_once('Sources/session.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Szélerőművek</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;

    "
  >

  <?php require_once('Sources/navbar.php') ?>
    <br>
    <div class="homeContainer" style="background-color: #e3f2fd;">

      <header>
        <h1>ZöldVilág Kft.</h1>
        <p>Környezettudatos hulladékgazdálkodás a fenntartható jövőért</p>
      </header>

      <section id="about-us">
        <h2>Rólunk</h2>

        <p>
          Cégünk, a ZöldVilág Kft., az környezettudatos hulladékgazdálkodás 
          terén kínál szolgáltatásokat, és elkötelezett amellett, hogy hozzájáruljon 
          a tiszta és fenntartható jövőhöz. Tevékenységünk középpontjában a szelektívhulladék 
          elszállítása áll, és fontosnak tartjuk, hogy ügyfeleink számára kényelmes és 
          hatékony megoldásokat biztosítsunk a hulladékkezelés terén.
        </p>

        <br>

        <p>
          Miért válassza a ZöldVilág Kft.-t?
        </p>

        <br>

        <p>
          Környezetbarát megközelítés: Célunk a környezetvédelem és fenntarthatóság előmozdítása. 
          Minden elszállított hulladékot szigorúan szelektálunk, és az újrahasznosításra alkalmas 
          anyagokat újrahasznosító üzemekbe szállítjuk.
        </p>

        <p>
          Rugalmas szolgáltatások: Rugalmas elszállítási időpontokat kínálunk ügyfeleinknek, hogy azok 
          könnyen beilleszthessék mindennapi tevékenységeikbe. Elkötelezettek vagyunk amellett, hogy gyorsan 
          és hatékonyan reagáljunk az ügyfelek igényeire.
        </p>

        <p>
          Professzionális csapat: Jól képzett és tapasztalt szakembereink biztosítják, hogy a hulladék elszállítása 
          során minden folyamat zökkenőmentesen zajlik. A biztonság és a minőség kiemelt szempont számunkra.
        </p>

        <p>
          Átlátható díjszabás: Nálunk nincsenek rejtett költségek. Átlátható díjszabásunk révén biztosak lehetnek abban, 
          hogy mindig tisztában vannak a szolgáltatás árával.
        </p>

        <p>
          Innováció és fejlődés: Folyamatosan figyeljük a hulladékkezelés terén történő fejlesztéseket és innovációkat. 
          Cégünk elkötelezett az új technológiák és módszerek bevezetése mellett, hogy még hatékonyabbá tegyük szolgáltatásainkat.
        </p>

        <br>

        <p>
          Kérjük, vegye fel velünk a kapcsolatot, ha bármilyen kérdése van, vagy szeretné igénybe venni szolgáltatásainkat. A ZöldVilág Kft. 
          a környezetvédelem és a minőségi szolgáltatások elkötelezett híve, és örömmel áll rendelkezésére!
        </p>
      </section>
    </div>

    <!--Footer-->

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>
