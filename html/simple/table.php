<?php
include './common/no-cache.php';

$titleName = "テーブル";
$sidebarLinkSelector = "";
$event = "login";
?>
<!doctype html>

<html lang="ja">
<head>
	<?php include './common/head.php'; ?>
	<style type="text/css">
		@media only screen and (min-width: 400px) {/* 400px以上 */
			
			#job-table > thead > tr th:nth-child(1), #job-table > tbody > tr td:nth-child(1) {
				min-width: 25px;
			}
			#job-table > thead > tr th:nth-child(2), #job-table > tbody > tr td:nth-child(2) {
				min-width: 100px;
			}
			#job-table > thead > tr th:nth-child(3), #job-table > tbody > tr td:nth-child(3) {
				min-width: 170px;
			}
			#job-table > thead > tr th:nth-child(4), #job-table > tbody > tr td:nth-child(4) {
				min-width: 50px;
			}
			#job-table > thead > tr th:nth-child(5), #job-table > tbody > tr td:nth-child(5) {
				min-width: 140px;
			}
			#job-table > thead > tr th:nth-child(6), #job-table > tbody > tr td:nth-child(6) {
				min-width: 70px;
			}
			#job-table > thead > tr th:nth-child(7), #job-table > tbody > tr td:nth-child(7),
			#job-table > thead > tr th:nth-child(8), #job-table > tbody > tr td:nth-child(8) {
				min-width: 140px;
			}
			#job-table > thead > tr th:nth-child(9), #job-table > tbody > tr td:nth-child(9) {
				min-width: 50px;
			}
			#job-table > thead > tr th:nth-child(10), #job-table > tbody > tr td:nth-child(10) {
				min-width: 50px;
			}
			#job-table > thead > tr th:nth-child(11), #job-table > tbody > tr td:nth-child(11),
			#job-table > thead > tr th:nth-child(12), #job-table > tbody > tr td:nth-child(12) {
				min-width: 110px;
			}
			#job-table > thead > tr th:nth-child(13), #job-table > tbody > tr td:nth-child(13),
			#job-table > thead > tr th:nth-child(14), #job-table > tbody > tr td:nth-child(14) {
				min-width: 230px;
			}
			#job-table > thead > tr th:nth-child(15), #job-table > tbody > tr td:nth-child(15) {
				min-width: 150px;
			}
		}
	</style>
	<?php include './common/script.php'; ?>
	<?php 
	$tableSelector = "#job-table";
	$tweakWidth = 25;
	$tweakRollWidth = 20;
	$tweakHeight = 175;
	include './common/table.php';
	?>
	<script type="text/javascript">
	<!--//
	
	$(function(){
		
		$("form").on("submit", function() {
			
			var $checkedEls = $("[name=selected]:checked");
			
			if($checkedEls.notExists()) {
				alert("対象を選択してください。");
				return false;
				
			} else {
				var values = [];
				
				$checkedEls.each(function() {
					values.push($(this).value());
				});
				$("[name=id]").val(values.join(","));
				
				return true;
			}
		});
		
		$("[for=selected-h]").on("click", function() {
			
			if($("#selected-h:checked").exists()) {
				$("[name=selected]").prop("checked", false);
			} else {
				$("[name=selected]").prop("checked", true);
			}
		});
		
		$("#titleLink").attr("href", "#");
	});
	
	//-->
	</script>
</head>
<body>
	<?php include './common/sidebar.php'; ?>
	<div id="main-top" style="position: relative; height: calc(100vh - 5px);">
		
		<?php include './common/header.php';?>
		<main>
			<form action="/table.php">
				<section>
					<fieldset style="">
						<legend><h5>〜操作〜</h5></legend>
						<button type="submit" name="event" value="skip">Skip</button>
						<button type="submit" name="event" value="delete">Delete</button>
					</fieldset>
				</section>
			</form>
			<section>
				<table id="job-table">
					<thead>
						<tr>
							<th><input type="checkbox" id="selected-h" /><label for="selected-h" class="cell-in"></label></th>
							<th>項目１</th>
							<th>項目２</th>
							<th>項目３</th>
							<th>項目４</th>
							<th>項目５</th>
							<th>項目６</th>
							<th>項目７</th>
							<th>項目８</th>
							<th>項目９</th>
							<th>項目０</th>
							<th>項目１</th>
							<th>項目２</th>
							<th>項目３</th>
							<th>項目４</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sringArray = array("aaa","bbb","ccc","ddd","key"=>"val");
						foreach($sringArray as $key => $value){
						?>
						<tr>
							<td><input type="checkbox" id="selected-<?=$key ?>" name="selected" value="<?=$value ?>" /><label for="selected-<?=$key ?>" class="cell-in"></label></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
							<td><?=$value ?></td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
			</section>
		</main>
		
		<?php include './common/footer.php';?>
	</div>
</body>
</html>