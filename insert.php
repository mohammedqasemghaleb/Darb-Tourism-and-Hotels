<?php
// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $college_name = $_POST['college'];
  $major_name = $_POST['major'];
  $section_name = $_POST['section'];
  $books = $_POST['books'];

  // Connect to database
  $db_host = 'localhost';
  $db_name = 'collage_books';
  $db_user = 'root';
  $db_pass = '';
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert college
  $sql = "INSERT INTO colleges (name) VALUES ('$college_name')";
  if ($conn->query($sql) === TRUE) {
    $college_id = $conn->insert_id;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Insert major
  $sql = "INSERT INTO majors (name, college_id) VALUES ('$major_name', $college_id)";
  if ($conn->query($sql) === TRUE) {
    $major_id = $conn->insert_id;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Insert section
  $sql = "INSERT INTO sections (name, major_id) VALUES ('$section_name', $major_id)";
  if ($conn->query($sql) === TRUE) {
    $section_id = $conn->insert_id;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Insert books
  foreach ($books as $book) {
    $title = $book['title'];
    $author = $book['author'];
    $summary = $book['summary'];
    $sql = "INSERT INTO books (title, author, summary, section_id) VALUES ('$title', '$author', '$summary', $section_id)";
    if ($conn->query($sql) !== TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  // Close database connection
  $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>University Library</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
<body>
<!-- HTML form -->
<form method="post">
  <label for="college">College:</label>
  <input type="text" name="college" id="college">
  <br>
  <label for="major">Major:</label>
  <input type="text" name="major" id="major">
  <br>
  <label for="section">Section:</label>
  <input type="text" name="section" id="section">
  <br>
  <label for="books">Books:</label>
  <div id="books">
    <div class="book">
      <label for="title[]">Title:</label>
      <input type="text" name="books[0][title]" id="title[]">
      <br>
      <label for="author[]">Author:</label>
      <input type="text" name="books[0][author]" id="author[]">
      <br>
      <label for="summary[]">Summary:</label>
      <textarea name="books[0][summary]" id="summary[]"></textarea>
    </div>
  </div>
  <button type="button" onclick="addBook()">Add Book</button>
  <br>
  <button type="submit">Submit</button>
</form>
<script>
// Function to add book form fields
function addBook() {
  var bookCount = document.querySelectorAll('.book').length;
  var book = document.createElement('div');
  book.className = 'book';
  book.innerHTML = `
    <label for="title[]">Title:</label>
    <input type="text" name="books[${bookCount}][title]" id="title[]">
    <br>
    <label for="author[]">Author:</label>
    <input type="text" name="books[${bookCount}][author]" id="author[]">
    <br>
    <label for="summary[]">Summary:</label>
    <textarea name="books[${bookCount}][summary]" id="summary[]"></textarea>
  `;
  document.getElementById('books').appendChild(book);
}
</script>
</body>
</html>