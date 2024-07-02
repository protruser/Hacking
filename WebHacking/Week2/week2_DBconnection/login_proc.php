<?php
  $userID = $_POST['id'];
  $userPass = $_POST['pass'];

  define('DB_HOST','localhost');
  define('DB_USER','admin');
  define('DB_PASS','student1234');
  define('DB_NAME','login');

  $db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if (empty($userID))
  {
    header("location:login_page.php?error=아이디를 입력하세요");
    exit();
  }
  else if (empty($userPass))
  {
    header("location:login_page.php?error=비밀번호를 입력하세요");
    exit();
  }

  $query = "SELECT * FROM users WHERE id = '$userID' and pass = '$userPass'";
  $result = mysqli_query($db_conn, $query);

  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) == 0)
  {
    header("location:login_page.php?error=아이디와 비밀번호를 확인해주세요");
    exit();
  }
  else
  {
    header("location:index.php?id=" . $userID);
    exit();
  }

?>
