<?php
include './common/no-cache.php';

$titleName = "インラインフレームサンプル";
$sidebarLinkSelector = "";
$event = "iframe";

session_start();
?>
<!doctype html>

<html lang="ja">
<head>
	<?php include './common/head.php'; ?>
	<style type="text/css">
		iframe {
			height: calc(100vh - 5px);
			border: none;
		}
		@media only screen and (min-width: 850px) {/* 850px以上 */
			iframe {
				width: calc(100vw - 15px);
			}
			iframe.always {
				width: calc(100vw - 215px);
			}
		}
		@media only screen and (max-width: 849px) {/* 849px以下 */
			iframe {
				width: calc(100vw - 15px);
			}
		}
	</style>
	<?php include './common/script.php'; ?>
</head>
<body>
	<?php include './common/sidebar.php'; ?>
	<div id="main-top">
		<button id="menu-button" style="position: fixed;top: 7px;"></button>
		<!-- iframe内もEdgeの互換モードになるので注意 -->
		<iframe src='../sample/index.php'></iframe>
	</div>
</body>
</html>