<?php

add_action('init', function () {

	add_filter('block_categories', function ($categories, $post) {
		return array_merge(
			array(
				array(
					'slug'  => 'ep-editorplus-blocks',
					'title' => 'Editor Plus Blocks',
				),
			),
			$categories
		);
	}, 10, 2);


	$wp_post = get_post(
		url_to_postid("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']),
		'_wpg_def_keyword',
		true
	);

	wp_register_script(
		'editorplus-progressbar-script',
		plugins_url('/assets/scripts/progressbar.js', dirname(__FILE__)),
		array('jquery'),
		'new',
		true
	);

	wp_register_script(
		'editorplus-toggles-script',
		plugins_url('/assets/scripts/toggles.js', dirname(__FILE__)),
		array('jquery'),
		'new',
		true
	);

	wp_register_script(
		'editorplus-counter-script',
		plugins_url('/assets/scripts/counter.js', dirname(__FILE__)),
		array('jquery'),
		'update',
		true
	);

	wp_register_script(
		'editorplus-tabs-script',
		plugins_url('/assets/scripts/tabs.js', dirname(__FILE__)),
		array('jquery'),
		'latest',
		true
	);

	wp_register_script(
		'editorplus-countdown-script',
		plugins_url('/assets/scripts/countdown.js', dirname(__FILE__)),
		array('jquery'),
		'updaedade',
		true
	);

	// wp_register_script(
	// 	'editorplus-toc-script',
	// 	plugins_url('/assets/scripts/toc.js', dirname(__FILE__)),
	// 	array('jquery'),
	// 	'latessts',
	// 	true
	// );

	wp_register_script(
		'editorplus-lottie-player-script',
		plugins_url('/assets/scripts/lottie-player.js', dirname(__FILE__)),
		array('jquery'),
		'latest',
		true
	);

	##### REGISTERING BLOCK TYPES
	$progress_bar_assets = array(
		'script'         => !is_admin() ? 'editorplus-progressbar-script' : '',
	);

	if (!has_block('ep/progress-bar', $wp_post)) :
		unset($progress_bar_assets['script']);
	endif;

	register_block_type(
		'ep/progress-bar',
		$progress_bar_assets
	);

	$toggles_assets = array(
		'script'         => !is_admin() ? 'editorplus-toggles-script' : '',
	);


	if (!has_block('ep/toggles', $wp_post)) :
		unset($toggles_assets['script']);
	endif;

	register_block_type(
		'ep/toggles',
		$toggles_assets
	);

	$counter_assets = array(
		'script'         => !is_admin() ? 'editorplus-counter-script' : '',
	);

	if (!has_block('ep/counter', $wp_post)) :
		unset($counter_assets['script']);
	endif;

	register_block_type(
		'ep/counter',
		$counter_assets
	);

	$tabs_assets = array(
		'script'         => !is_admin() ? 'editorplus-tabs-script' : '',
	);

	if (!has_block('ep/tabs', $wp_post)) :
		unset($tabs_assets['script']);
	endif;

	register_block_type(
		'ep/tabs',
		$tabs_assets
	);

	$countdown_assets = array(
		'script'         => !is_admin() ? 'editorplus-countdown-script' : '',
	);

	if (!has_block('ep/countdown', $wp_post)) :
		unset($countdown_assets['script']);
	endif;

	register_block_type(
		'ep/countdown',
		$countdown_assets
	);

	
	// $toc_assets = array(
	// 	'script'         => !is_admin() ? 'editorplus-toc-script' : '',
	// );

	// if (!has_block('ep/table-of-content', $wp_post)) :
	// 	unset($toc_assets['script']);
	// endif;

	// register_block_type(
	// 	'ep/table-of-content',
	// 	$toc_assets
	// );

	$lottie_assets = array(
		'script' => !is_admin() ? 'editorplus-lottie-player-script' : '',
	);

	if (!has_block('ep/lottie', $wp_post)) :
		unset($lottie_assets['script']);
	endif;

	register_block_type(
		'ep/lottie',
		$lottie_assets
	);


});
