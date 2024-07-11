<?php


// اتصال بقاعدة البيانات
$conn = mysqli_connect('localhost', 'root', '', 'Darb');

// استعلام لاسترداد التعليقات المحمل
$sql = "SELECT * FROM comments ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// إرجاع التعليقات كنص HTML
while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-md-4 mx-auto mb-3 text-dark">';
  echo '<div class="card">';
  echo '<div class="card-body">';
  echo '<h5 class="card-title">' . $row['name'] . '</h5>';
  echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['rating'] . ' نجمة</h6>';
  echo '<p class="card-text">' . $row['description'] . '</p>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}


