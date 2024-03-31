<?php

$servername = "localhost";
$username = "noormetskevin_press";
$password = "wordpress123";
$dbname = "noormetskevin_wordpress";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT id, name, date, type FROM events";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return events in JSON format
header('Content-Type: application/json');
echo json_encode($events);
?>