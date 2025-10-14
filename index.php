<?php
// 載入共用標頭與資料庫連線
include "header.php";
include "db.php";

// 從資料庫讀取活動資料
$sql = "SELECT * FROM event";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($row['description'])) ?></p>

            <!-- ✅ 按鈕改為動態依名稱判斷連結 -->
            <?php if ($row['name'] === '迎新茶會') { ?>
              <a href="status.php" class="btn btn-primary">報名去</a>
            <?php } elseif ($row['name'] === '資管一日營') { ?>
              <a href="conference.php" class="btn btn-primary">報名去</a>
            <?php } else { ?>
              <a href="#" class="btn btn-secondary">更多資訊</a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php
// 關閉資料庫與頁尾
mysqli_close($conn);
include "footer.php";
?>
