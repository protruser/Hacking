<?php
  require_once("DB.php");
  function logic1($userID, $userPass) {
    $query = "SELECT * FROM users WHERE id = '$userID' and pass = '$userPass'";
    $result = mysqli_query(DB(), $query);

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
  }


  function logic2($userID, $userPass) {
    $query = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query(DB(),$query);
    $row = mysqli_fetch_array($result);

    if ($row['pass'] != $userPass) {
      header("location:login_page.php?error=비밀번호를 확인해주세요");
      exit();
    } else {
      header("location:index.php?id=" . $userID);
      exit();
    }
  }

  function logic3($userID, $userPass) {
    $hash_pass = hash('sha256', $userPass);
    
    $query = "SELECT * FROM users WHERE id = '$userID' and pass = '$hash_pass'";
    $result = mysqli_query(DB(), $query);

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
  }

  function logic($userID, $userPass) {
    session_start();

    $hash_pass = hash('sha256', $userPass);

    $query = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query(DB(),$query);
    $row = mysqli_fetch_array($result);

    if ($row['pass'] != $hash_pass) {
      header("location:login_page.php?error=비밀번호를 확인해주세요");
      exit();
    } else {
      $_SESSION['user_data'] = $row;
      
      mysqli_close(DB());
      header("location:index.php");
      exit();
    }
  }
?>