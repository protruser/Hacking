<?php
  $studentName = $_GET['name'];
  $studentScore = $_GET['score'];

  $db_conn = mysqli_connect('localhost', 'admin', 'student1234', 'university');
  mysqli_set_charset($db_conn, "utf8");

  /*
  if($db_conn) {
    echo "DB Connect OK";
  } else {
    echo "DB Connect Fail";
  }
   */

  $query = "INSERT INTO students VALUES (NULL, '$studentName', $studentScore)";
  $result = mysqli_query($db_conn, $query);

  if ($result) {
    echo '입력 완료';
  } else {
    echo '입력 오류';
  }
