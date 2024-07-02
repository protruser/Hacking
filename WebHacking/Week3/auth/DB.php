<?php
  function DB() {
    define('DB_HOST','localhost');
    define('DB_USER','admin');
    define('DB_PASS','student1234');
    define('DB_NAME','login');

    $db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($db_conn, 'utf8');

    return $db_conn;
  }
?>