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

          // 한 페이지에 표시할 게시물 수
          $posts_per_page = 10;

          // 현재 페이지 번호
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

          // 검색어
          $find = isset($_GET['find']) ? $_GET['find'] : '';

          // LIMIT 절을 계산하여 해당 페이지의 게시물만 조회
          $offset = ($current_page - 1) * $posts_per_page;

          // 전체 게시물 수 조회
          if (!empty($find)) {
            $count_query = "SELECT COUNT(*) AS total_count FROM bulletin WHERE title LIKE '%$find%'";
          } else {
            $count_query = "SELECT COUNT(*) AS total_count FROM bulletin";
          }

          $count_result = mysqli_query(DB(), $count_query);
          $count_data = mysqli_fetch_assoc($count_result);
          $total_posts = $count_data['total_count'];

          // 총 페이지 수 계산
          $total_pages = ceil($total_posts / $posts_per_page);

          if (isset($find)) {
            $query = "SELECT * FROM bulletin WHERE title LIKE '%$find%' ORDER BY idx DESC LIMIT $offset, $posts_per_page";
          } else {
            $query = "SELECT * FROM bulletin ORDER BY idx DESC LIMIT $offset, $posts_per_page";
          }

          $result = mysqli_query(DB(), $query);

          while ($board = $result->fetch_array()) {
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
    <form method="get" action="">
      <input name="find" placeholder="제목">
      <button>검색</button>
    </form>
    <div class="pagination">
      <?php
      // 페이지 링크 출력
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
          echo "<span>$i</span>";
        } else {
          echo "<a href='?page=$i&find=$find'>$i</a>";
        }
      }
      ?>
    </div>
    <div>
      <a href="bulletin_write.php"><button class="write">글쓰기</button></a>
    </div>
  </div>
</body>

</html>