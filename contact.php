<!DOCTYPE html>
<html>
<head>
  <title>Content</title>
</head>
<body>
  <h1>Content</h1>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Summary</th>
        <th>Section</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "username", "password", "database");

        // Query the books table and join with the sections table to get the section name
        $result = mysqli_query($conn, "SELECT books.*, sections.name AS section_name FROM books LEFT JOIN sections ON books.section_id = sections.id");

        // Loop through the results and display each book in a table row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['author']."</td>";
          echo "<td>".$row['summary']."</td>";
          echo "<td>".$row['section_name']."</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>