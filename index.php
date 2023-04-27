<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://www.quoteit.com/"/>
	
	<!-- Meta Tags -->
	<meta name="description" content="this is the official quoteit website">
    <meta name="keywords" content="quote, it, day">
    <meta name="author" content="Adrian Petrovic, Paul Pietzko">
	
    <!-- Infos -->
    <title>QuoteIt</title>

    <!-- Links -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>

    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/9b6186208b.js" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <!-- PHP -->
    <?php
        // Datenbankverbindung herstellen
        $servername = "localhost";
        $username = "root"; // Benutzername für Wampserver
        $password = ""; // Passwort für Wampserver ist standardmäßig leer
        $dbname = "citation";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // SQL-Abfrage, um eine zufällige Zeile aus der Tabelle "citation" auszulesen
        $sql = "SELECT * FROM citation ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);

        // Ergebnis ausgeben, wenn es vorhanden ist
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>Zufällige Zitat:</p>";
        echo "<blockquote>" . $row["quote"] . "</blockquote>";
        } else {
        echo "Kein Ergebnis gefunden.";
        }

        // Datenbankverbindung schließen
        $conn->close();
    ?>

    <!-- HTML -->
    <div class="main">
        <div class="quotecontainer">
            <p class="quote">"When the past comes knocking, don't answer. It has nothing new to tell you."</p>
        </div>
        <div class="authorcontainer">
            <p class="author">doozylist.com</p>
        </div>
    </div>
</body>
</html>