<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>