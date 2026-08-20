<?php

/**
 * Functions
 */
/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');

/**
 * CSSとJavaScriptの読み込み
 *
 */
function my_script_init()
{
	// バージョン管理（キャッシュ対策：ファイルの更新日時を使用）+minファイルがあればそれを使用、なければ通常のファイルを使用
	$css_file = get_template_directory() . (file_exists(get_template_directory() . '/assets/css/styles.min.css') ? '/assets/css/styles.min.css' : '/assets/css/styles.css');
	$js_file  = get_template_directory() . (file_exists(get_template_directory() . '/assets/js/script.min.js')  ? '/assets/js/script.min.js'  : '/assets/js/script.js');
	$css_version = file_exists($css_file) ? filemtime($css_file) : '1.0.0';
	$js_version  = file_exists($js_file)  ? filemtime($js_file)  : '1.0.0';
	$css_rel = str_replace(get_template_directory(), '', $css_file);
	$js_rel  = str_replace(get_template_directory(), '', $js_file);


	// jQueryの読み込み
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);

	// Swiper CSS 8.3.2
	wp_enqueue_style('swiper-8.3.2', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '8.3.2', 'all');

	// Google Fonts Noto Sans JP
	wp_enqueue_style('GoogleFonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array(), null);

	// カスタムCSS
	wp_enqueue_style('custom-style', get_template_directory_uri() . $css_rel, array(), $css_version, 'all');

	// Swiper JS 8.3.2
	wp_enqueue_script('swiper-8.3.2', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '8.3.2', true);

	// カスタムJS
	wp_enqueue_script('custom', get_template_directory_uri() . $js_rel, array('jquery'), $js_version, true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


/**
 * 投稿タイプごとに異なるアーカイブの表示件数を指定
 *
 * 参考：https://webcreatetips.com/coding/152/
 */
function change_posts_per_page($query)
{
	if (is_admin() || ! $query->is_main_query()) {
		return;
	}
	if ($query->is_post_type_archive('works')) {
		$query->set('posts_per_page', 9);
	}
	if ($query->is_tax('case')) {
		$query->set('posts_per_page', 9);
	}
}
add_action('pre_get_posts', 'change_posts_per_page');


/**
 * 管理メニューの「投稿」に関する表示を「NEWS（任意）」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'NEWS';
	$submenu['edit.php'][5][0] = 'NEWS一覧';
	$submenu['edit.php'][10][0] = '新しいNEWS';
	$submenu['edit.php'][16][0] = 'タグ';
}


/**
 * 管理画面上の「投稿」に関する表示を「NEWS」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'NEWS';
	$labels->singular_name = 'NEWS';
	$labels->add_new = _x('追加', 'NEWS');
	$labels->add_new_item = 'NEWSの新規追加';
	$labels->edit_item = 'NEWSの編集';
	$labels->new_item = '新規NEWS';
	$labels->view_item = 'NEWSを表示';
	$labels->search_items = 'NEWSを検索';
	$labels->not_found = '記事が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');


/**
 * Contact Form 7 : フォーム送信完了後にサンクスページへリダイレクト
 */
function contact_form_redirect_script()
{
	if (is_page('contact')) {
?>
		<script>
			document.addEventListener('wpcf7mailsent', function(event) {
				if ('6' == event.detail.contactFormId) {
					setTimeout(function() {
						window.location.href = '<?php echo home_url('/thanks/'); ?>';
					}, 500);
				}
			}, false);
		</script>
<?php
	}
}
add_action('wp_footer', 'contact_form_redirect_script');
