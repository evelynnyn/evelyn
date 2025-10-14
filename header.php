<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- ...existing code... -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!-- ...existing code... -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">活動報名系統</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">首頁</a></li>
      <li class="nav-item"><a class="nav-link" href="status.php">迎新茶會</a></li>
      <li class="nav-item"><a class="nav-link" href="conference.php">資管一日營</a></li>
      <li class="nav-item"><a class="nav-link" href="job.php">求才資訊</a></li>
      <li class="nav-item">
        <?php if(isset($_SESSION["user"])): ?>
          <a class="nav-link" href="logout.php">登出</a>
        <?php else: ?>
          <a class="nav-link" href="login.php">登入</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>

<div class="container my-4">