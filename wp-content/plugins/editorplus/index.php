<?php

/**
 * Plugin Name:       Editor Plus
 * Plugin URI:		  https://wpeditorplus.com/
 * Description:       Editor Plus extends Gutenberg editor with advanced design controls, icons and more features.
 * Version:           2.2.0
 * Author:            munirkamal
 * Author URI:        https://munirkamal.wordpress.com/
 * License:           GPL-3.0+
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       editor_plus
 */

require_once plugin_dir_path(__FILE__) . 'info/index.php';
require_once plugin_dir_path(__FILE__) . 'Extensions/index.php';
require_once plugin_dir_path(__FILE__) . 'assets/index.php';
require_once plugin_dir_path(__FILE__) . 'blocks/index.php';



define('EDITOR_PLUS_PLUGIN', '1.7.0');



function editors_plus_options_assets()
{

	wp_enqueue_script('editor_plus-plugin-script', plugins_url('/', __FILE__) . 'build/build.js', array('wp-api', 'wp-i18n', 'wp-components', 'wp-element', 'wp-editor'), EDITOR_PLUS_PLUGIN, true);
	wp_enqueue_style('editor_plus-plugin-style', plugins_url('/', __FILE__) . 'build/build.css', array('wp-components'));

	edpl_Information::emit(); // emitting global variables
	$extensions = new edpl_ExtensionsManager();
	$deploy = $extensions->deploy();

	wp_localize_script(
		'editor_plus-plugin-script',
		'editor_plus_extension',
		$deploy->data
	);
}

add_action('init', function () {
	wp_enqueue_style('editor_plus-plugin-style', plugins_url('/', __FILE__) . 'build/build.css', array('wp-components'));


	$extra_css = apply_filters('editor_plus_plugin_css', '');

	wp_add_inline_style('editor_plus-plugin-style', $extra_css);

	if (!is_admin()) {
		wp_enqueue_script('editor_plus-frontend-script', plugins_url('/', __FILE__) . 'build/frontend.js', array('jquery'), 'latest', true);
	}
});


# admin_enqueue_scripts

add_action('admin_enqueue_scripts', function ($suffix) {

	if ($suffix === 'post.php' or $suffix === 'settings_page_editor_plus' or $suffix === 'post-new.php') {
		wp_enqueue_style('editor_plus-plugin-style', plugins_url('/', __FILE__) . 'build/build.css', array('wp-components'), 'final');
		wp_enqueue_script('editor_plus-plugin-script', plugins_url('/', __FILE__) . 'build/build.js', array('wp-api', 'wp-i18n', 'wp-components', 'wp-element', 'wp-editor'), 'final', true);
		wp_enqueue_script('editor_plus-lodash-conflict-script', plugins_url('/', __FILE__) . 'build/lodash-conflict.js', array('wp-api', 'wp-i18n', 'wp-components', 'wp-element', 'wp-editor'), 'fixed', true);


		### LOTTIE SCRIPT

		wp_enqueue_script('editor-plus-lottie-script', plugins_url('/', __FILE__) . '/assets/scripts/lottie-player.js', [], 'latest', true);



		$extra_css = apply_filters('editor_plus_plugin_css', '');
		wp_add_inline_style('editor_plus-plugin-style', $extra_css);

		// localize for editor

		$extensions = new edpl_ExtensionsManager();
		$deploy = $extensions->deploy();

		wp_localize_script(
			'editor_plus-plugin-script',
			'editor_plus_extension',
			$deploy->data
		);

		wp_localize_script(
			'editor_plus-plugin-script',
			'eplus_available_block_categories',
			edpl_Blocks::get_available_categories()
		);

		wp_localize_script(
			'editor_plus-plugin-script',
			'eplus_available_blocks',
			edpl_Blocks::get_blocks()
		);

		wp_localize_script(
			'editor_plus-plugin-script',
			'eplus_data',
			[
				'rest_url' => get_rest_url(),
				'ajax_url' => admin_url('admin-ajax.php'),
				'total_blocks' => wp_count_posts('ghub_blocks')->publish,
				'plugin_assets' => plugins_url('assets', __FILE__)
			]
		);
	}
});

add_action('init', function () {

	$manager = new edpl_ExtensionsManager();
	$manager->deploy();
});

function editor_plus_menu_callback()
{
	echo '<div id="editor-plus-root"></div>';
}

function editor_plus_add_option_menu()
{
	$page_hook_suffix = add_options_page(
		__('Editor Plus', 'editor_plus'),
		__('Editor Plus', 'editor_plus'),
		'manage_options',
		'editor_plus',
		'editor_plus_menu_callback'
	);

	add_action("admin_print_scripts-{$page_hook_suffix}", 'editors_plus_options_assets');
}

add_action('admin_menu', 'editor_plus_add_option_menu');


add_filter('upload_mimes', 'ep_custom_mimes_types', 1, 1);
function ep_custom_mimes_types($ep_mime_types)
{
	$ep_mime_types['json'] = 'text/plain'; // Adding .json extension

	return $ep_mime_types;
}
