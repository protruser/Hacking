<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>loginProcess</title>
</head>

<body>
  <?php
  $userID = $_POST['id'];
  $userPass = $_POST['pass'];

  if ($userID == "admin" && $userPass == "admin1234")
  {
    echo "<script>location.replace('index.php');</script>";
  }

  else if (empty($userID))
  {
    echo "<script>alert('아이디를 입력하세요')</script>";
    echo "<script>location.replace('login_page.php');</script>";
    exit();
  }
  else if (empty($userPass))
  {
    echo "<script>alert('비밀번호를 입력하세요')</script>";
    echo "<script>location.replace('login_page.php');</script>";
    exit();
  } else
    {
      echo "<script>alert('등록되지 않은 회원입니다')</script>";
      echo "<script>location.replace('login_page.php');</script>";
      exit();
    }
  ?>
</body>

</html>