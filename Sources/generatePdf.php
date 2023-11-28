<?php
require_once('tcpdf/tcpdf.php');

// Kapcsolódás az adatbázishoz (példa adatok)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hulladek";

$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizze a kapcsolatot
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Űrlapból érkező adatok
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$waste_type = $_POST['waste_type'];

// Hulladék típusok leírásai
$waste_type_descriptions = [
    1 => 'Műanyag',
    2 => 'Üveg',
    3 => 'Zöld',
    4 => 'Papír',
    5 => 'Kommunális'
];

// Lekérdezés az adatbázisból
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

// PDF generálás (TCPDF használatával)
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantity = $row['elszallitott_mennyiseg'];
    $waste_type_description = $waste_type_descriptions[$waste_type];

    // TCPDF inicializálása
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('dejavusans', 'B', 14);

    // Űrlap adatainak hozzáadása a PDF-hez
    $pdf->Cell(0, 10, 'Lekérdezett paraméterek:', 0, 1, 'C');
    $pdf->Cell(0, 10, "Kezdeti dátum: $start_date", 0, 1, 'C');
    $pdf->Cell(0, 10, "Vég dátum: $end_date", 0, 1, 'C');
    $pdf->Cell(0, 10, "Hulladék típusa: $waste_type_description", 0, 1, 'C');
    $pdf->Ln();
    $pdf->Cell(0, 10, 'Elszállított Hulladék Mennyisége a megadott időszakban:', 0, 1, 'C');
    $pdf->Cell(0, 10, "$quantity egység", 0, 1, 'C');

    // Fájl nevének beállítása és letöltése
    $filename = "PDFimport.pdf";
    $pdf->Output($filename, 'D');
}

$conn->close();
?>