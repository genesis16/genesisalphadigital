<?php
/**
 * Studio Pro Theme
 *
 * @package   SeoThemes\StudioPro
 * @link      https://seothemes.com/themes/studio-pro
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Start the engine (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Load theme setup functions.
include_once  __DIR__ . '/includes/setup.php';

// Load helper functions.
include_once  __DIR__ . '/includes/helpers.php';

// Load general functionality.
include_once  __DIR__ . '/includes/general.php';

// Load scripts and styles.
include_once  __DIR__ . '/includes/enqueue.php';

// Load hero section.
include_once  __DIR__ . '/includes/hero.php';

// Load widget areas.
include_once  __DIR__ . '/includes/widgets.php';

// Load Customizer settings.
include_once  __DIR__ . '/includes/customize.php';

// Load Customizer CSS output.
include_once  __DIR__ . '/includes/output.php';

// Load default settings.
include_once  __DIR__ . '/includes/defaults.php';

// Load recommended plugins.
include_once  __DIR__ . '/includes/plugins.php';

add_action( 'get_header', 'remove_primary_sidebar_single_pages' );

function remove_primary_sidebar_single_pages() {
if ( is_singular('page') && !is_page_template( 'page_blog.php' ) ) {
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
}}

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
