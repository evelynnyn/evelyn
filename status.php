<!DOCTYPE html>
<html lang="zh-Hant">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>迎新茶會</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container my-5">
	<h1 class="mb-4">迎新茶會</h1>
	<p>
		迎新茶會是專為新生設計的交流活動，讓新同學能夠認識師長與學長姐，了解資管系的學習環境與資源。  
		活動中有輕鬆的茶點、趣味破冰遊戲，以及學長姐經驗分享，幫助新生快速融入大學生活。
	</p>
	<a href="#" class="btn btn-primary">立即報名</a>

<div class="container mt-5">
  <h2 class="mb-4">迎新茶會報名表單</h2>
  <p>迎新茶會的費用計算方式：老師免費，學生用餐60元，不用餐免費。</p>

  
  <form action="status.php" method="post">
    
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
      <label class="form-label">是否用餐：</label><br>
      <input type="radio" name="meal" value="yes" required>需要

      <input type="radio" name="meal" value="no">不需要
	</div>

    <button type="submit" class="btn btn-primary">送出報名</button>
  </form>

  
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
	    $role = $_POST["role"];
      $meal = $_POST["meal"];
      $fee = 0;

      if ($role == "teacher") {
	          $fee = 0;
	      } elseif ($role == "student") {
	          if ($meal == "yes") {
	              $fee = 60;
	          } else {
	              $fee = 0;
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
