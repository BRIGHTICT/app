<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO visitors (name, mobile, email, country) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $mobile, $email, $country);

// Set parameters and execute
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$country = $_POST['country'];
$stmt->execute();

$stmt->close();
$conn->close();

echo "New records created successfully";
?>
