<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Replace this with your own authentication logic
    if ($username === 'admin' && $password === 'password') {
        // If the credentials are correct, log the user in and redirect to the admin page
        $_SESSION['logged_in'] = true;
        header('Location: ../admin.php');
        exit;
    } else {
        // If the credentials are incorrect, display an error message
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error ?></p>
    <?php endif ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>