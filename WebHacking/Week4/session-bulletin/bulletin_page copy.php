<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bulletin.css">
  <title>게시판 목록</title>
</head>

<body>
  <div class="header">
    <div class="nav">
      <div>
        <a href="index.php"><img class="home" src="img/home2.png"></a>
      </div>
      <a href="/" class="nav-menu">MyPage</a>
      <a href="/" class="nav-menu">Logout</a>
    </div>
  </div>

  <div class="content">
    <h1>게시판</h1>
    <form class="board">
      <table>
        <thead>
          <tr>
            <th width="50">No</th>
            <th width="500">제목</th>
            <th width="120">작성자</th>
            <th width="120">작성일</th>
          </tr>
        </thead>
        <?php
          require_once('DB.php');

          if (isset($_GET['find'])) {
            $find = $_GET['find'];
            $query = "SELECT * FROM bulletin WHERE title LIKE '%$find%' ORDER BY idx DESC LIMIT 0,10";
          }
          else {
            $query = "SELECT * FROM bulletin ORDER BY idx DESC LIMIT 0,10";
          }

          $result = mysqli_query(DB(), $query);

          while($board = $result -> fetch_array()) {
        ?>
        <tbody>
          <td width="50"><?php echo $board['idx'] ?></td>
          <td width="500"><a href="bulletin_view.php?no=<?php echo $board['idx']?>"
              class="title"><?php echo $board['title'] ?></a></td>
          <td width="120"><?php echo $board['user'] ?></td>
          <td width="50"><?php echo $board['date'] ?></td>
        </tbody>
        <?php }?>
      </table>
    </form>
    <form>
      <input name="find" placeholder="제목찾기" value="<?php echo isset($_GET['find']) ? $_GET['find'] : ''; ?>">
      <button>검색</button>
    </form>
    <div>
      <a href="bulletin_write.php"><button class="write">글쓰기</button></a>
    </div>
  </div>
</body>

</html>