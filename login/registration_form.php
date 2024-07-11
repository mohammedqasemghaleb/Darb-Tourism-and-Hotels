<?php
// Start a session to store the user's login status
session_start();
include ('../include/db_connect.php');
// If the user has submitted the registration form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_POST['email'];

  // TODO: Validate the input (e.g. check if the username is unique, password meets complexity requirements, email is valid, etc.)

  // If the input is valid, add the user's information to the database
  $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
  if (mysqli_query($conn, $query)) {
    // The user's information was successfully added to the database
    echo "Data inserted successfully";
  } else {
    // The user's information was not successfully added to the database
    echo "Data insertion failed";
  }
}
?>

<!-- Display the registration form -->
<form action="registration_form.php" method="post">
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="password" name="confirm_password" placeholder="Confirm Password">
  <input type="email" name="email" placeholder="Email">
  <button type="submit">Register</button>
</form>
