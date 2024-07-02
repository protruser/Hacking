<?php
  require_once("loginLogic.php");

  $userID = $_POST['id'];
  $userPass = $_POST['pass'];

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

  logic($userID, $userPass);

?>