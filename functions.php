<?php
// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "collage_books";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all colleges, majors, sections, and books from the respective tables
$colleges_sql = "SELECT * FROM colleges";
$colleges_result = mysqli_query($conn, $colleges_sql);

$majors_sql = "SELECT * FROM majors";
$majors_result = mysqli_query($conn, $majors_sql);

$sections_sql = "SELECT * FROM sections";
$sections_result = mysqli_query($conn, $sections_sql);

$books_sql = "SELECT * FROM books";
$books_result = mysqli_query($conn, $books_sql);

// Close database connection
mysqli_close($conn);
?>
<?php
// Function to create HTML buttons for colleges
function create_college_buttons($colleges) {
  $html = "";
  while ($row = mysqli_fetch_assoc($colleges)) {
    $html .= "<button type=\"button\" class=\"btn btn-secondary btn-block college-btn\" data-college-id=\"" . $row["id"] . "\">" . $row["name"] . "</button>";
  }
  return $html;
}

// Function to create HTML buttons for majors
function create_major_buttons($majors) {
  $html = "";
  while ($row = mysqli_fetch_assoc($majors)) {
    $html .= "<button type=\"button\" class=\"btn btn-info btn-block major-btn\" data-major-id=\"" . $row["id"] . "\">" . $row["name"] . "</button>";
  }
  return $html;
}

// Function to create HTML buttons for sections
function create_section_buttons($sections) {
  $html = "";
  while ($row = mysqli_fetch_assoc($sections)) {
    $html .= "<button type=\"button\" class=\"btn btn-success btn-block section-btn\" data-section-id=\"" . $row["id"] . "\">" . $row["name"] . "</button>";
  }
  return $html;
}

// Function to create HTML buttons for books
function create_book_buttons($books) {
  $html = "";
  while ($row = mysqli_fetch_assoc($books)) {
    $html .= "<button type=\"button\" class=\"btn btn-primary btn-block book-btn\">" . $row["title"] . " by " . $row["author"] . "</button>";
  }
  return $html;
}
?>