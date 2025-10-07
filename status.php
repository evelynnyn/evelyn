<?php
include 'header.php';

if (!isset($_SESSION["user"])) {
  $_SESSION["redirect_to"] = $_SERVER["REQUEST_URI"];
  header("Location: login.php");
  exit;
}

$user = $_SESSION["user"];
?>

<h2 class="mb-4">迎新茶會報名表單</h2>
<p>費用說明：</p>
<ul>
  <li>老師免費</li>
  <li>學生：上午場 100 元、下午場 80 元、全天 150 元</li>
  <li>若用餐再加 60 元</li>
</ul>

<form method="post">
  <div class="mb-3">
    <label class="form-label">姓名：</label>
    <input type="text" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" disabled>
  </div>

  <div class="mb-3">
    <label class="form-label">身份：</label>
    <input type="text" class="form-control" value="<?= htmlspecialchars($user['role']) ?>" disabled>
  </div>

  <div class="mb-3">
    <label class="form-label">選擇場次：</label><br>
    <input type="radio" name="session" value="100" required> 上午場 (100元)<br>
    <input type="radio" name="session" value="80"> 下午場 (80元)<br>
    <input type="radio" name="session" value="150"> 全天 (150元)
  </div>

  <div class="mb-3">
    <label class="form-label">是否用餐：</label><br>
    <input type="radio" name="meal" value="yes" required> 需要<br>
    <input type="radio" name="meal" value="no"> 不需要
  </div>

  <button type="submit" class="btn btn-primary">送出報名</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $session = (int)$_POST["session"];
  $meal = $_POST["meal"];
  $fee = 0;

  if ($user["role"] == "老師") {
    $fee = 0;
  } else {
    $fee = $session + ($meal == "yes" ? 60 : 0);
  }

  echo "<div class='alert alert-success mt-4'>";
  echo "姓名：" . htmlspecialchars($user["name"]) . "<br>";
  echo "身分：" . htmlspecialchars($user["role"]) . "<br>";
  echo "報名費用：" . $fee . " 元";
  echo "</div>";
}
?>

<?php include 'footer.php'; ?>

