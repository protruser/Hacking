<?php
  $register_ID = $_POST['id'];
  $register_Nickname = $_POST['nick'];
  $register_Password = $_POST['pass'];
  $register_PasswordCheck = $_POST['password'];
  $register_Email = $_POST['email'];

// DB 연결  
  define('DB_HOST','localhost');
  define('DB_USER','admin');
  define('DB_PASS','student1234');
  define('DB_NAME','login');

  $db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($db_conn, 'utf8');

  if ($db_conn) {
    echo 'connect';
  } else {
    echo 'false';
  }

// 오류 확인  
if ($register_Password != $register_PasswordCheck) {
  header("location:register_page.php?error=비밀번호를 확인하세요");
  exit();
}

$check_id = "SELECT * FROM users WHERE id = '$register_ID'";
$result_id = mysqli_query($db_conn, $check_id);

if (mysqli_num_rows($result_id) > 0) {
  header("location:register_page.php?error=중복된 아이디입니다");
  exit();
}

$check_nick = "SELECT * FROM users WHERE nick = '$register_Nickname'";
$result_nick = mysqli_query($db_conn, $check_nick);

if (mysqli_num_rows($result_nick) > 0) {
  header("location:register_page.php?error=중복된 닉네임입니다");
  exit();
}

$check_email = "SELECT * FROM users WHERE email = '$register_Email'";
$result_email = mysqli_query($db_conn, $check_email);

if(mysqli_num_rows($result_email) > 0) {
  header("location: register_page.php?error=중복된 이메일입니다");
  exit();
}

//DB 입력
$query = "INSERT INTO users VALUES ('$register_ID', '$register_Nickname', '$register_Password','$register_Email')";
mysqli_query( $db_conn, $query);


header("location:login_page.php?success=회원가입이 완료되었습니다");
exit();

?>