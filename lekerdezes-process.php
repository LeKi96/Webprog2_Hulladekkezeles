<?php
    $host = 'localhost';
    $dbname = 'hulladek'; 
    $username = 'root';
    $password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$datum = $_GET['datum'];
$igeny = $_GET['igeny'];
$szolgaltatas = $_GET['szolgaltatas'];

$sql = "SELECT naptar.*, lakig.*, szolgaltatas.jelentes
        FROM naptar
        JOIN lakig ON naptar.szolgid = lakig.szolgid
        JOIN szolgaltatas ON lakig.szolgid = szolgaltatas.id
        WHERE naptar.datum = '$datum' AND lakig.igeny = '$igeny' AND szolgaltatas.tipus = '$szolgaltatas'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Dátum: " . $row["datum"]. " - Igény napja: " . $row["igeny"]. " - Szolgáltatás jelentése: " . $row["jelentes"]. "<br>";
    }
} else {
    echo "Nincs találat.";
}

$conn->close();
?>
