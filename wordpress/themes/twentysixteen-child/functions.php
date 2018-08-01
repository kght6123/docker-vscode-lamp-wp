<?php

function kght_theme_enqueue_styles() {
	// 親CSSの読み込み
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );

	// 親CSSを継承して、子CSSの読み込み
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

	date_default_timezone_set('Asia/Tokyo');

	$kght_style_mode = get_query_var('kght_style_mode', 'none');
	$time_hour = idate('H');

	// http://localhost:28080/?kght_style_mode=light
	// http://localhost:28080/?kght_style_mode=dark

	if (strcmp($kght_style_mode, 'light') == 0) {
		kght_light_enqueue_styles();
	} elseif (strcmp($kght_style_mode, 'dark') == 0) {
		kght_dark_enqueue_styles();
	} elseif (5 <= $time_hour && $time_hour <= 17) { // 4時～17時の時間帯のとき
		kght_light_enqueue_styles();
	} elseif (17 <= $time_hour && $time_hour <= 24) { // 17時～24時の時間帯のとき
		kght_dark_enqueue_styles();
	} else {
		kght_dark_enqueue_styles();
	}
}
function kght_dark_enqueue_styles(){
	// ダークテーマの読み込み
	wp_enqueue_style('dark-style', get_stylesheet_directory_uri() . '/dark.css', array('child-style'));
}
function kght_light_enqueue_styles(){
	// ライトテーマの読み込み
	wp_enqueue_style('light-style', get_stylesheet_directory_uri() . '/light.css', array('child-style'));
}
function kght_add_query_vars_filter( $vars ){
	$vars[] = "kght_style_mode";
	return $vars;
}

// テーマスタイル読み込みアクションをスクリプトキューに追加
add_action('wp_enqueue_scripts', 'kght_theme_enqueue_styles');

// カスタムクエリ変数を追加
add_filter('query_vars', 'kght_add_query_vars_filter');

// wordpressにインストールされているjqueryを無効にする関数
add_filter('init',function(){
	if (!is_admin()){
		wp_deregister_script('jquery');
	}
});
?>
<?php
	// GistのURLを貼り付けた時のハンドラーを登録
	wp_embed_register_handler( 'gist', '/https?:\/\/gist\.github\.com\/([a-z0-9]+)\/([a-z0-9]+)(\?file=.*)?/i', function( $matches, $attr, $url, $rawattr ) {
		// GistのScriptタグを埋め込む
		$embed = sprintf(
			'<script src="https://gist.github.com/%1$s/%2$s.js%3$s"></script>',
			esc_attr( $matches[1] ),
			esc_attr( $matches[2] ),
			esc_attr( $matches[3] )
			);
		// タグ（embed_gist）に付与されたコールバック関数を更に呼び出し
		return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
	});
?>