<?php
session_start();
require_once 'db.php'; // ✅ 改成載入資料庫連線

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $account = $_POST["username"];
  $password = $_POST["password"];

  // ✅ 避免 SQL Injection，使用預備語法（Prepared Statement）
  $stmt = $conn->prepare("SELECT * FROM user WHERE account = ? AND password = ?");
  $stmt->bind_param("ss", $account, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    $_SESSION["user"] = $user;
    $_SESSION["username"] = $user['account'];
    $_SESSION["role"] = $user['role'];

    $redirect = $_SESSION["redirect_to"] ?? "index.php";
    unset($_SESSION["redirect_to"]);
    header("Location: $redirect");
    exit;
  } else {
    $error = "帳號或密碼錯誤！";
  }

  $stmt->close();
  $conn->close();
}
?>

<?php include 'header.php'; ?>

<h2 class="text-center mb-4">登入</h2>

<form method="post" class="mx-auto" style="max-width: 400px;">
  <div class="mb-3">
    <label class="form-label">帳號：</label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">密碼：</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>
  <button type="submit" class="btn btn-primary w-100">登入</button>
</form>

<?php include 'footer.php'; ?>
