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
          <div id="college-list"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <h1>Welcome to the University Library</h1>
    <p>Select a college, major, section, and book to view its information.</p>
    <div id="book-info" style="display:none">
      <h2 id="book-title"></h2>
      <p id="book-author"></p>
      <p id="book-summary"></p>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      // Load college list on page load
      loadColleges();
      
      // Display/hide colleges
      $("#colleges-btn").click(function() {
        $("#colleges").toggle();
      });
      
      // Display/hide majors
      $(document).on("click", ".major-btn", function() {
        var majorId = $(this).data("major-id");
        $("#major-" + majorId + "-sections").toggle();
      });
      
      // Display/hide sections
      $(document).on("click", ".section-btn", function() {
        var sectionId = $(this).data("section-id");
        $("#section-" + sectionId + "-books").toggle();
      });
      
      // Display book info on book button click
      $(document).on("click", ".book-btn", function() {
        var bookId = $(this).data("book-id");
        var title = $(this).text();
        var author = $(this).data("author");
        var summary = $(this).data("summary");
        $("#book-title").text(title);
        $("#book-author").text(author);
        $("#book-summary").text(summary);
        $("#book-info").show();
      });
    });
    
    function loadColleges() {
      // Load colleges from table
      $.getJSON("colleges.php", function(data) {
        var html = "";
        $.each(data, function(key, value) {
          html += '<button type="button" class="btn btn-secondary btn-block college-btn" data-college-id="' + value.id + '">' + value.name + '</button>';
        });
        $("#college-list").html(html);
      });
    }
    
    $(document).on("click", ".college-btn", function() {
      var collegeId = $(this).data("college-id");
      loadMajors(collegeId);
    });
    
    function loadMajors(collegeId) {
      // Load majors from table
      $.getJSON("majors.php?college_id=" + collegeId, function(data) {
        var html = "";
        $.each(data, function(key, value) {
          html += '<button type="button" class="btn btn-info btn-block major-btn" data-major-id="' + value.id + '">Major ' + (key + 1) + '</button>';
          html += '<div id="major-' + value.id + '-sections" style="display:none">';
          html += loadSections(value.id);
          html += '</div>';
        });
        $("#college-" + collegeId + "-majors").html(html);
        $("#college-" + collegeId + "-majors").toggle();
      });
    }
    
    function loadSections(majorId) {
      // Load sections from table
      var html = "";
      $.getJSON("sections.php?major_id=" + majorId, function(data) {
        $.each(data, function(key, value) {
          html += '<button type="button" class="btn btn-success btn-block section-btn" data-section-id="' + value.id + '">Section ' + (key + 1) + '</button>';
          html += '<div id="section-' + value.id + '-books" style="display:none">';
          html += loadBooks(value.id);
          html += '</div>';
        });
      });
      return html;
    }
    
    function loadBooks(sectionId) {
      // Load books from table
      var html = "";
      $.getJSON("books.php?section_id=" + sectionId, function(data) {
        $.each(data, function(key, value) {
          html += '<button type="button" class="btn btn-warning btn-block book-btn" data-book-id="' + value.id + '" data-author="' + value.author + '" data-summary="' + value.summary + '">Book ' + (key + 1) + '</button>';
        });
      });
      return html;
    }
  </script>
</body>
</html>