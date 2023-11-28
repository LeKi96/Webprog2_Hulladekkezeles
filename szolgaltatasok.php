<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      <body>"

<?php require_once('Sources/navbar.php') ?>
<br>
  <button onclick="getAll()">GET All</button>
  <button onclick="getById(1)">GET by ID</button>
  <button onclick="addEntry()">POST</button>
  <button onclick="updateEntry(1)">PUT</button>
  <button onclick="deleteEntry(1)">DELETE</button>

  <script>
    const apiUrl = 'http://localhost:3000/szolgaltatas';

    function sendRequest(method, url, data = null) {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = () => {
          if (xhr.status >= 200 && xhr.status < 300) {
            resolve(JSON.parse(xhr.responseText));
          } else {
            reject(new Error(`HTTP error: ${xhr.status}`));
          }
        };
        xhr.onerror = () => {
          reject(new Error('Network request failed'));
        };
        xhr.send(JSON.stringify(data));
      });
    }

    function getAll() {
      sendRequest('GET', apiUrl)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    function getById(id) {
      sendRequest('GET', `${apiUrl}/${id}`)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    function addEntry() {
      const newData = {
        tipus: 'NewType',
        jelentes: 'NewDescription'
      };
      sendRequest('POST', apiUrl, newData)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    function updateEntry(id) {
      const updatedData = {
        tipus: 'UpdatedType',
        jelentes: 'UpdatedDescription'
      };
      sendRequest('PUT', `${apiUrl}/${id}`, updatedData)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    function deleteEntry(id) {
      sendRequest('DELETE', `${apiUrl}/${id}`)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }
  </script>

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
</body>
</html>