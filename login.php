<?php
session_start();
include 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (isset($users[$username]) && $users[$username]["password"] == $password) {
    $_SESSION["user"] = $users[$username];
    $_SESSION["username"] = $username;

    $redirect = $_SESSION["redirect_to"] ?? "index.php";
    unset($_SESSION["redirect_to"]);
    header("Location: $redirect");
    exit;
  } else {
    $error = "帳號或密碼錯誤！";
  }
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