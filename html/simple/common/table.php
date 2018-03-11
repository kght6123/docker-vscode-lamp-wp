<?php
$sidebarSize = 245;
$tableCutBackWidthSidebar = $sidebarSize + $tweakWidth;
$tableCutBackWidth = $tweakWidth;
$tableCutBackHeight = $sidebarSize + $tweakRollWidth;
?>

<style type="text/css">
@media only screen and (min-width: 850px) {/* 850px以上 */
	<?=$tableSelector ?>.always > thead {
		width: calc(100vw - <?=$tableCutBackWidthSidebar ?>px);
	}
	<?=$tableSelector ?>.always > tbody {
		width: calc(100vw - <?=$tableCutBackWidthSidebar ?>px);
	}
	<?=$tableSelector ?> > thead {
		width: calc(100vw - <?=$tableCutBackWidth ?>px);
	}
	<?=$tableSelector ?> > tbody {
		width: calc(100vw - <?=$tableCutBackWidth ?>px);
	}
}
@media only screen and (min-width: 400px) and (max-width: 849px) {/* 400px以上、849px以下 */
	<?=$tableSelector ?> > thead {
		width: calc(100vw - <?=$tableCutBackWidth ?>px);
	}
	<?=$tableSelector ?> > tbody {
		width: calc(100vw - <?=$tableCutBackWidth ?>px);
	}
}
@media only screen and (min-width: 400px) {/* 400px以上 */
	<?=$tableSelector ?> > tbody {
		height: calc(100vh - <?=$tweakHeight ?>px);
	}
}
@media only screen and (max-width: 400px) {/* 400px以上 */
	<?=$tableSelector ?> > tbody {
		height: calc(100vh - <?=$tweakHeight ?>px);
	}
	<?=$tableSelector ?> > thead {
		height: calc(100vh - <?=$tweakHeight ?>px);
	}
}
</style>
<script type="text/javascript">
<!--//

$(function(){
	$("<?=$tableSelector ?> > tbody").on("scroll", function() {
		if (window.matchMedia('(min-width:400px)').matches) {/* 400px以上 */
			$("<?=$tableSelector ?> > thead").scrollLeft($(this).scrollLeft());
		} else {
			$("<?=$tableSelector ?> > thead").scrollTop($(this).scrollTop());
		}
	});
	$("<?=$tableSelector ?> tbody tr").on("click", function() {
		if($("[type=checkbox]", this).prop("checked")) {
			$("[type=checkbox]", this).prop("checked", false);
		} else {
			$("[type=checkbox]", this).prop("checked", true);
		}
	});
	$("[for=selected-h]").on("click", function() {
		if($("#selected-h:checked").exists()) {
			$("[name=selected]").prop("checked", false);
		} else {
			$("[name=selected]").prop("checked", true);
		}
	});
	
	$("[id^='selected-'][id!='selected-h']").on("click", function() {
		if($(this).prop("checked")) {
			$("#selected-h").prop("checked", false);
		}
	});
});

//-->
</script>