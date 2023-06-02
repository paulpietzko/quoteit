<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is the official quoteit website">
    <meta name="keywords" content="quote, it, day">
    <meta name="author" content="Adrian Petrovic, Paul Pietzko">

    <!-- Infos -->
    <title>QuoteIt</title>

    <!-- Links -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="canonical" href="https://www.quoteit.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

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
            // Database configuration
            $databaseConfig = [
                'host' => 'localhost',
                'user' => 'quotout',
                'password' => 'qu0t_',
                'database' => 'citation'
            ];

            try {
                // Create connection
                $conn = new mysqli($databaseConfig['host'], $databaseConfig['user'], $databaseConfig['password'], $databaseConfig['database']);

                // Check connection
                if ($conn->connect_error) {
                    throw new Exception('Connection failed: ' . $conn->connect_error);
                }

                // Fetch and display random quote
                displayRandomQuote($conn);

                // Close connection
                $conn->close();
            } catch (Exception $e) {
                echo '<blockquote class="quote">Es gab ein Problem bei der Verbindung zur Datenbank. Bitte versuchen Sie es später erneut. </blockquote>';
                echo '<blockquote class="author">' . $e->getMessage() . '</blockquote>';
            }

            function displayRandomQuote($conn)
            {
                $stmt = $conn->prepare("SELECT * FROM citation ORDER BY RAND() LIMIT 1");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<blockquote class="quote">' . $row["quote"] . "</blockquote>"; // quote
                    echo '<blockquote class="author"">' . $row["first_name"] . " " . $row["last_name"] . "</blockquote>"; // author
            
                    // Increment hits column for the fetched row
                    $stmt = $conn->prepare("UPDATE citation SET hits = hits + 1 WHERE id = ?");
                    $stmt->bind_param('i', $row['ID']);
                    $stmt->execute();
                }
            }
            ?>
        </div>
    </div>
</body>

</html>