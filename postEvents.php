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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST["eventName"];
    $eventDescription = $_POST["eventDescription"];
    $eventDate = $_POST["eventDate"];

    $sql = "INSERT INTO events (name, description, date) VALUES ('$eventName', '$eventDescription', '$eventDate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid access!";
}

$conn->close();
?>
