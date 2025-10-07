<?php
include 'header.php';

if (!isset($_SESSION["user"])) {
  $_SESSION["redirect_to"] = $_SERVER["REQUEST_URI"];
  header("Location: login.php");
  exit;
}

$user = $_SESSION["user"];
?>

<h2 class="mb-4">資管一日營報名表單</h2>
<p>費用：上午場 150 元、下午場 100 元、午餐 60 元（老師免費）</p>

<form method="post">
  <div class="mb-3">
    <label class="form-label">姓名：</label>
    <input type="text" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" disabled>
  </div>

  <div class="mb-3">
    <label class="form-label">選擇場次：</label><br>
    <input type="checkbox" name="session[]" value="150"> 上午場(150元)
    <input type="checkbox" name="session[]" value="100"> 下午場(100元)
    <input type="checkbox" name="session[]" value="60"> 午餐(60元)
  </div>

  <button type="submit" class="btn btn-primary">送出報名</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $session = $_POST["session"] ?? [];
  $fee = 0;

  if ($user["role"] == "老師") {
    $fee = 0;
  } else {
    foreach ($session as $value) {
      $fee += (int)$value;
    }
  }

  echo "<div class='alert alert-success mt-4'>";
  echo "姓名：" . htmlspecialchars($user["name"]) . "<br>";
  echo "身分：" . htmlspecialchars($user["role"]) . "<br>";
  echo "報名費用：" . $fee . " 元";
  echo "</div>";
}
?>

<?php include 'footer.php'; ?>
