<?php
session_start();

$servername = "localhost";
$username = "noormetskevin_press";
$password = "wordpress123";
$dbname = "noormetskevin_wordpress";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if username and password are set in the POST request
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "Username or password not provided.";
    return;
}

// Sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Prepare SQL statement
$sql = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$sql->bind_param("s", $username);

// Execute SQL statement
$sql->execute();

// Store the result
$sql->store_result();

$sql->bind_result($id, $hashed_password);
$sql->fetch();

// Verify the password
if (password_verify($password, $hashed_password)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username; 

    // Redirect to the user's dashboard 
    header("Location: admin_dashboard.php"); 
    exit; 
}

echo "Incorrect credentials";
