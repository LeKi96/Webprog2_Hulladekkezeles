<?php
$host = "mysql.omega:3306";
$username = "hulladek";
$password = "TesztJelszo12345";
$dbname = "hulladek";

// Ellenőrzi, hogy a munkamenet még nincs aktív
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM felhasznalok WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    if ($result === false) {
        die("Query failed: " . $mysqli->error);
    }

    $user = $result->fetch_assoc();
}
?>