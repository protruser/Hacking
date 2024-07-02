<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="login_css/login.css">
  <title>Register</title>
</head>

<body>
  <form method="post" action="register_proc.php">
    <h2>회원가입</h2>
    <?php if (isset($_GET['error'])) { ?>
    <?php echo $_GET['error'] ?>
    <?php } ?>
    <label>아이디</label>
    <input id="box" type="text" name="id" placeholder="ID" />
    <label>닉네임</label>
    <input id="box" type="text" name="nick" placeholder="Nickname">
    <label>비밀번호</label>
    <input id="box" type="password" name="pass" placeholder="Password" />
    <label>비밀번호 확인</label>
    <input id="box" type="password" name="password" placeholder="PasswordCheck" />
    <label>이메일</label>
    <input id="box" type="text" name="email" placeholder="Email">
    <label class="login_button"><button type="submit">회원가입완료</button></label>
  </form>
</body>

</html>