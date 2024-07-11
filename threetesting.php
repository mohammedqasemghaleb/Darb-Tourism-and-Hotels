
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
  <style>
    /* Sidebar styles */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 20%;
      background-color: #f8f9fa;
    }
    
    /* Content styles */
    #content {
      margin-left: 20%;
      padding: 20px;
    }
    
    /* Button styles */
    #sidebar button {
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="sidebar">
    <div class="container-fluid mt-2 " >
      <div class="row">
        <div class="col-md-12">
          <button type="button" class="btn btn-primary btn-block" id="colleges-btn">Colleges</button>
        </div>
      </div>
      <div class="row mt-3" id="colleges" style="display:none">
        <div class="col-md-12">
          <!-- College buttons will be generated dynamically here -->
          <?php
          while ($college = mysqli_fetch_assoc($colleges_result)) {
            $college_id = $college["id"];
            $college_name = $college["name"];
            echo "<button type='button' class='btn btn-secondary btn-block college-btn' data-college-id='$college_id'>$college_name</button>";
          }
          ?>
        </div>
      </div>
      <div class="row mt-3" id="majors" style="display:none">
        <div class="col-md-12">
          <!-- Major buttons will be generated dynamically here -->
        </div>
      </div>
      <div class="row mt-3" id="sections" style="display:none">
        <div class="col-md-12">
          <!-- Section buttons will be generated dynamically here -->
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Book buttons will be generated dynamically here -->
        <?php
        while ($book = mysqli_fetch_assoc($books_result)) {
          $book_title = $book["title"];
          $book_author = $book["author"];
          $book_section_id = $book["section_id"];
          echo "<div class='col-md-3 mb-3'><button type='button' class='btn btn-success btn-block'>$book_title<br>$book_author<br>Section: $book_section_id</button></div>";
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Include PHP functions -->
  <?php include("functions.php"); ?>

  <!-- Retrieve data from the database -->
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

  <script>
    // When the Colleges button is clicked, show the colleges
    $("#colleges-btn").click(function() {
      $("#colleges").toggle();
    });

    // When a college button is clicked, show the majors for that college
    $(".college-btn").click(function() {
      var college_id = $(this).data("college-id");
      var majors_html = "<?php echo create_major_buttons($majors_result); ?>";
      $("#majors").html(majors_html);
      $("#majors").toggle();
    });

    // When a major button is clicked, show the sections for that major
    $(".major-btn").click(function() {
      var major_id = $(this).data("major-id");
      var sections_html = "<?php echo create_section_buttons($sections_result); ?>";
      $("#sections").html(sections_html);
      $("#sections").toggle();
    });

    // When a section button is clicked, show the books for that section
    $(".section-btn").click(function() {
      var section_id = $(this).data("section-id");
      var books_html = "<?php echo create_book_buttons($books_result); ?>";
      $("#content .row").html(books_html);
    });
  </script>
</body>
</html>