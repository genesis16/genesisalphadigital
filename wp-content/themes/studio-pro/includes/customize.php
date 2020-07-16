<?php
/**
 * Studio Pro Theme
 *
 * This file adds customizer settings to the child theme.
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

/*
 * Add any theme custom colors here.
 */
$studio_colors = array(
	'gradient_left'  => 'rgba(100,66,255,0.9)',
	'gradient_right' => 'rgba(12,180,206,0.9)',
);

add_action( 'customize_register', 'studio_customize_register' );
/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @since  1.0.0
 *
 * @param  object $wp_customize Global customizer object.
 *
 * @return void
 */
function studio_customize_register( $wp_customize ) {

	// Globals.
	global $wp_customize, $studio_colors;

	// Load RGBA Customizer control.
	include_once( get_stylesheet_directory() . '/includes/rgba.php' );

	// Add logo size setting.
	$wp_customize->add_setting(
		'studio_logo_size',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 100,
			'sanitize_callback' => 'studio_sanitize_number',
		)
	);

	// Add logo size control.
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'studio_logo_size',
		array(
			'label'       => __( 'Logo Size', 'studio-pro' ),
			'description' => __( 'Set the logo size in pixels. Default is 100.', 'studio-pro' ),
			'settings'    => 'studio_logo_size',
			'section'     => 'title_tagline',
			'type'        => 'number',
			'priority'    => 8,
		)
	) );

	// Add sticky header settings.
	$wp_customize->add_setting( 'studio_sticky_header',
		array(
			'capability' => 'edit_theme_options',
			'default'    => false,
		)
	);

	// Add sticky header controls.
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'studio_sticky_header',
		array(
			'label'    => __( 'Enable sticky header', 'studio-pro' ),
			'settings' => 'studio_sticky_header',
			'section'  => 'genesis_layout',
			'type'     => 'checkbox',
		)
	) );

	// Add header settings.
	$wp_customize->add_setting( 'studio_blog_layout',
		array(
			'capability' => 'edit_theme_options',
			'default'    => 'masonry',
		)
	);

	// Add header controls.
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'studio_blog_layout',
		array(
			'label'    => __( 'Blog Layout', 'studio-pro' ),
			'settings' => 'studio_blog_layout',
			'section'  => 'genesis_layout',
			'type'     => 'select',
			'choices'  => array(
				'default' => 'Default',
				'masonry' => 'Masonry',
			),
		)
	) );

	/**
	 * Custom colors.
	 *
	 * Loop through the global variable array of colors and register a customizer
	 * setting and control for each. To add additional color settings, do not
	 * modify this function, instead add your color name and hex value to
	 * the $studio_colors` array at the start of this file.
	 */
	foreach ( $studio_colors as $id => $rgba ) {

		// Format ID and label.
		$setting = "studio_{$id}_color";
		$label   = ucwords( str_replace( '_', ' ', $id ) ) . __( ' Color', 'studio-pro' );

		// Add color setting.
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => $rgba,
				'sanitize_callback' => 'studio_sanitize_rgba_color',
			)
		);

		// Add color control.
		$wp_customize->add_control(
			new RGBA_Customize_Control(
				$wp_customize,
				$setting,
				array(
					'section'      => 'colors',
					'label'        => $label,
					'settings'     => $setting,
					'show_opacity' => true,
					'palette'      => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				)
			)
		);
	}
}
