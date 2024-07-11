<?php
// Connect to the database
$host = 'localhost';
$dbname = 'Darb';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Connection failed: ' . $e->getMessage());
}

// Define variables and set to empty values
$name = $email = $phone = $dob = $nationality = $password = "";
$name_err = $email_err = $phone_err = $dob_err = $nationality_err = $password_err = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter your name.";
  } else {
    $name = trim($_POST["name"]);
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email.";
  } else {
    // Prepare a select statement
    $sql = "SELECT user_id FROM Users WHERE email = :email";

    if ($stmt = $pdo->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      // Set parameters
      $param_email = trim($_POST["email"]);

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }

  // Validate phone
  if (empty(trim($_POST["phone"]))) {
    $phone_err = "Please enter your phone number.";
  } else {
    $phone = trim($_POST["phone"]);
  }

  // Validate date of birth
  if (empty(trim($_POST["dob"]))) {
    $dob_err = "Please enter your date of birth.";
  } else {
    $dob = trim($_POST["dob"]);
  }

  // Validate nationality
  if (empty(trim($_POST["nationality"]))) {
    $nationality_err = "Please enter your nationality.";
  } else {
    $nationality = trim($_POST["nationality"]);
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 8) {
    $password_err = "Password must have at least 8 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Check input errors before inserting into database
  if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($dob_err) && empty($nationality_err) && empty($password_err)) {
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an insert statement
    $sql = "INSERT INTO Users (name, email, phone, dob, nationality, password) VALUES (:name, :email, :phone, :dob, :nationality, :password)";

    if ($stmt = $pdo->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
      $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
      $stmt->bindParam(":nationality", $param_nationality, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

      // Set parameters
      $param_name = $name;
      $param_email = $email;
      $param_phone = $phone;
      $param_dob = $dob;
      $param_nationality = $nationality;
      $param_password = $hashed_password;

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Redirect to login page
        header("location: ../login.php");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }

  // Close connection
  unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- تضمين ملفات Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-/5lGz9+AzK2Qza2cYi7YgkAmhN0xZdJQ+6ps15N6gD0X9N3q0FjK4+1iFwL6xOoO+J0sC7TmTl9cTfJyjRsK6Q==" crossorigin="anonymous" />

<body>
    <!-- HTML form -->
<div class="container">
  <h2>Register</h2>
  <p>Please fill in this form to create an account.</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
      <span class="help-block"><?php echo $name_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
      <span class="help-block"><?php echo $email_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
      <label>Phone Number</label>
      <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
      <span class="help-block"><?php echo $phone_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
      <span class="help-block"><?php echo $dob_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($nationality_err)) ? 'has-error' : ''; ?>">
      <label>Nationality</label>
      <input type="text" name="nationality" class="form-control" value="<?php echo $nationality; ?>">
      <span class="help-block"><?php echo $nationality_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label>Password</label>
      <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
      <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <div class="form-group">
      <label>
        <input type="checkbox" name="terms" value="yes"> I agree to the terms and conditions
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit">
      <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
