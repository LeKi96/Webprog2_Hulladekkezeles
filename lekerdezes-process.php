<?php
// Adatbázis kapcsolat létrehozása és konfiguráció
    $host = 'localhost';
    $dbname = 'hulladek'; 
    $username = 'root';
    $password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Felhasználótól származó adatok
$datum = $_POST["datum"];
$mennyiseg = $_POST["mennyiseg"];
$tipus = $_POST["tipus"];

// SQL lekérdezés összeállítása
$sql = "SELECT naptar.datum, lakig.mennyiseg, szolgaltatas.tipus
        FROM naptar
        JOIN lakig ON naptar.szolgid = lakig.szolgid
        JOIN szolgaltatas ON lakig.szolgid = szolgaltatas.id
        WHERE naptar.datum = '$datum' AND lakig.mennyiseg = '$mennyiseg' AND szolgaltatas.tipus = '$tipus'";

$result = $conn->query($sql);

// Eredmények megjelenítése
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Dátum: " . $row["datum"]. " - Mennyiség: " . $row["mennyiseg"]. " - Típus: " . $row["tipus"]. "<br>";
    }
} else {
    echo "Nincs találat.";
}

// Adatbázis kapcsolat bezárása
$conn->close();
?>
