<?php

function kght_theme_enqueue_styles() {
	// 親CSSの読み込み
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );

	// 親CSSを継承して、子CSSの読み込み
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
	
}
// テーマスタイル読み込みアクションをスクリプトキューに追加
add_action('wp_enqueue_scripts', 'kght_theme_enqueue_styles');

// wordpressにインストールされているjqueryを無効にする関数
// add_filter('init',function(){
// 	if (!is_admin()){
// 		wp_deregister_script('jquery');
// 	}
// });
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