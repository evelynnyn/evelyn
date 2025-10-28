<?php
session_start();
require_once 'db.php';

// ✅ 檢查是否為管理員
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'M') {
  echo "<div class='alert alert-danger text-center m-4'>
          只有管理員可以刪除活動
        </div>";
  exit;
}

// ✅ 檢查是否有傳 id
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
}

$id = intval($_GET['id']);
if ($id <= 0) {
  header('Location: index.php');
  exit;
}

// ✅ 執行刪除
$sql = "DELETE FROM event WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: index.php');
exit;
?>
