<?php
session_start();
include "header.php";
include "db.php";

// ✅ 檢查是否為管理員
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'M') {
  echo "<div class='alert alert-danger text-center m-4'>
          只有管理員可以新增活動
        </div>";
  include "footer.php";
  exit;
}

// ✅ 表單送出時寫入資料庫
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $desc = $_POST["description"];

  $sql = "INSERT INTO event (name, description) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $name, $desc);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>

<div class="container mt-4">
  <h3 class="text-center mb-4">新增活動</h3>

  <form method="post">
    <div class="mb-3">
      <label class="form-label">活動名稱：</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">活動說明：</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">新增</button>
    <a href="index.php" class="btn btn-secondary">取消</a>
  </form>
</div>

<?php include "footer.php"; ?>
