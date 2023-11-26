<?php require_once('../public/session.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Szélerőművek</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css" />
  </head>
  <body
    style="
      background-image: url('../public/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    "
  >

  <?php require_once('../public/navbar.php') ?>
    <br>
    <div class="homeContainer">

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

    <div class="homeButtons">
      <a href="newsView.html">
        <button id="homeClick">
          Szállítások
          <img id="buttonImage" src="../public/images/collectionIcon.png" />
        </button>
      </a>
    </div>

    <div class="homeButtons">
      <a href="newsView.html">
        <button id="homeClick">
          Importálás
          <img id="buttonImage" src="../public/images/importIcon.png" />
        </button>
      </a>
    </div>

    <!--Footer-->

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
