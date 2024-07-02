<?php
  session_start();
  
  if (!isset($_SESSION['user_data'])) {
    echo "<script>alert('로그인이 필요합니다')</script>";
    header("location:login_page.php");
    exit();
  } else {
    $user = $_SESSION['user_data'];
    $_SESSION['user'] = $user;
    echo $user['nick'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
</head>

<body>
  <p>Welcome to Our Page</p>
  <a href="bulletin_write.php">글 작성하기</a><br>
  <a href="bulletin_page.php">글 목록</a><br>
  <a href="logout.php">로그아웃</a>
</body>

</html>