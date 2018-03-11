<?php
include './common/no-cache.php';

$titleName = "システムエラー";
$sidebarLinkSelector = "";
$event = "error";

session_start();
?>
<!doctype html>

<html lang="ja">
<head>
	<?php include './common/head.php'; ?>
	<?php include './common/script.php'; ?>
</head>
<body>
	<?php include './common/sidebar.php'; ?>
	<div id="main-top" style="position: relative; height: calc(100vh - 5px);">
		
		<?php include './common/header.php';?>
		<main>
			<?php 
			$errorMessage = "エラーメッセージや";
			$fullStackTrace = "スタックトレースなど";
			$message = $errorMessage . "\r\n" . $fullStackTrace;
			$styleClass = "error";
			$sourceCode = true;
			include './common/message.php';
			?>
		</main>
		<?php include './common/footer.php';?>
	</div>
</body>
</html>