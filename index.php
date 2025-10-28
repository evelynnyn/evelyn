<?php
session_start();
include "header.php";
include "db.php";

// 從資料庫讀取活動資料
$sql = "SELECT * FROM event ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3>活動資料</h3>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'M') { ?>
      <a href="activity_insert.php" class="btn btn-primary">➕ 新增活動</a>
    <?php } ?>
  </div>

  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($row['description'])) ?></p>

            <!-- 報名按鈕 -->
            <?php if ($row['name'] === '迎新茶會') { ?>
              <a href="status.php" class="btn btn-success btn-sm">報名去</a>
            <?php } elseif ($row['name'] === '資管一日營') { ?>
              <a href="conference.php" class="btn btn-success btn-sm">報名去</a>
            <?php } else { ?>
              <a href="#" class="btn btn-secondary btn-sm">更多資訊</a>
            <?php } ?>

            <!-- 刪除按鈕（只有管理員能看到） -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'M') { ?>
              <a href="activity_delete.php?id=<?= $row['id'] ?>"
                 class="btn btn-danger btn-sm float-end"
                 onclick="return confirm('確定要刪除這個活動嗎？');">刪除</a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php
mysqli_close($conn);
include "footer.php";
?>
