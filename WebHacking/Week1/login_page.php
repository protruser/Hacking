<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <form method="post" action="real_login_proc.php">
    <label>아이디</label>
    <input type="text" name="id" placeholder="UserID" />
    <label>비밀번호</label>
    <input type="password" name="pass" placeholder="UserPass" />
    <label>로그인</label>
    <input type="submit" value="login" />
  </form>
</body>

</html>