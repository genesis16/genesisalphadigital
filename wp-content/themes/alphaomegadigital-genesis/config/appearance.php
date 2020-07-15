<?php
/**
 * alphaomegadigital genesis appearance settings.
 *
 * @package alphaomegadigital genesis
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    alphaomegadigital.com.au
 */

$alphaomegadigital_genesis_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$alphaomegadigital_genesis_link_color = get_theme_mod(
	'alphaomegadigital_genesis_link_color',
	$alphaomegadigital_genesis_default_colors['link']
);

$alphaomegadigital_genesis_accent_color = get_theme_mod(
	'alphaomegadigital_genesis_accent_color',
	$alphaomegadigital_genesis_default_colors['accent']
);

$alphaomegadigital_genesis_link_color_contrast   = alphaomegadigital_genesis_color_contrast( $alphaomegadigital_genesis_link_color );
$alphaomegadigital_genesis_link_color_brightness = alphaomegadigital_genesis_color_brightness( $alphaomegadigital_genesis_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $alphaomegadigital_genesis_link_color,
	'button-color'         => $alphaomegadigital_genesis_link_color_contrast,
	'button-outline-hover' => $alphaomegadigital_genesis_link_color_brightness,
	'link-color'           => $alphaomegadigital_genesis_link_color,
	'default-colors'       => $alphaomegadigital_genesis_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'alphaomegadigital-genesis' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $alphaomegadigital_genesis_link_color,
		],
		[
			'name'  => __( 'Accent color', 'alphaomegadigital-genesis' ),
			'slug'  => 'theme-secondary',
			'color' => $alphaomegadigital_genesis_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'alphaomegadigital-genesis' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'alphaomegadigital-genesis' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'alphaomegadigital-genesis' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'alphaomegadigital-genesis' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
