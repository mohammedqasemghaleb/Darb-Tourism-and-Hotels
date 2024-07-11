<?php
$conn = mysqli_connect('localhost', 'root', '', 'Darb');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // إدخال التعليق في قاعدة البانات
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "INSERT INTO comments (name, rating, description) VALUES ('$name', '$rating', '$description')";
    mysqli_query($conn, $sql);
  
    // إرجاع التعليق الجديد كنص HTML
    echo '<div class="col-md-8-auto mb-3">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $name . '</h5>';
    echo '<h6 class="card-subtitle mb-2 text-muted">' . $rating . ' نجمة</h6>';
    echo '<p class="card-text">' . $description . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  } else {
    echo 'لا يمكن الوصول إلى هذه الصفحة مباشرة.';
  }
  
?>


