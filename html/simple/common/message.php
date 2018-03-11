
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
	
	.messageArea {
		padding: 10px;
		overflow-x: auto;
		overflow-y: auto;
		
		/* box-shadow */
		box-shadow:0px 0px 20px 0px rgba(0,0,0,0.2);
		-moz-box-shadow:0px 0px 20px 0px rgba(0,0,0,0.2);
		-webkit-box-shadow:0px 0px 20px 0px rgba(0,0,0,0.2);
		
		word-wrap: break-word;
	}
	.messageArea pre code {
		font-weight: bold;
	}
	
</style>
<section>
	<div class="center-middle messageArea <?=$styleClass ?>" style="width:calc(100vw / 1.5); height:calc(100vh / 1.4);">
		<?php if($sourceCode == true) { ?>
			<pre><code><?=$message ?></code></pre>
		<?php } else { ?>
			<?=$message ?>
		<?php } ?>
	</div>
</section>