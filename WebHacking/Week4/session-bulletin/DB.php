<?php
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','7908');
  define('DB_NAME','login');
  function DB() {

    $db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($db_conn, 'utf8');

    return $db_conn;
  }
?>