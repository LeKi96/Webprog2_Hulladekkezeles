<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó kezelés</title>
    <link rel="stylesheet" type="text/css" href="Sources/style.css" />
</head>
<body
    style="
      background-image: url('Sources/images/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    "
  >
    <?php require_once('Sources/navbar.php') ?>

    <h1 class="adminh1">FELHASZNÁLÓK KEZELÉSE</h1>

<?php
$servername = "mysql.omega:3306";
$username = "hulladek";
$password = "TesztJelszo12345";
$dbname = "hulladek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to update privileges
function updatePrivileges($userId, $newPrivileges) {
    global $conn;
    $sql = "UPDATE felhasznalok SET Privilages = $newPrivileges WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "Privileges updated successfully";
    } else {
        echo "Error updating privileges: " . $conn->error;
    }
}

// Function to delete user
function deleteUser($userId) {
    global $conn;
    $sql = "DELETE FROM felhasznalok WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Display users and privileges
$sql = "SELECT id, UserName, Privilages FROM felhasznalok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Azonosító</th><th>Felhasználónév</th><th>Jogosultság</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["UserName"] . "</td>";
        echo "<td>" . $row["Privilages"] . "</td>";
        echo "<td><a href='?action=toggle&id=" . $row["id"] . "'>Jog Módosítása</a> | <a href='?action=delete&id=" . $row["id"] . "'>Felhasználó Törlése</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Handle actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $userId = $_GET['id'];

    if ($action === 'toggle') {
        $currentPrivileges = $result->fetch_assoc()["Privilages"];
        $newPrivileges = ($currentPrivileges == 0) ? 1 : 0;
        updatePrivileges($userId, $newPrivileges);
    } elseif ($action === 'delete') {
        deleteUser($userId);
    }
}

$conn->close();
?>

    <div id="adminDesc">
        <p>Jelmagyarázat:</p>
        <p>0 = Regisztrált látogató</p>
        <p>1 = Adminisztrátor</p>
    </div>

    <footer>
  <div class="footer-content">
    <p>&copy; 2023 hulladékkezelés</p>
    <ul class="footer-links">
      <li><a href="./homePage.php">Kezdőlap</a></li>
      <?php if(isset($_SESSION["user_id"])): ?>
        <li><a href="./lekerdezes.php">Lekérdezés</a></li>
        <li><a href="./restApiTest.php">Rest API teszt</a></li>
        <li><a href="./szolgaltatasok.php">Szolgáltatások kezelése</a></li>
        <li><a href="./pdfImport.php">PDF Generálás</a></li>
        <?php if($user["Privilages"] == 1): ?>
          <li><a href="./admin.php">Felhasználók kezelése</a></li>
        <?php endif; ?>
      <?php else: ?>
        <!-- Display only the "Kezdőlap" link for visitors -->
        <li><a href="./homePage.php">Kezdőlap</a></li>
      <?php endif; ?>
    </ul>
  </div>
</footer>

</body>
</html>