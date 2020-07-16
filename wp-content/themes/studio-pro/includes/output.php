<?php
/**
 * Studio Pro Theme
 *
 * This file adds customizer output to the child theme.
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

add_action( 'wp_enqueue_scripts', 'studio_customizer_output', 100 );
/**
 * Output customizer styles.
 *
 * Checks the settings for the colors defined in the settings. If any of these
 * values are set the appropriate CSS is output.
 *
 * @since 1.0.0
 *
 * @throws Exception Bad color format.
 *
 * @return void
 */
function studio_customizer_output() {

	// Defined at the top of this file.
	global $studio_colors;

	// Other customizer settings.
	$logo_size = get_theme_mod( 'studio_logo_size', 100 );

	/**
	 * Loop though each color in the global array of theme colors and create a new
	 * variable for each. This is just a shorthand way of creating multiple
	 * variables that we can reuse. The benefit of using a foreach loop
	 * over creating each variable manually is that we can just
	 * declare the colors once in the `$studio_colors` array,
	 * and they can be used in multiple ways.
	 */
	foreach ( $studio_colors as $id => $hex ) {
		${"$id"} = get_theme_mod( "studio_{$id}_color", $hex );
	}

	// Load color class.
	include_once( get_stylesheet_directory() . '/includes/colors.php' );

	// Initialize accent color.
	$accent = new Studio_Pro_Color( studio_rgba_to_hex( $gradient_left ) );
	$mix    = '#' . $accent->mix( studio_rgba_to_hex( $gradient_right ) );

	// Ensure $css var is empty.
	$css = '';

	/**
	 * Build the CSS.
	 *
	 * We need to concatenate each one of our colors to the $css variable, but
	 * first check if the color has been changed by the user from the theme
	 * customizer. If the theme mod is not equal to the default color then
	 * the string is appended to $css.
	 */
	$css .= ( $studio_colors['gradient_left'] !== $gradient_left || $studio_colors['gradient_right'] !== $gradient_right ) ? "
				
		.hero-section:before,
		.before-footer:before,
		.front-page-4:before {
			background: {$gradient_left};
			background: -moz-linear-gradient(-45deg,  {$gradient_left} 0%, {$gradient_right} 100%);
			background: -webkit-linear-gradient(-45deg,  {$gradient_left} 0%,{$gradient_right} 100%);
			background: linear-gradient(135deg,  {$gradient_left} 0%,{$gradient_right} 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{$gradient_left}', endColorstr='{$gradient_right}',GradientType=1 );
		}

		a,
		.button.white,
		button.white,
		input[type='button'].white,
		input[type='reset'].white,
		input[type='submit'].white,
		.entry-title a:hover,
		.entry-title a:focus,
		.site-footer .menu-item a:hover,
		.site-footer .menu-item a:focus,
		.archive-pagination a:hover,
		.archive-pagination .active a,
		.archive-pagination a:focus {
			color: {$mix};
		}

		input:focus,
		select:focus,
		textarea:focus {
			border-color: {$mix};
		}

		.has-fixed-header .site-header.shrink,
		.button.secondary,
		button.secondary,
		input[type='button'].secondary,
		input[type='reset'].secondary,
		input[type='submit'].secondary,
		.footer-widgets .enews input[type='submit'] {
			background-color: {$mix};
		}

		" : '';

	$css .= ( 100 !== $logo_size ) ? sprintf( '

		.wp-custom-logo .title-area {
			max-width: %1$spx;
		}

		', $logo_size ) : '';

	// WooCommerce only styles.
	if ( class_exists( 'WooCommerce' ) && studio_is_woocommerce_page() ) {

		$css .= ( $studio_colors['gradient_left'] !== $gradient_left || $studio_colors['gradient_right'] !== $gradient_right ) ? "

		.woocommerce .widget_layered_nav_filters ul li a:before,
		.woocommerce .widget_layered_nav ul li.chosen a:before,
		.woocommerce .widget_rating_filter ul li.chosen a:before,
		.woocommerce .woocommerce-breadcrumb a:focus,
		.woocommerce .woocommerce-breadcrumb a:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce ul.products li.product:focus h2,
		.woocommerce ul.products li.product:hover h2,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce #respond input#submit.white,
		.woocommerce a.button.alt.white,
		.woocommerce a.button.white,
		.woocommerce button.button.alt.white,
		.woocommerce button.button.white,
		.woocommerce input.button.alt.white,
		.woocommerce input.button.white,
		.woocommerce input.button[type=submit].alt.white,
		.woocommerce input.button[type=submit].white {
			color: {$mix};
		}

		.woocommerce span.onsale,
		.woocommerce .woocommerce-pagination .page-numbers .active a,
		.woocommerce .woocommerce-pagination .page-numbers a:focus,
		.woocommerce .woocommerce-pagination .page-numbers a:hover,
		.woocommerce #respond input#submit.secondary,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce a.button.alt.secondary,
		.woocommerce a.button.secondary,
		.woocommerce button.button.alt.secondary,
		.woocommerce button.button.secondary,
		.woocommerce input.button.alt.secondary,
		.woocommerce input.button.secondary,
		.woocommerce input.button[type=submit].alt.secondary,
		.woocommerce input.button[type=submit].secondary {
			background-color: {$mix};
		}

		" : '';

	}

	// Style handle is the name of the theme.
	$handle = defined( 'CHILD_THEME_HANDLE' ) && CHILD_THEME_HANDLE ? CHILD_THEME_HANDLE : 'child-theme';

	// Output CSS if not empty.
	if ( ! empty( $css ) ) {
		wp_add_inline_style( $handle, studio_minify_css( $css ) );
	}
}
