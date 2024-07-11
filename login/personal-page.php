<?php
session_start();

include ('../include/db_connect.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header('Location:login_form.php');
  exit;
}

// Get the user's information from the database
$username = $_SESSION['username'];
// TODO: Retrieve the user's information from the database using their username

// Get the user's information from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

?>

<!-- Display the user's information on their personal page -->
<h1>Welcome, <?= $user['username'] ?></h1>
<p>Email: <?= $user['email'] ?></p>
<!-- TODO: Display the user's information from the database -->

