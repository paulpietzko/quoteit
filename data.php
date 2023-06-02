<?php
header('Content-Type: application/json; charset=utf-8');

// Datenbankverbindung herstellen
$servername = "localhost";
$username = "quotout";
$password = "qu0t_";
$dbname = "citation";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Prepared Statement, um eine zufällige Zeile aus der Tabelle "citation" auszulesen
    $stmt = $conn->prepare("SELECT * FROM citation ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            "id" => $row["ID"],
            "quote" => $row["quote"],
            "author" => $row["first_name"] . " " . $row["last_name"]
        );
    } else {
        $response = array("error" => -1);
    }

    $conn->close(); // close connection

    print json_encode($response);
} catch (mysqli_sql_exception $exception) {
    $response = array(
        "quote" => 'Es gab ein Problem bei der Verbindung zur Datenbank. Bitte versuchen Sie es später erneut.',
        "author" => $exception->getMessage()
    );
    print json_encode($response);
}
?>