<?php
/**
 * Helper functions
 *
 * @package   WP Grid Builder
 * @author    Loïc Blascos
 * @copyright 2019-2020 Loïc Blascos
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_Grid_Builder\Includes\Container;

/**
 * Get plugin options
 *
 * @since 1.4.0
 *
 * @return array
 */
function wpgb_get_options() {

	static $options;

	if ( ! empty( $options ) ) {
		return $options;
	}

	$defaults = require WPGB_PATH . 'admin/settings/defaults/global.php';
	$options  = get_option( WPGB_SLUG . '_global_settings' );
	$options  = wp_parse_args( $options, $defaults );

	return $options;

}

/**
 * Get plugin option
 *
 * @since 1.4.0
 *
 * @param string $option  Name of option to retrieve.
 * @param mixed  $default Default value to return if the option does not exist.
 * @return mixed
 */
function wpgb_get_option( $option = '', $default = false ) {

	if ( empty( $option ) ) {
		return false;
	}

	$options = wpgb_get_options();

	if ( ! isset( $options[ $option ] ) ) {
		return $default;
	}

	return $options[ $option ];

}

/**
 * Retrieve grid settings
 *
 * @since 1.0.0
 *
 * @param string $key Settings key.
 * @return mixed
 */
function wpgb_get_grid_settings( $key = '' ) {

	if ( ! Container::has( 'Container/Grid' ) ) {
		return false;
	}

	$settings = Container::instance( 'Container/Grid' )->get( 'Settings' );

	if ( ! empty( $key ) ) {

		if ( isset( $settings->$key ) ) {
			return $settings->$key;
		}

		return false;

	}

	return $settings;

}

/**
 * Check is we are in overview mode
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function wpgb_is_overview() {

	$settings = wpgb_get_grid_settings();

	if ( isset( $settings->is_overview ) ) {
		return $settings->is_overview;
	}

	return false;

}

/**
 * Check is we are in preview mode
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function wpgb_is_preview() {

	$settings = wpgb_get_grid_settings();

	if ( isset( $settings->is_preview ) ) {
		return $settings->is_preview;
	}

	return false;

}

/**
 * Check if we are in Gutenberg edit page
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function wpgb_is_gutenberg() {

	if ( ! function_exists( 'get_current_screen' ) ) {
		return false;
	}

	$screen = get_current_screen();

	if ( is_null( $screen ) || ! method_exists( $screen, 'is_block_editor' ) ) {
		return false;
	}

	return $screen->is_block_editor();

}

/**
 * Determines whether the current request is a plugin Ajax request.
 *
 * @since 1.4.2
 *
 * @return boolean
 */
function wpgb_doing_ajax() {

	return wp_doing_ajax() && ! empty( $_GET['wpgb-ajax'] ) && 'wpgb_front' === $_GET['wpgb-ajax'];

}

/**
 * Determines whether the current request is rendering facets.
 *
 * @since 1.4.2
 *
 * @return boolean
 */
function wpgb_is_rendering_facets() {

	return wpgb_doing_ajax() && ! empty( $_GET['action'] ) && 'render' === $_GET['action'];

}

/**
 * Determines whether the current request is refreshing facets.
 *
 * @since 1.4.2
 *
 * @return boolean
 */
function wpgb_is_refreshing_facets() {

	return wpgb_doing_ajax() && ! empty( $_GET['action'] ) && 'refresh' === $_GET['action'];

}

/**
 * Determines whether the current request is searching for facet choices.
 *
 * @since 1.4.2
 *
 * @return boolean
 */
function wpgb_is_searching_facet_choices() {

	return wpgb_doing_ajax() && ! empty( $_GET['action'] ) && 'search' === $_GET['action'];

}

/**
 * Determines if we are filtering a shadow grid.
 *
 * @since 1.4.2
 *
 * @return boolean
 */
function wpgb_is_shadow_grid() {

	if ( ! wpgb_doing_ajax() || ! isset( $_REQUEST[ WPGB_SLUG ] ) ) {
		return false;
	}

	$request = wp_unslash( $_REQUEST[ WPGB_SLUG ] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
	$request = json_decode( $request, true );

	return wpgb_doing_ajax() && ! empty( $request['is_shadow'] );

}
