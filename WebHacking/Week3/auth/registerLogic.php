<?php
  require_once("DB.php");

  function checkEmpty($register_ID, $register_Nickname, $register_Password, $register_PasswordCheck, $register_Email) {
    if (empty($register_ID && $register_Nickname && $register_Password && $register_PasswordCheck && $register_Email))
    {
      header("location:register_page.php?error=모두 작성해주세요");
      exit();
    }
  }

  function checkID($register_ID) {
    $check_id = "SELECT * FROM users WHERE id = '$register_ID'";
    $result_id = mysqli_query(DB(), $check_id);

    if (mysqli_num_rows($result_id) > 0) {
      header("location:register_page.php?error=중복된 아이디입니다");
      exit();
    }
  }

  function checkNick($register_Nickname) {
    $check_nick = "SELECT * FROM users WHERE nick = '$register_Nickname'";
    $result_nick = mysqli_query(DB(), $check_nick);

    if (mysqli_num_rows($result_nick) > 0) {
      header("location:register_page.php?error=중복된 닉네임입니다");
      exit();
    }
  }

  function checkEmail($register_Email) {
    $check_email = "SELECT * FROM users WHERE email = '$register_Email'";
    $result_email = mysqli_query(DB(), $check_email);

    if(mysqli_num_rows($result_email) > 0) {
      header("location: register_page.php?error=중복된 이메일입니다");
      exit();
    }
  }
?>