<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Collection Report</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="Sources/script.js"></script>
</head>
<body>

<div class="collectionForm">
    <form id="collectionForm" action="Sources/lekerdezes-process.php" method="post">

        <div id="startDate">
            <label for="start_date">Kezdeti dátum:</label> <br>
            <input type="text" id="start_date" name="start_date" placeholder="YYYY-MM-DD" required>
        </div>
        <div id="endDate">
            <label for="end_date">Vég dátum:</label> <br>
            <input type="text" id="end_date" name="end_date" placeholder="YYYY-MM-DD" required>
        </div>

        <div id="wasteType">
            <label for="waste_type">Hulladék típusa:</label> <br>
            <select id="waste_type" name="waste_type" required>
                <option value="1">Műanyag</option>
                <option value="2">Üveg</option>
                <option value="3">Zöld</option>
                <option value="4">Papír</option>
                <option value="5">Kommunális</option>
            </select>
        </div>

        <input id="collectionSubmit" type="button" value="Generálás" onclick="generateReport()">
    </form>

    <div id="resultContainer">
        <!-- Az eredmény itt jelenik meg AJAX hívás után -->
    </div>
</div>

</body>
</html>