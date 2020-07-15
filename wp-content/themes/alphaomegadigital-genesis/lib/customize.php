<?php
/**
 * alphaomegadigital genesis.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package alphaomegadigital genesis
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    alphaomegadigital.com.au
 */

add_action( 'customize_register', 'alphaomegadigital_genesis_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function alphaomegadigital_genesis_customizer_register( $wp_customize ) {

	$appearance = genesis_get_config( 'appearance' );

	$wp_customize->add_setting(
		'alphaomegadigital_genesis_link_color',
		[
			'default'           => $appearance['default-colors']['link'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'alphaomegadigital_genesis_link_color',
			[
				'description' => __( 'Change the color of post info links and button blocks, the hover color of linked titles and menu items, and more.', 'alphaomegadigital-genesis' ),
				'label'       => __( 'Link Color', 'alphaomegadigital-genesis' ),
				'section'     => 'colors',
				'settings'    => 'alphaomegadigital_genesis_link_color',
			]
		)
	);

	$wp_customize->add_setting(
		'alphaomegadigital_genesis_accent_color',
		[
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'alphaomegadigital_genesis_accent_color',
			[
				'description' => __( 'Change the default hover color for button links, menu buttons, and submit buttons. The button block uses the Link Color.', 'alphaomegadigital-genesis' ),
				'label'       => __( 'Accent Color', 'alphaomegadigital-genesis' ),
				'section'     => 'colors',
				'settings'    => 'alphaomegadigital_genesis_accent_color',
			]
		)
	);

	$wp_customize->add_setting(
		'alphaomegadigital_genesis_logo_width',
		[
			'default'           => 350,
			'sanitize_callback' => 'absint',
			'validate_callback' => 'alphaomegadigital_genesis_validate_logo_width',
		]
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'alphaomegadigital_genesis_logo_width',
		[
			'label'       => __( 'Logo Width', 'alphaomegadigital-genesis' ),
			'description' => __( 'The maximum width of the logo in pixels.', 'alphaomegadigital-genesis' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'alphaomegadigital_genesis_logo_width',
			'type'        => 'number',
			'input_attrs' => [
				'min' => 100,
			],

		]
	);

}

/**
 * Displays a message if the entered width is not numeric or greater than 100.
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function alphaomegadigital_genesis_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'alphaomegadigital-genesis' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'alphaomegadigital-genesis' ) );
	}

	return $validity;

}
