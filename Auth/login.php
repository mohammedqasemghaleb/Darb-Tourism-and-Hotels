<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Replace this with your own authentication logic
    $dsn = 'mysql:host=localhost;dbname=darb';
    $username_db = 'root';
    $password_db = 'darb';
    $pdo_options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    );
    try {
        $pdo = new PDO($dsn, $username_db, $password_db, $pdo_options);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE name = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            // If the credentials are correct, log the user in and redirect to the admin page
            $_SESSION['logged_in'] = true;
            header('Location: admin/index.php');
            exit;
        } else {
            // If the credentials are incorrect, display an error message
            $error = 'Invalid username or password';
        }
    } catch (PDOException $e) {
        // Handle database errors here
        $error = 'Database error: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/testing2.css">
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
    <Script src="../lib/bootstrap.bundle.min.js"></Script>
</head>
<body>

    <?php if (isset($error)): ?>
        <p><?php echo $error ?></p>
    <?php endif ?>

    <style>
        .container-fluid {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
}

        .card {
        width: 700px;
        }
    </style>
    <div class="container-fluid">
  <div class="row  justify-content-center">
    <div class="col-md-6">
      <div class="card">
      <h1 class="text-center">Login</h1>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="username">Email:</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>