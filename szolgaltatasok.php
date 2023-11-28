<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Sources/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Szolgáltatások</title>
</head>
<body style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      <body>"

<?php require_once('Sources/navbar.php') ?>
<br>

  <div class="container">
    <div>
      <input type="number" name="getService" id="getServiceInput" placeholder="Azonosító" class="form-control my-1">
      <button onclick="getById(1)" id="getServiceButton" class="btn btn-secondary">Szolgáltatás lekérdezése azonosító alapján</button>
    </div>
    <div>
      <input type="text" name="addTipusInput" id="addTipusInput" placeholder="Típus" class="form-control my-2">
      <input type="text" name="addJelentesInput" id="addJelentesInput" placeholder="Jelentés" class="form-control my-1">
      <button onclick="addEntry()" id="addBtn" class="btn btn-secondary">Szolgáltatás hozzáadása</button>
    </div>
    <div>
      <input type="text" name="editTipusInput" id="editTipusInput" placeholder="Típus" class="form-control my-2">
      <input type="text" name="editJelentesInput" id="editJelentesInput" placeholder="Jelentés" class="form-control my-1">
      <button onclick="updateEntry(1)" id="edit" class="btn btn-secondary">Szolgáltatás módosítása</button>
    </div>
    <div>
      <input type="number" name="deleteInput" id="deleteInput" placeholder="Azonosító" class="form-control my-2">
      <button onclick="deleteEntry(1)" id="deleteBtn" class="btn btn-secondary">Szolgáltatás törlése</button>
    </div>
    <ul id="dataList" class="list-group bg-secondary my-2 p-2 text-light">
    
    </ul>
  </div>

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
    
    document.addEventListener('DOMContentLoaded', () => {
    getAll();

    function getAll() {
        sendRequest('GET', apiUrl)
            .then(data => {
                displayDataInList(data);
            })
            .catch(error => console.error(error));
    }

    function displayDataInList(data) {
        const dataList = document.getElementById('dataList');

        dataList.innerHTML = '';

        data.forEach(item => {
            const listItem = document.createElement('li.list-group-item');
            listItem.textContent = `ID: ${item.id}, Tipus: ${item.tipus}, Jelentes: ${item.jelentes}`;
            dataList.appendChild(listItem);
        });
    }
    
    const inputField = document.getElementById('getServiceInput');
    const searchButton = document.getElementById('getServiceButton');

    searchButton.addEventListener('click', () => {
        const inputValue = inputField.value;

        if (!isNaN(inputValue)) {
            getById(parseInt(inputValue, 10));
        } else {
            console.error('Invalid input. Please enter a valid number.');
        }
    });

    function getById(id) {
        sendRequest('GET', `${apiUrl}/${id}`)
            .then(data => {
                displayData(data);
            })
            .catch(error => console.error(error));
    }
    
    const addTipusInput = document.getElementById('addTipusInput');
    const addJelentesInput = document.getElementById('addJelentesInput');
    const addBtn = document.getElementById('addBtn');
    
    
    
    function updateEntry(id) {
      const updatedData = {
        tipus: 'UpdatedType',
        jelentes: 'UpdatedDescription'
      };
      sendRequest('PUT', `${apiUrl}/${id}`, updatedData)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    const deleteInput = document.getElementById('deleteInput');
    const deleteBtn = document.getElementById('deleteBtn');
    
    function deleteEntry(id) {
      sendRequest('DELETE', `${apiUrl}/${id}`)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }
    
    function displayData(data) {
        const resultElement = document.getElementById('dataList');
        resultElement.innerHTML = '';

        const dataString = `ID: ${data.id}, Tipus: ${data.tipus}, Jelentes: ${data.jelentes}`;
        resultElement.textContent = dataString;
    }
});
    function addEntry() {
          const newData = {
            tipus: addTipusInput.value,
            jelentes: addJelentesInput.value
          };
          sendRequest('POST', apiUrl, newData)
            .then(data => {displayData(data);})
            .catch(error => console.error(error));
        }

        
        
    function displayData(data) {
        const resultElement = document.getElementById('dataList');
        resultElement.innerHTML = '';

        const dataString = `ID: ${data.id}, Tipus: ${data.tipus}, Jelentes: ${data.jelentes}`;
        resultElement.textContent = dataString;
    }
    

    
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>