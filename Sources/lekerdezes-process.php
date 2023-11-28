<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hulladek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$waste_type = $_POST['waste_type'];

$waste_type_descriptions = [
  1 => 'Műanyag',
  2 => 'Üveg',
  3 => 'Zöld',
  4 => 'Papír',
  5 => 'Kommunális'
];

$sql = "SELECT
      SUM(l.mennyiseg) AS elszallitott_mennyiseg,
      s.tipus AS waste_type_description
      FROM lakig l
      JOIN naptar n ON l.igeny = n.datum
      JOIN szolgaltatas s ON l.szolgid = s.id
      WHERE
      n.datum >= '$start_date' AND n.datum <= '$end_date'
      AND s.id = '$waste_type';";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<p>Elszállított mennyiség: " . $row['elszallitott_mennyiseg'] . "</p>";
        echo "<p>Hulladék típusa: " . $waste_type_descriptions[$waste_type] . "</p>";
      }
    } else {
      echo "Nincs találat a megadott feltételekkel.";
    }
  } else {
    echo "Lekérdezési hiba: " . $conn->error;
  }

$conn->close();
?>