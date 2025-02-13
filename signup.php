<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "my_portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $username, $hashed_password);

// Set parameters and execute
$email = $_POST['email'];
$username = $_POST['username'];
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>