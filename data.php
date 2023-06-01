<?php
header('Content-Type: application/json; charset=utf-8');

// Datenbankverbindung herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citation";
$conn = new mysqli($servername, $username, $password, $dbname);

// SQL-Abfrage, um eine zufällige Zeile aus der Tabelle "citation" auszulesen
$sql = "SELECT * FROM citation ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        "quote" => $row["quote"],
        "author" => $row["first_name"] . " " . $row["last_name"]
    );
} else {
    $response = array("error" => -1);
}

$conn->close(); // close connection

print json_encode($response);
?>
