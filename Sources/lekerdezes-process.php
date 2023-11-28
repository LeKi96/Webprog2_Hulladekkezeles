<?php

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

$conn = new mysqli("localhost", "root", "", "hulladek");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $elszallitott_mennyiseg = $row['elszallitott_mennyiseg'];
    $waste_type_description = $row['waste_type_description'];

    echo "<p>Eredmény: $elszallitott_mennyiseg egység $waste_type_descriptions[$waste_type] hulladék lett elszállítva</p>";
} else {
    echo "<p>Nincs eredmény</p>";
}

$conn->close();
?>