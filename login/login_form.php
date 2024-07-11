<?php
session_start();

// Function to validate the user's credentials
function validate_credentials($username, $password) {
  $db = new PDO('mysql:host=localhost;dbname=pgj', 'root', '');
  // Check if the username and password exist in the database
  $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
  $stmt = $db->prepare($sql);
  $stmt->execute([$username, $password]);

  // If the user exists, return true
  if ($stmt->rowCount() > 0) {
    return true;
  } else {
    // If the user does not exist, return false
    return false;
  }
}

// Check if the user has submitted the login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the user's credentials
  $valid_credentials = validate_credentials($username, $password);

  // If the user's credentials are valid, log them in and redirect to their personal page
  if ($valid_credentials) {
    $db = new PDO('mysql:host=localhost;dbname=pgj', 'root', '');
    $stmt = $db->prepare("SELECT user_type FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user['user_type'] == 2) {
      $_SESSION['username'] = $username;
      header('Location: admin.php');
    } else {
      header('Location: personal-page.php');
    }
    exit;
  } else {
    // If the user's credentials are invalid, display an error message
    $error_message = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/fontawesome.js"></script>
  <title>Document</title>
  <style>

  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center h-100">
    <div class="card w-50 m-auto">
      <div class="header-card">
        <h1 class="text-center"> Login </h1>
      </div>
      <div class="body-card">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </form>
    </div>
    </div>
  </div>
</body>
</html>