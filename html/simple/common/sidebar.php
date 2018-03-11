<script type="text/javascript">
<!--//

$(function(){
	$(".sub-menu-nav").hide();
	$(".sub-menu").on("mouseenter", function() {
		$(".sub-menu-nav", $(this)).show();
	});
	$("#sidebar").on("mouseleave", function() {
		$(".sub-menu-nav").hide();
	});
	
	// alwaysが設定されているタグを調べて、対象を勝手に取得できる様にしたい
	var alwaysMode = true;
	
	var changeAlwaysMode = function(_alwaysMode) {
		
		if (_alwaysMode) {
			$("#sidebar").addClass("always");
			$("#main-top").addClass("always");
			$("#job-table").addClass("always");
			$("iframe").addClass("always");
			$("#menu-button").addClass("open").removeClass("close");
			alwaysMode = true;
		} else {
			$("#sidebar").removeClass("always");
			$("#main-top").removeClass("always");
			$("#job-table").removeClass("always");
			$("iframe").removeClass("always");
			$("#menu-button").addClass("close").removeClass("open");
			alwaysMode = false;
		}
	};
	changeAlwaysMode(true);
	
	$("#menu-button").on("mouseenter", function() {
		if (window.matchMedia('(max-width:849px)').matches) {/* 849px以下 */
			$("#sidebar").addClass("floating");
			changeAlwaysMode(false);
		}
	});
	$("#main-top").on("mouseenter", function() {
		if (window.matchMedia('(max-width:849px)').matches) {/* 849px以下 */
			$("#sidebar").removeClass("floating");
			changeAlwaysMode(true);
		}
	});
	
	$("#menu-button").on("click", function() {
		if (window.matchMedia('(min-width: 850px)').matches) {/* 850px以上 */
			if(alwaysMode) {
				changeAlwaysMode(false);
			} else {
				changeAlwaysMode(true);
			}
		} else {
			$("#sidebar").addClass("floating");
			changeAlwaysMode(false);
		}
		return false;
	});
});

//-->
</script>

<aside id="sidebar">
	<h5 id="sidebar-header">Server-Name</h5>
	<nav>
		<ul id="main-menu">
			<li><a href="top.php">Top</a></li>
			<li class="sub-menu">
				<a>Main-1</a>
				<ul class="sub-menu-nav">
					<li class="subsub-menu"><a class="subsub-menu-head">Sub1-1</a>
						<ul class="subsub-menu-nav">
							<li><a href="./table.php">Sub1-1-1</a></li>
							<li><a href="./table.php">Sub1-1-2</a></li>
						</ul>
					</li>
					<li><a href="#">Sub1-2</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a>Main-2</a>
				<ul class="sub-menu-nav">
					<li><a href="#">Sub-2-1</a></li>
					<li class="subsub-menu"><a class="subsub-menu-head">Sub-2-2</a>
						<ul class="subsub-menu-nav">
							<li><a href="./table.php">Sub-2-2-1</a></li>
							<li><a href="./table.php">Sub-2-2-2</a></li>
							<li><a href="./table.php">Sub-2-2-3</a></li>
							<li><a href="./table.php">Sub-2-2-4</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="./table.php">Main-3</a></li>
			<li><a href="mailto:i.feeling.song@gmail.com">問合せ</a></li>
		</ul>
	</nav>
</aside>