<?php
header('Content-Type: application/json; charset=utf-8');

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

    // Fetch random quote
    $response = fetchRandomQuote($conn);

    // Close connection
    $conn->close();
} catch (Exception $e) {
    $response = [
        'quote' => 'Es gab ein Problem bei der Verbindung zur Datenbank. Bitte versuchen Sie es später erneut.',
        'author' => $e->getMessage()
    ];
}

echo json_encode($response);

function fetchRandomQuote($conn)
{
    $stmt = $conn->prepare("SELECT * FROM citation ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return [
            'ID' => $row['ID'],
            'quote' => $row['quote'],
            'author' => $row['first_name'] . ' ' . $row['last_name']
        ];
    } else {
        return ['error' => -1];
    }
}
?>