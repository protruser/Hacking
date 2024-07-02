<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login_css/login.css">
  <title>Login</title>
</head>

<body>
  <form method="post" action="login_proc.php">
    <h2>Login</h2>

    <?php if (isset($_GET['error'])){ ?>
    <p class="error"><?php echo $_GET['error'] ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])){ ?>
    <p class="success"><?php echo $_GET['success'] ?></p>
    <?php } ?>

    <label>아이디</label>
    <input id="box" type="text" name="id" placeholder="ID" />
    <label>비밀번호</label>
    <input id="box" type="password" name="pass" placeholder="Password" />
    <label class="login_button"><button type="submit">로그인</button></label>
    <a href="register_page.php" class="register">회원가입</a>
  </form>
</body>

</html>