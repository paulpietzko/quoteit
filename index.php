<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://www.quoteit.com/" />

    <!-- Meta Tags -->
    <meta name="description" content="this is the official quoteit website">
    <meta name="keywords" content="quote, it, day">
    <meta name="author" content="Adrian Petrovic, Paul Pietzko">

    <!-- Infos -->
    <title>QuoteIt</title>

        <!-- Links -->
        <link rel="stylesheet" href="css/styles.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <!-- HTML -->
    <div class="main">
        <div class="quotecontainer">
            <!-- PHP -->
            <?php
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
                    echo '<blockquote class="quote">' . $row["quote"] . "</blockquote>"; // quote
                    echo '<blockquote class="author"">' . $row["first_name"] . " " . $row["last_name"] . "</blockquote>"; // author
                
                    // Hits Spalte bei Datensatz mit ID inkrementieren
                    $id = $row["id"];
                    $updateSql = "UPDATE citation SET hits = hits + 1 WHERE id = $id";
                    $conn->query($updateSql);
                }
            ?>
        </div>
    </div>
</body>
</html>