<?php
// DB 연결
  require_once("registerLogic.php");

// POST 값 설정
  $register_ID = $_POST['id'];
  $register_Nickname = $_POST['nick'];
  $register_Password = $_POST['pass'];
  $register_PasswordCheck = $_POST['password'];
  $register_Email = $_POST['email'];

// 오류 확인
checkEmpty($register_ID, $register_Nickname, $register_Password, $register_PasswordCheck, $register_Email);

if ($register_Password != $register_PasswordCheck) {
  header("location:register_page.php?error=비밀번호를 확인하세요");
  exit();
}

checkID($register_ID);

checkNick($register_Nickname);

checkEmail($register_Email);

// 비밀번호 해시 변환
$hash_password = hash('sha256', $register_Password);

// DB 입력
$query = "INSERT INTO users VALUES ('$register_ID', '$hash_password', '$register_Nickname','$register_Email')";
mysqli_query(DB(), $query);

mysqli_close(DB());

header("location:login_page.php?success=회원가입이 완료되었습니다");
exit();

?>