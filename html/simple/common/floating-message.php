
<script type="text/javascript">
<!--//
	$(function(){
		$.blockUI({
			message: '<?=$message ?>',
			onOverlayClick: $.unblockUI,
			timeout: 2000,
			fadeIn: 700,
			fadeOut: 700,
			css: {
				backgroundColor: 'rgba(33,33,33 ,1)',
				color: 'rgba(250,250,250 ,1)',
				opacity: .6,
				border: 'none',
				padding: '10px'
			}
		});
	});
//-->
</script>
