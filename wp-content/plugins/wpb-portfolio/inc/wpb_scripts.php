<?php

/*
	WPB Filterable Portfolio
	By WPBean
	
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 



/**
 * register scripts
 */

function wpb_fp_registering_scripts() {

	$force_load_magnific_popup 	= wpb_fp_get_option( 'wpb_fp_force_load_magnific_popup', 'wpb_quickview_settings', 'off' );
	$enable_slider 			 	= wpb_fp_get_option( 'wpb_fp_enable_slider', 'wpb_fp_slider', 'on' );

	wp_register_script('wpb-fp-mixitup', plugins_url('../assets/js/jquery.mixitup.min.js', __FILE__), array('jquery'), '2.1.6', false);
	wp_register_script('wpb-fp-imagesloaded', plugins_url('../assets/js/imagesloaded.pkgd.min.js', __FILE__), array('jquery'), '4.1.4', false);
	wp_register_script('wpb-fp-isotope', plugins_url('../assets/js/isotope.pkgd.min.js', __FILE__), array('jquery'), '3.0.5', false);
	wp_register_script('wpb-fp-magnific-popup', plugins_url('../assets/js/jquery.magnific-popup.min.js', __FILE__) , array('jquery'), '1.0', false);	
	wp_register_script('wpb-fp-main-js', plugins_url('../assets/js/main.js', __FILE__) , array('jquery'), '1.0', true);

	wp_register_style('wpb-fp-bootstrap-grid', plugins_url('../assets/css/bootstrap-grid.min.css', __FILE__), '', '4.0');
	wp_register_style('wpb-fp-magnific-popup', plugins_url('../assets/css/magnific-popup.css', __FILE__), '', '1.0');
	wp_register_style('wpb-fp-main', plugins_url('../assets/css/main.css', __FILE__), '', '1.0');


	if( $enable_slider == 'on' ){
		wp_register_script('wpb-fp-owl-carousel', plugins_url('../assets/js/owl.carousel.min.js', __FILE__), array('jquery'), '2.3.4', false);
		wp_register_style('wpb-fp-owl-carousel', plugins_url('../assets/css/owl.carousel.min.css', __FILE__), '', '2.3.4');
	}

	if( $force_load_magnific_popup == 'on' ){
		wp_enqueue_style('wpb-fp-magnific-popup');
		wp_enqueue_script('wpb-fp-magnific-popup');
	}

	wp_localize_script( 'wpb-fp-main-js', 'wpb_fp_ajax_name', array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );

	global $wp_query;

	wp_localize_script( 'wpb-fp-main-js', 'wpb_fp_ajax_loadmore', array( 
		'ajax_url' 		=> admin_url( 'admin-ajax.php' ),
		'current_page' 	=> get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	));

	wp_add_inline_style( 'wpb-fp-main', wpb_fp_get_option( 'wpb_fp_custom_css_', 'wpb_fp_style', '' ) );
}
add_action( 'wp_enqueue_scripts', 'wpb_fp_registering_scripts', 20 ); 


/**
 * enqueue scripts 
 */

function wpb_fp_get_scripts( $atts ){
	$wpb_fp_skin 			= ( array_key_exists('wpb_fp_skin', $atts) ? $atts['wpb_fp_skin'] : 'img_bg_hover_effect' );
	$filtering_script 		= ( array_key_exists('filtering_script', $atts) ? $atts['filtering_script'] : 'mixitup' );
	$enable_slider 			= wpb_fp_get_option( 'wpb_fp_enable_slider', 'wpb_fp_slider', 'on' );

	if( $enable_slider == 'on' ){
		wp_enqueue_script('wpb-fp-owl-carousel');
		wp_enqueue_style('wpb-fp-owl-carousel');
	}


	if( $filtering_script == 'mixitup' ){
		wp_enqueue_script('wpb-fp-mixitup');
	}elseif( $filtering_script == 'isotope' ){
		wp_enqueue_script('wpb-fp-imagesloaded');
		wp_enqueue_script('wpb-fp-isotope');
	}

	wp_enqueue_script('wpb-fp-main-js');
	wp_enqueue_style('wpb-fp-bootstrap-grid');
	
	if( $wpb_fp_skin == 'img_bg_hover_effect' ){
		
		wp_enqueue_script('wpb-fp-lightslider-js');
		wp_enqueue_style('wpb-fp-lightslider');

		wp_enqueue_style('wpb-fp-magnific-popup');
		wp_enqueue_script('wpb-fp-magnific-popup');
	}

	wp_enqueue_style('wpb-fp-main');
	wp_enqueue_style( 'js_composer_front' );
}


/**
 * Portfolio Single Scripts
 */

function wpb_fp_get_scripts_single_portfolio(){
	wp_enqueue_style('wpb-fp-magnific-popup');
	wp_enqueue_script('wpb-fp-magnific-popup');
	wp_enqueue_script('wpb-fp-main-js');
	wp_enqueue_style('wpb-fp-bootstrap-grid');
	wp_enqueue_style('wpb-fp-main');
	wp_enqueue_style( 'js_composer_front' );
}