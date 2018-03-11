<?php
include './common/no-cache.php';

$titleName = "ログイン";
$sidebarLinkSelector = "";
$event = "login";

session_start();
$loginFlag = array_key_exists(‘username’, $_SESSION);
if($loginFlag) {
    $titleName = "ログアウト";
    $event = "logout";
}
?>
<!doctype html>

<html lang="ja">
<head>
    <?php include './common/head.php'; ?>
	<style type="text/css">
		.center-middle {
			margin: auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			position: absolute;
		}
		
		.center-none {
			margin: 0 auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			position: absolute;
		}
		
		input[type="text"], input[type="password"] {
			width:150px;
			height:35px;
			margin:5px;
		}
		input[type="submit"] {
			width:120px;
			height:35px;
		}
    </style>
    <?php include './common/script.php'; ?>
</head>
<body>
    <?php include './common/sidebar.php'; ?>
	<div id="main-top" style="position: relative; height: calc(100vh - 5px);">

        <?php include './common/header.php';?>
		<form action="/top.php">
			<input type="hidden" name="event" value="<?=$event?>" />
			<main>
				<section>
					<div class="center-middle" style="width:calc(100vw / 1.5); height:calc(100vh / 1.75);">
						<div class="center-middle" style="width:100%;top: calc( 50% - 75px );">
							<div class="center-none" style="width:176px;">
								<input type="text" name="userId" placeholder="ユーザID" required＝true <?=$loginFlag ? "readonly" : "" ?> />
								<input type="password" name="password" placeholder="パスワード" required＝true <?=$loginFlag ? "readonly" : "" ?> />
							</div>
						</div>
						<div class="center-middle" style="width:100%;top: calc( 50% + 60px );">
							<div class="center-none" style="width:130px;">
								<input type="submit" id="btn" class="center-none" value="<?=$titleName?>"/>
							</div>
						</div>
					</div>
				</section>
			</main>
		</form>
		<?php include './common/footer.php';?>
	</div>
</body>
</html>