


<!-- View data from the Users table -->
<div class="container">
  <h2>Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Nationality</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Prepare a select statement
      $sql = "SELECT name, email, phone, dob, nationality FROM Users";

      if ($stmt = $pdo->prepare($sql)) {
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
          // Fetch all rows as an associative array
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Loop through the rows and output the data in HTML table
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["dob"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nationality"]) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Update data in the Users table -->
<div class="container">
  <!-- Update data in the Users table -->
<div class="container">
  <h2>Update User Information</h2>
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
    <div class="form-group">
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <input type="submit" class="btn btn-primary" value="Update">
    </div>
  </form>
</div>

<?php
// Process form data when form is submitted for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
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
    $email = trim($_POST["email"]);
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

  // Check input errors before updating in database
  if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($dob_err) && empty($nationality_err)) {
    // Prepare an update statement
    $sql = "UPDATE Users SET name=:name, email=:email, phone=:phone, dob=:dob, nationality=:nationality WHERE user_id=:user_id";

    if ($stmt = $pdo->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
      $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
      $stmt->bindParam(":nationality", $param_nationality, PDO::PARAM_STR);
      $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_INT);

      // Set parameters
      $param_name = $name;
      $param_email = $email;
      $param_phone = $phone;
      $param_dob = $dob;
      $param_nationality = $nationality;
      $param_user_id = $_POST['user_id'];

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Redirect to users page
        header("location: users.php");
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