<?php
/**
 * Studio Pro Theme
 *
 * This file adds helper functions used in the child theme.
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

/**
 * Sanitize number values.
 *
 * Ensure number is an absolute integer (whole number, zero or greater). If
 * input is an absolute integer, return it. Otherwise, return default.
 *
 * @since  2.0.0
 *
 * @param  string $number  The rgba color to sanitize.
 * @param string  $setting Sanitized value.
 *
 * @return string
 */
function studio_sanitize_number( $number, $setting ) {
	$number = absint( $number );

	return ( $number ? $number : $setting->default );
}

/**
 * Sanitize RGBA values.
 *
 * If string does not start with 'rgba', then treat as hex then
 * sanitize the hex color and finally convert hex to rgba.
 *
 * @since  2.0.0
 *
 * @param  string $color The rgba color to sanitize.
 *
 * @return string $color Sanitized value.
 */
function studio_sanitize_rgba_color( $color ) {

	// Return invisible if empty.
	if ( empty( $color ) || is_array( $color ) ) {
		return 'rgba(0,0,0,0)';
	}

	// Return sanitized hex if not rgba value.
	if ( false === strpos( $color, 'rgba' ) ) {
		return sanitize_hex_color( $color );
	}

	// Finally, sanitize and return rgba.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

/**
 * Convert hex to rgba value.
 *
 * This function takes a hex code (e.g. #eeeeee) and returns array of RGBA
 * values. Used in studio_customizer_output to handle transparency.
 *
 * @since  0.1.0
 *
 * @param  string $color   Hex color to convert.
 * @param  int    $opacity Opacity amount.
 *
 * @return string
 */
function studio_hex_to_rgba( $color, $opacity ) {
	if ( '#' === $color[0] ) {
		$color = substr( $color, 1 );
	}

	if ( strlen( $color ) === 6 ) {
		list( $r, $g, $b ) = array(
			$color[0] . $color[1],
			$color[2] . $color[3],
			$color[4] . $color[5]
		);

	} elseif ( strlen( $color ) === 3 ) {
		list( $r, $g, $b ) = array(
			$color[0] . $color[0],
			$color[1] . $color[1],
			$color[2] . $color[2]
		);

	} else {
		return false;
	}

	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );

	$rgb = array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);

	$rgba = implode( $rgb, ',' ) . ',' . $opacity;

	return $rgba;
}

/**
 * Convert rgba to hex value.
 *
 * This function takes an rgba code (e.g. rgba(100,200,300,1)) and returns
 * array of RGBA values. First checks if the string is a hex value and
 * converts it into and RGBA using studio_hex_to_rgba if necessary.
 *
 * @since  0.1.0
 *
 * @param  string $string RGBA color to convert.
 *
 * @return string
 */
function studio_rgba_to_hex( $string ) {
	$rgba  = array();
	$hex   = '';
	$regex = '#\((([^()]+|(?R))*)\)#';

	if ( strpos( $string, ',' ) != true ) {
		$string = 'rgba(' . studio_hex_to_rgba( $string, '1' ) . ')';
	}

	if ( preg_match_all( $regex, $string, $matches ) ) {
		$rgba = explode( ',', implode( ' ', $matches[1] ) );

	} else {
		$rgba = explode( ',', $string );
	}

	$rr = str_pad( dechex( $rgba['0'] ), 2, '0', STR_PAD_LEFT );
	$gg = str_pad( dechex( $rgba['1'] ), 2, '0', STR_PAD_LEFT );
	$bb = str_pad( dechex( $rgba['2'] ), 2, '0', STR_PAD_LEFT );
	$aa = '';

	if ( array_key_exists( '3', $rgba ) ) {
		$aa = dechex( $rgba['3'] * 255 );
	}

	return strtoupper( "#$rr$gg$bb" );
}

/**
 * Minify CSS helper function.
 *
 * @since  2.0.0
 *
 * @author Gary Jones
 * @link   https://github.com/GaryJones/Simple-PHP-CSS-Minification
 *
 * @param  string $css The CSS to minify.
 *
 * @return string Minified CSS.
 */
function studio_minify_css( $css ) {
	$css = preg_replace( '/\s+/', ' ', $css );
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
	$css = preg_replace( '/;(?=\s*})/', '', $css );
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	$css = preg_replace( '/0 0 0 0/', '0', $css );
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );
}

/**
 * Helper function to check if we're on a WooCommerce page.
 *
 * @since  2.0.0
 *
 * @link   https://docs.woocommerce.com/document/conditional-tags/.
 *
 * @return bool
 */
function studio_is_woocommerce_page() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return false;
	}

	if ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
		return true;

	} else {
		return false;
	}
}

/**
 * Custom header image callback.
 *
 * Loads custom header or featured image depending on what is set on a per
 * page basis. If a featured image is set for a page, it will override
 * the default header image. It also gets the image for custom post
 * types by looking for a page with the same slug as the CPT e.g
 * the Portfolio CPT archive will pull the featured image from
 * a page with the slug of 'portfolio', if the page exists.
 *
 * @since 1.1.0
 *
 * @return string
 */
function studio_custom_header() {
	$id  = '';
	$url = '';

	// Get the current page ID.
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$id = wc_get_page_id( 'shop' );

	} elseif ( is_post_type_archive() ) {
		$id = get_page_by_path( get_query_var( 'post_type' ) );
		$id = $id && has_post_thumbnail( $id->ID ) ? $id->ID : false;

	} elseif ( is_category() ) {
		$id = get_page_by_title( 'category-' . get_query_var( 'category_name' ), OBJECT, 'attachment' );

	} elseif ( is_tag() ) {
		$id = get_page_by_title( 'tag-' . get_query_var( 'tag' ), OBJECT, 'attachment' );

	} elseif ( is_tax() ) {
		$id = get_page_by_title( 'term-' . get_query_var( 'term' ), OBJECT, 'attachment' );

	} elseif ( is_front_page() ) {
		$id = get_option( 'page_on_front' );

	} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {
		$id = get_option( 'page_for_posts' );

	} elseif ( is_search() ) {
		$id = get_page_by_path( 'search' );

	} elseif ( is_404() ) {
		$id = get_page_by_path( 'error' );

	} elseif ( is_singular() ) {
		$id = get_the_id();

	}

	if ( is_object( $id ) ) {
		$url = wp_get_attachment_image_url( $id->ID, 'hero' );

	} elseif ( $id ) {
		$url = get_the_post_thumbnail_url( $id, 'hero' );

	}

	if ( ! $url ) {
		$url = get_header_image();
	}

	if ( $url ) {
		$selector = get_theme_support( 'custom-header', 'header-selector' );

		return printf( '<style type="text/css">' . esc_attr( $selector ) . '{background-image:url(%s)}</style>' . "\n", esc_url( $url ) );

	} else {
		return '';
	}
}
