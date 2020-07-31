<?php
/**
 * Studio Pro Theme
 *
 * This file loads scripts and styles for the child theme.
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

add_action( 'wp_enqueue_scripts', 'studio_enqueue_scripts', 20 );
/**
 * Enqueue theme scripts.
 *
 * @since  1.1.0
 *
 * @return void
 */
function studio_enqueue_scripts() {

	// Check if debugging is enabled.
	$folder = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : '/min';
	$suffix = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : '.min';

	// Enqueue fitvids script.
	wp_enqueue_script( 'fitvids', CHILD_THEME_URI . "/assets/scripts{$folder}/jquery.fitvids{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue theme specific scripts.
	wp_enqueue_script( 'studio-pro', CHILD_THEME_URI . "/assets/scripts{$folder}/scripts{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'studio-pro-menus', CHILD_THEME_URI . "/assets/scripts{$folder}/menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menu script.
	wp_localize_script( 'studio-pro-menus', 'genesis_responsive_menu', array(
		'mainMenu'         => __( 'Menu', 'studio-pro' ),
		'subMenu'          => __( 'Menu', 'studio-pro' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	) );
}

add_action( 'wp_enqueue_scripts', 'studio_enqueue_styles', 100 );
/**
 * Enqueue theme styles.
 *
 * @since  1.1.0
 *
 * @return void
 */
function studio_enqueue_styles() {

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Google fonts.
	wp_enqueue_style( 'studio-pro-google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display|Roboto:300,400,500', array(), CHILD_THEME_VERSION );

	// Conditionally load WooCommerce styles.
	if ( studio_is_woocommerce_page() ) {
		wp_enqueue_style( 'studio-pro-woocommerce', CHILD_THEME_URI . '/woocommerce.css', array(), CHILD_THEME_VERSION );
	}
}
