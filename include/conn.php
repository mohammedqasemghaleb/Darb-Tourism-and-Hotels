<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "darb";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>