<?php
$host = "localhost"; // Change if needed
$username = "root"; // Default XAMPP MySQL user
$password = ""; // Default is empty
$database = "poultry"; // Your database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>