document.addEventListener("DOMContentLoaded", function () {
  const jsonFilePath = "Sources/countriesV3.json";
  const resultContainer = document.createElement("div");
  resultContainer.id = "result-container";
  document.body.appendChild(resultContainer);

  // Függvény az adatok mentéséhez a böngésző helyi tárolásába
  function saveDataToLocalStorage(data) {
    localStorage.setItem("countriesData", JSON.stringify(data));
  }

  // Függvény az adatok betöltéséhez a böngésző helyi tárolásából
  function loadDataFromLocalStorage() {
    const storedData = localStorage.getItem("countriesData");
    return storedData ? JSON.parse(storedData) : [];
  }

  function fetchData() {
    return fetch(jsonFilePath)
      .then((response) => response.json())
      .then((data) => {
        updateCountries(data);

        // Adatok mentése csak sikeres lekérdezés esetén
        saveDataToLocalStorage(data);
      })
      .catch((error) => {
        console.error("Hiba történt az adatok beolvasása során:", error);
      });
  }

  function updateCountries(countries) {
    resultContainer.innerHTML = "";

    let rowContainer;

    countries.forEach((country, index) => {
      if (index % 4 === 0) {
        rowContainer = document.createElement("div");
        rowContainer.classList.add("row-container");
        resultContainer.appendChild(rowContainer);
      }

      const countryBox = document.createElement("div");
      countryBox.classList.add("country-box");

      if (country.flags && Array.isArray(country.flags)) {
        const pngFlags = country.flags.filter((flagUrl) =>
          flagUrl.endsWith(".png")
        );
        pngFlags.forEach((flagUrl) => {
          const flagImage = document.createElement("img");
          flagImage.classList.add("flag-image");
          flagImage.src = flagUrl;
          flagImage.alt = "Flag";
          countryBox.appendChild(flagImage);
        });
      }

      const countryName = document.createElement("h2");
      countryName.textContent = country.name.common;
      countryBox.appendChild(countryName);

      const population = document.createElement("p");
      population.textContent = `Lakosság: ${country.population || "N/A"}`;
      countryBox.appendChild(population);

      const continent = document.createElement("p");
      continent.textContent = `Kontinens: ${country.region || "N/A"}`;
      countryBox.appendChild(continent);

      const capital = document.createElement("p");
      capital.textContent = `Főváros: ${country.capital || "N/A"}`;
      countryBox.appendChild(capital);

      rowContainer.appendChild(countryBox);
    });
  }

  function scrollToCountry(countryName) {
    const countryBoxes = document.querySelectorAll(".country-box");

    for (const countryBox of countryBoxes) {
      const nameElement = countryBox.querySelector("h2");
      if (nameElement.textContent === countryName) {
        countryBox.scrollIntoView({ behavior: "smooth" });
        break;
      }
    }
  }

  function addNewCountry() {
    const newName = prompt("Add meg az új ország nevét:");
    const newCapital = prompt("Add meg az új ország fővárosának nevét:");

    if (newName && newCapital) {
      const defaultFlagUrl = "https://flagcdn.com/w320/hu.png";

      const newCountry = {
        name: { common: newName },
        capital: newCapital,
        flags: [defaultFlagUrl],
      };

      // Adatok betöltése a böngésző tárhelyéből
      const storedCountries = loadDataFromLocalStorage();

      // Új ország hozzáadása
      storedCountries.push(newCountry);

      // Adatok mentése a böngésző tárhelyébe
      saveDataToLocalStorage(storedCountries);

      // Frissítjük az adatokat és megjelenítjük az eredményt
      updateCountries(storedCountries);

      alert("Az új ország hozzáadva!");
    } else {
      alert("Az ország nevét és fővárosának nevét is meg kell adni!");
    }
  }

  function modifyCountry() {
    const countryName = prompt("Add meg a módosítandó ország nevét:");
    if (countryName) {
      const fieldToModify = prompt(
        "Melyik adatot szeretnéd módosítani? (name/capital)"
      );
      if (
        fieldToModify &&
        (fieldToModify === "name" || fieldToModify === "capital")
      ) {
        const newValue = prompt(
          `Add meg az új értéket a(z) ${fieldToModify} mezőhöz:`
        );

        if (newValue !== null) {
          // Adatok betöltése a böngésző tárhelyéből
          const storedCountries = loadDataFromLocalStorage();

          // Megkeressük a módosítandó országot
          const modifiedCountry = storedCountries.find(
            (country) => country.name.common === countryName
          );

          if (modifiedCountry) {
            // Módosítjuk az adatot
            if (fieldToModify === "name") {
              modifiedCountry.name.common = newValue;
            } else if (fieldToModify === "capital") {
              modifiedCountry.capital = newValue;
            }

            // Adatok mentése a böngésző tárhelyébe
            saveDataToLocalStorage(storedCountries);

            // Frissítjük az adatokat és megjelenítjük az eredményt
            updateCountries(storedCountries);

            alert("Az ország módosítva!");
          } else {
            alert("Az adott ország nem található.");
          }
        } else {
          alert("Az új értéket meg kell adni!");
        }
      } else {
        alert("Hibás mezőnév. Csak 'name' vagy 'capital' lehetséges.");
      }
    }
  }

  const deleteDataButton = document.createElement("button");
  deleteDataButton.classList.add("jsButtons");
  deleteDataButton.textContent = "TÖRLÉS";
  deleteDataButton.addEventListener("click", function () {
    const countryNameToDelete = prompt("Add meg a törlendő ország nevét:");

    if (countryNameToDelete) {
      // Adatok betöltése a böngésző tárhelyéből
      const storedCountries = loadDataFromLocalStorage();

      // Megkeressük a törlendő országot
      const countryToDeleteIndex = storedCountries.findIndex(
        (country) => country.name.common === countryNameToDelete
      );

      if (countryToDeleteIndex !== -1) {
        // Töröljük az országot a tömbből
        storedCountries.splice(countryToDeleteIndex, 1);

        // Adatok mentése a böngésző tárhelyébe
        saveDataToLocalStorage(storedCountries);

        // Frissítjük az adatokat és megjelenítjük az eredményt
        updateCountries(storedCountries);

        console.log(`Az ország '${countryNameToDelete}' sikeresen törölve.`);
      } else {
        alert("Az adott ország nem található.");
      }
    } else {
      alert("Az ország nevét meg kell adni a törléshez.");
    }
  });

  const addCountryButton = document.createElement("button");
  addCountryButton.classList.add("jsButtons");
  addCountryButton.textContent = "HOZZÁADÁS";
  addCountryButton.addEventListener("click", function () {
    addNewCountry();
  });

  const putDataButton = document.createElement("button");
  putDataButton.classList.add("jsButtons");
  putDataButton.textContent = "MÓDOSÍTÁS";
  putDataButton.addEventListener("click", function () {
    modifyCountry();
  });

  const searchButton = document.createElement("button");
  searchButton.classList.add("jsButtons");
  searchButton.textContent = "KERESÉS";
  searchButton.addEventListener("click", function () {
    const countryName = prompt("Add meg az ország nevét:");
    if (countryName) {
      scrollToCountry(countryName);
    }
  });

  document.body.appendChild(addCountryButton);
  document.body.appendChild(putDataButton);
  document.body.appendChild(deleteDataButton);
  document.body.appendChild(searchButton);

  fetchData(); // Oldal betöltésekor az összes ország lekérése
});
