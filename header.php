<?php

$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">活動報名系統</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link <?php if($current_page=='index.php') echo 'active'; ?>" href="index.php">首頁</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($current_page=='system.php') echo 'active'; ?>" href="system.php">活動報名系統</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($current_page=='conference.php') echo 'active'; ?>" href="conference.php">資管一日營</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($current_page=='status.php') echo 'active'; ?>" href="status.php">迎新茶會</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
