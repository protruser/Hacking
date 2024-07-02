<?php
  $studentName = $_GET['name'];
  
  $db_conn = mysqli_connect('localhost','admin','student1234','university');
  mysqli_set_charset($db_conn,"utf8");

  /*
  if ($db_conn) {
    echo 'DB Connect';
  } else {
    echo 'False';
  } */

  $query = "SELECT name, score FROM students where name='$studentName'";
  $result = mysqli_query($db_conn, $query);

  $row = mysqli_fetch_array($result);

  echo $row['name'], "님의 점수는 ", $row['score'], "점 입니다."
?>

