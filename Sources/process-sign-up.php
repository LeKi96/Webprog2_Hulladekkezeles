<?php
    $host = "mysql.omega:3306";
    $username = "hulladek";
    $password = "TesztJelszo12345";
    $dbname = "hulladek";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kapcsolódási hiba: " . $conn->connect_error);
    }

    $vezeteknev = $_POST['lastName'];
    $keresztnev = $_POST['firstName'];
    $felhasznalonev = $_POST['username'];
    $jelszo = $_POST['password'];

    $sql = "INSERT INTO felhasznalok (UserName, Password, Privilages) VALUES ('$felhasznalonev', '$jelszo', '$privilages')";


    if ($conn->query($sql) === TRUE) {
        echo "Regisztráció sikeres";
    } else {
        echo "Hiba a rekord beszúrásakor: " . $conn->error;
    }

    $conn->close();
    sleep(1);

    header("Location: ../homePage.php");
    exit();
?>
