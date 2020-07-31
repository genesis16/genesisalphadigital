<?php
/**
 * Alpha Omega digital appearance settings.
 *
 * @package Alpha Omega digital
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    alphaomegadigital.com.au
 */

$alpha_omega_digital_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$alpha_omega_digital_link_color = get_theme_mod(
	'alpha_omega_digital_link_color',
	$alpha_omega_digital_default_colors['link']
);

$alpha_omega_digital_accent_color = get_theme_mod(
	'alpha_omega_digital_accent_color',
	$alpha_omega_digital_default_colors['accent']
);

$alpha_omega_digital_link_color_contrast   = alpha_omega_digital_color_contrast( $alpha_omega_digital_link_color );
$alpha_omega_digital_link_color_brightness = alpha_omega_digital_color_brightness( $alpha_omega_digital_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $alpha_omega_digital_link_color,
	'button-color'         => $alpha_omega_digital_link_color_contrast,
	'button-outline-hover' => $alpha_omega_digital_link_color_brightness,
	'link-color'           => $alpha_omega_digital_link_color,
	'default-colors'       => $alpha_omega_digital_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'alpha-omega-digital' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $alpha_omega_digital_link_color,
		],
		[
			'name'  => __( 'Accent color', 'alpha-omega-digital' ),
			'slug'  => 'theme-secondary',
			'color' => $alpha_omega_digital_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'alpha-omega-digital' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'alpha-omega-digital' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'alpha-omega-digital' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'alpha-omega-digital' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
