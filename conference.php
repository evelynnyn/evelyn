<!DOCTYPE html>
<html lang="zh-Hant">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>資管一日營</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container my-5">
	<h1 class="mb-4">資管一日營</h1>
	<p>
		資管一日營邀請大一新生透過一整天的活動更大學資管系的課程與生活。  
		活動內容包含常用網站介紹、校園導覽與學長姐座談、闖關遊戲，讓參加者為未來四年作好準備。
	</p>
	<a href="#" class="btn btn-primary">立即報名</a>

<div class="container mt-5">
  <h2 class="mb-4">迎新茶會報名表單</h2>
  
  <form action="conference.php" method="post">
    
    <div class="mb-3">
      <label for="name" class="form-label">姓名：</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    
    <div class="mb-3">
      <label class="form-label">身份：</label><br>
      <input type="radio" name="role" value="teacher" required>老師
      <input type="radio" name="role" value="student">學生
    </div>

	<div class="mb-3">
      <label class="form-label">選擇場次：</label><br>
      <input type="checkbox" name="session[]" value="150">上午場(150元)
      <input type="checkbox" name="session[]" value="100">下午場(100元)
      <input type="checkbox" name="session[]" value="60">午餐(60元)
	</div>

    <button type="submit" class="btn btn-primary">送出報名</button>
  </form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	      $name = $_POST["name"];
	      $role = $_POST["role"];
	      $fee = 0;

	      if ($role == "teacher") {
	          $fee = 0;
	      } elseif ($role == "student") {
	          if (isset($_POST["session"])) {
	              $sessions = $_POST["session"];
	              foreach ($sessions as $price) {
	                  $fee += (int)$price;
	              }
	          }
	      }

      echo "<div class='alert alert-success mt-4'>";
      echo "姓名：" . htmlspecialchars($name) . "<br>";
      echo "費用：" . $fee . " 元";
      echo "</div>";
  }
  ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
