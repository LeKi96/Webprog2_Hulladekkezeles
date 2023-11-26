document.addEventListener("DOMContentLoaded", function () {
  const apiUrl = "https://restcountries.com/v3.1/all";
  const resultContainer = document.createElement("div");
  resultContainer.id = "result-container";
  document.body.appendChild(resultContainer);

  // Függvény a REST API hívások elvégzéséhez
  function fetchData(method, data = null) {
    const options = {
      method: method,
      headers: {
        "Content-Type": "application/json",
      },
      body: data ? JSON.stringify(data) : null,
    };

    return fetch(apiUrl, options)
      .then((response) => response.json())
      .then((data) => {
        // Itt dolgozd fel a visszakapott adatokat
        updateCountries(data);
      })
      .then(() => {
        // Frissítsd az országokat az új adatokkal
        fetchData("GET");
      })
      .catch((error) => {
        console.error("Hiba történt a kérés során:", error);
      });
  }

  // Függvény az országok megjelenítéséhez
  function updateCountries(countries) {
    resultContainer.innerHTML = "";

    let rowContainer;

    countries.forEach((country, index) => {
      if (index % 4 === 0) {
        // Új sor létrehozása minden 4. országnál
        rowContainer = document.createElement("div");
        rowContainer.classList.add("row-container");
        resultContainer.appendChild(rowContainer);
      }

      const countryBox = document.createElement("div");
      countryBox.classList.add("country-box");

      const flagImage = document.createElement("img");
      flagImage.classList.add("flag-image");
      flagImage.src = country.flags.png;
      flagImage.alt = "Flag";
      countryBox.appendChild(flagImage);

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

  // Függvény az országok közötti görgetéshez
  function scrollToCountry(countryName) {
    const countryBoxes = document.querySelectorAll(".country-box");

    for (const countryBox of countryBoxes) {
      const nameElement = countryBox.querySelector("h2");
      if (nameElement.textContent === countryName) {
        // Az adott ország dobozára görgetés
        countryBox.scrollIntoView({ behavior: "smooth" });
        break;
      }
    }
  }

  // Függvény az új ország hozzáadásához
  function addNewCountry() {
    const newName = prompt("Add meg az új ország nevét:");
    const newCapital = prompt("Add meg az új ország fővárosának nevét:");

    if (newName && newCapital) {
      const data = {
        name: newName,
        capital: newCapital,
      };

      fetchData("POST", data);
    } else {
      alert("Az ország nevét és fővárosának nevét is meg kell adni!");
    }
  }

  // Gombok hozzáadása a dokumentumhoz (a 'GET' gomb kivétele)
  const postDataButton = document.createElement("button");
  postDataButton.classList.add("jsButtons");
  postDataButton.textContent = "POST";
  postDataButton.addEventListener("click", function () {
    addNewCountry();
  });

  const putDataButton = document.createElement("button");
  putDataButton.classList.add("jsButtons");
  putDataButton.textContent = "PUT";
  putDataButton.addEventListener("click", function () {
    const data = {
      name: "ExistingCountryName",
      capital: "NewCapital",
    };
    fetchData("PUT", data);
  });

  const deleteDataButton = document.createElement("button");
  deleteDataButton.classList.add("jsButtons");
  deleteDataButton.textContent = "DELETE";
  deleteDataButton.addEventListener("click", function () {
    const data = {
      name: "CountryToDelete",
    };
    fetchData("DELETE", data);
  });

  const searchButton = document.createElement("button");
  searchButton.classList.add("jsButtons");
  searchButton.textContent = "SEARCH";
  searchButton.addEventListener("click", function () {
    const countryName = prompt("Add meg az ország nevét:");
    if (countryName) {
      scrollToCountry(countryName);
    }
  });

  // Csak az új gombokat adjuk hozzá a dokumentumhoz
  document.body.appendChild(postDataButton);
  document.body.appendChild(putDataButton);
  document.body.appendChild(deleteDataButton);
  document.body.appendChild(searchButton);

  // Oldal betöltésekor az összes ország lekérése
  fetchData("GET");
});
