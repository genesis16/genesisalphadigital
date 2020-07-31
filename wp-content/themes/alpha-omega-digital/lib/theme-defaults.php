<?php
/**
 * Alpha Omega digital.
 *
 * This file adds the default theme settings to the Genesis Sample Theme.
 *
 * @package Alpha Omega digital
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    alphaomegadigital.com.au
 */

add_filter( 'simple_social_default_styles', 'alpha_omega_digital_social_default_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
function alpha_omega_digital_social_default_styles( $defaults ) {

	$args = genesis_get_config( 'simple-social-icons-settings' );

	return wp_parse_args( $args, $defaults );

}
