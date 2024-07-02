<?php
  // // 식별 / 인증 동시 로그인
  // $sql ="SELECT * FROM member WHERE id='id' and pass='pass'";
  // $result = mysqli_query($conn, $sql);

  // if ($result) {
  //   echo "식별 / 인증 동시 로그인 성공";
  // } else {
  //   echo "실패";
  // }
?>

<?php
  // // 식별 / 인증 분리 로그인
  // $sql = "SELECT * FROM member WHERE id='id'";
  // $result = mysqli_query($conn, $sql);
  // $row = mysqli_fetch_array($result);

  // $DB_Pass = $row["password"];

  // if ($DB_Pass == "$user_pass") {
  //   echo "식별 / 인증 분리 로그인 성공";
  // } else {
  //   echo "실패";
  // }

  $hash = password_hash("1234", PASSWORD_DEFAULT);
  var_dump($hash);
?>