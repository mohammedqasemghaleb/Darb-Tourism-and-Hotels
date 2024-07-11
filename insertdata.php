<!DOCTYPE html>
<html>
<head>
  <title>Insert Data</title>
</head>
<body>
  <h1>Insert Data</h1>
  <form action="insert.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br>

    <label for="author">Author:</label>
    <input type="text" name="author" id="author"><br>

    <label for="summary">Summary:</label>
    <textarea name="summary" id="summary"></textarea><br>

    <label for="section">Section:</label>
    <select name="section" id="section">
      <option value="">Select a section</option>
      <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "username", "password", "database");

        // Query the sections table
        $result = mysqli_query($conn, "SELECT * FROM sections");

        // Loop through the results and display each section as an option in the dropdown menu
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
      ?>
    </select><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>