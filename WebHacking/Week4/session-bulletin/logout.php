<?php
  session_start();

  if (isset($_SESSION['user_data'])) {
    session_destroy();
    header('location:index.php');
  }
?>