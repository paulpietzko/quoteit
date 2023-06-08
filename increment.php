<?php
$databaseConfig = [
    'host' => 'localhost',
    'user' => 'quotout',
    'password' => 'qu0t_',
    'database' => 'citation'
];

$conn = new mysqli($databaseConfig['host'], $databaseConfig['user'], $databaseConfig['password'], $databaseConfig['database']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the request
$id = isset($_POST['id']) && is_numeric($_POST['id']) ? intval($_POST['id']) : 0;

// Make sure that $id is valid
if ($id === 0) {
    die("Invalid ID");
}

// Prepare and execute the SQL query
$sql = "UPDATE citation SET hits = hits + 1, updated = CURRENT_TIMESTAMP WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("i", $id);
$success = $stmt->execute();

if ($success) {
    if ($stmt->affected_rows > 0) {
        echo "Hits and timestamp updated successfully";
    } else {
        echo "No rows updated. Check if the ID exists in the database.";
    }
} else {
    echo "Error executing the statement: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>