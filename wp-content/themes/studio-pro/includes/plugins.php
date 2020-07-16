<?php
/**
 * Studio Pro Theme
 *
 * This file registers the required plugins for the child theme.
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

// Load tgmpa class.
require_once __DIR__ . '/tgmpa.php';

add_action( 'tgmpa_register', 'studio_register_required_plugins' );
/**
 * Register required plugins.
 *
 * @since 1.0.0
 *
 * @return void
 */
function studio_register_required_plugins() {
	$plugins = array();

	$plugins[] = array(
		'name'     => 'Genesis eNews Extended',
		'slug'     => 'genesis-enews-extended',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'Genesis Portfolio Pro',
		'slug'     => 'genesis-portfolio-pro',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'Genesis Simple FAQ',
		'slug'     => 'genesis-simple-faq',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'Genesis Testimonial Slider',
		'slug'     => 'wpstudio-testimonial-slider',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'Icon Widget',
		'slug'     => 'icon-widget',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'One Click Demo Import',
		'slug'     => 'one-click-demo-import',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'Simple Social Icons',
		'slug'     => 'simple-social-icons',
		'required' => false,
	);

	$plugins[] = array(
		'name'     => 'WP Featherlight',
		'slug'     => 'wp-featherlight',
		'required' => false,
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$plugins[] = array(
			'name'     => 'Genesis Connect WooCommerce',
			'slug'     => 'genesis-connect-woocommerce',
			'required' => false,
		);
	}

	$config = array(
		'id'           => 'studio-pro',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
