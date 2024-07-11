<?php
// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Get the form data
$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$summary = mysqli_real_escape_string($conn, $_POST['summary']);
$section_id = mysqli_real_escape_string($conn, $_POST['section']);

// Insert the data into the books table
mysqli_query($conn, "INSERT INTO books (title, author, summary, section_id) VALUES ('$title', '$author', '$summary', '$section_id')");

// Redirect back to the content page
header("Location: content.php");
exit();
?>