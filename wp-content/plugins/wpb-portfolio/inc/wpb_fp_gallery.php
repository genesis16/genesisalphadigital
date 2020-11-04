<?php

/*
    WPB Portfolio PRO
    By WPBean
    
    Gallery support comes with v 1.07
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/**
 * Gallery Scripts
 */

function wpb_fp_galllery_scripts() {
	$wpb_fp_post_type 	 = wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' );
	$wpb_fp_gallery_type = wpb_fp_get_option( 'wpb_fp_gallery_type', 'wpb_fp_gallery', 'slider' );

	wp_register_style('wpb-fp-lightslider', plugins_url('../assets/css/lightslider.min.css', __FILE__), '', '1.0');
	wp_register_script('wpb-fp-lightslider-js', plugins_url('../assets/js/lightslider.min.js', __FILE__), array('jquery'), '1.0', false);

	wp_register_script('wpb-fp-magnific-popup', plugins_url('../assets/js/jquery.magnific-popup.min.js', __FILE__) ,array('jquery'),'1.0', false);	
	wp_register_style('wpb-fp-magnific-popup', plugins_url('../assets/css/magnific-popup.css', __FILE__), '', '1.0');

	wp_register_style('bootstrap-grid', plugins_url('../assets/css/bootstrap-grid.min.css', __FILE__), '', '4.0');

	wp_enqueue_style('wpb-fp-lightslider');
	wp_enqueue_script('wpb-fp-lightslider-js');
	
	if( is_singular( $wpb_fp_post_type ) && $wpb_fp_gallery_type == 'grid' ){
		wp_enqueue_style('bootstrap-grid');
		wp_enqueue_style('wpb-fp-magnific-popup');
		wp_enqueue_script('wpb-fp-magnific-popup');
	}
}
add_action( 'wp_enqueue_scripts', 'wpb_fp_galllery_scripts' ); 


/**
 * Adding the Gallery Meta Box
 */


add_filter( 'wpb_fp_metabox', 'wpb_fp_portfolio_gallery_meta', 10, 2 );
if( !function_exists('wpb_fp_portfolio_gallery_meta') ){

	function wpb_fp_portfolio_gallery_meta( $fields, $prefix ){
		$fields[] = array(
			'label' => esc_html__( 'Gallery Images', WPB_FP_TEXTDOMAIN ),
			'id'    => $prefix.'gallery',
			'type'  => 'gallery',
			'desc'  => esc_html__( 'Choose gallery images', WPB_FP_TEXTDOMAIN ),
		);

		return $fields;
	}
}



/**
 * Display the gallery images in quick view 
 */

add_filter( 'wpb_fp_quickview_feature_image', 'wpb_fp_quickview_galllery', 10, 2 );
if( !function_exists('wpb_fp_quickview_galllery') ){

	function wpb_fp_quickview_galllery( $value, $id, $gallery_type = '', $grid_column = '', $extra_class = '' ){
		
		$wpb_fp_no_resize_the_gallery_image = wpb_fp_get_option( 'wpb_fp_no_resize_the_gallery_image', 'wpb_fp_gallery', '' );
		$gallery_image_size 				= ( $wpb_fp_no_resize_the_gallery_image == 'on' ? apply_filters( 'wpb_fp_gallery_main_image_size', 'full' ) : 'wpb-fp-full' );
		$images 							= get_post_meta( $id, 'wpb_fp_gallery', true );
		$wpb_fp_gallery_caption 			= wpb_fp_get_option( 'wpb_fp_gallery_caption', 'wpb_fp_gallery', 'on' );
		$wpb_fp_gallery_column 			    = ( $grid_column ? $grid_column : wpb_fp_get_option( 'wpb_fp_gallery_column', 'wpb_fp_gallery', '5' ) );
		$gallery_feature_image 				= wpb_fp_get_option( 'wpb_fp_gallery_feature_image', 'wpb_fp_gallery', 'on' );
		$wpb_fp_post_type 					= wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' );
		$wpb_fp_gallery_item_class			= array('wpb-fp-gallery-item');
		$value 								= '';
		
		if( $gallery_type ){
			$wpb_fp_gallery_type = $gallery_type;
		}else{
			if( is_singular( $wpb_fp_post_type ) ){
				$wpb_fp_gallery_type = wpb_fp_get_option( 'wpb_fp_gallery_type', 'wpb_fp_gallery', 'slider' );
			}else{
				$wpb_fp_gallery_type = 'slider';
			}
		}

		$quickview_gallery 	 = wpb_fp_get_option( 'wpb_fp_quickview_gallery', 'wpb_quickview_settings', '' );

		if( $quickview_gallery == 'on' ){
			$wpb_fp_gallery_type 	= 'grid';
			$gallery_feature_image 	= 'off';
		}

		if( $wpb_fp_gallery_type == 'grid' ){
			$wpb_fp_gallery_caption  = 'off';
			$wpb_fp_gallery_item_class[] = apply_filters( 'wpb_fp_gallery_grid_column', 'col-lg-'.$wpb_fp_gallery_column );
		}

		$grid_width 	= apply_filters( 'wpb_fp_grid_img_width', '480' );
		$grid_height 	= apply_filters( 'wpb_fp_grid_img_height', '480' );

		if( has_post_thumbnail($id) && !is_single() ){
			if( $quickview_gallery == 'on' || empty( $images ) ){
				//$value .= '<div class="wpb-fp-main-image">'. get_the_post_thumbnail( $id, $gallery_image_size ) .'</div>';
				$value .= '<div class="wpb-fp-main-image"><img src="'. esc_url( get_the_post_thumbnail_url( $id, $gallery_image_size ) ) .'" alt="'.esc_attr( get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true) ).'"></div>';
			}
		}

		if( ! empty( $images ) ) {
			$caption 	= get_post(get_post_thumbnail_id())->post_excerpt;
			$caption 	= ( $caption ? '<div class="wpb_fp_caption"><p>'. esc_html( $caption ) .'</p></div>' : '' );
			$images 	= explode( ',', $images );

			if( $gallery_feature_image == 'on' && get_post_thumbnail_id($id) && is_array($images)  ){
				array_unshift($images, get_post_thumbnail_id($id) );
			}


			$rtl 						= ( is_rtl() ? 'true' : 'false' );
			$wpb_fp_gallery_autoplay 	= wpb_fp_get_option( 'wpb_fp_gallery_autoplay', 'wpb_fp_gallery', 'off' );
			$wpb_fp_gallery_speed 		= wpb_fp_get_option( 'wpb_fp_gallery_speed', 'wpb_fp_gallery', 600 );

			$slider_attr = array(
				'data-auto'     => ( $wpb_fp_gallery_autoplay === 'on' ? 'true' : 'false' ),
				'data-speed'    => $wpb_fp_gallery_speed,
				'data-rtl'      => $rtl,
			);

			$value .= '<ul id="wpb_fp_gallery_'. esc_attr( $id ) .'" class="wpb_fp_gallery_'. esc_attr( $wpb_fp_gallery_type ) .' wpb_fp_gallery_'. esc_attr( $wpb_fp_gallery_type ) . esc_attr( is_singular( $wpb_fp_post_type ) ? '_single' : '_not_single' ) . ( $wpb_fp_gallery_type == 'grid' ? ' wpb_fp_row' : '' ) .' '. esc_attr( $extra_class ) .'" '.(  $wpb_fp_gallery_type == 'slider' ? wpb_fp_carousel_data_attr_implode( $slider_attr ) : '' ).'>';

			foreach ( $images as $image ) {
				$thumb 				= wp_get_attachment_image_src( $image, apply_filters( 'wpb_fp_gallery_thum_image_size', array(150, 150) ) );
				$large 				= wp_get_attachment_image_src( $image, $gallery_image_size );
				$alt 				= get_post_meta($image, '_wp_attachment_image_alt', true);
				$grid_caption 		= get_post_field('post_excerpt', $image);
				$gallery_caption 	= get_post_field('post_excerpt', $image);
				$gallery_caption 	= ( $gallery_caption ? '<div class="wpb_fp_caption"><p>'. esc_html( $gallery_caption ) .'</p></div>' : '' );

				$value 				.= '<li class="'. esc_attr( implode(' ', $wpb_fp_gallery_item_class ) ) .'" data-thumb="'. esc_url( $thumb[0] ) .'" data-mfp-src="'. esc_url( $large[0] ) .'" title="'.esc_html( $grid_caption ).'"><span class="wpb-fp-gallery-item-inner"><img src="'. esc_url( $wpb_fp_gallery_type == 'grid' ? wpb_fp_resize( $large[0], $grid_width, $grid_height, true, true, true ) : $large[0] ) .'" alt="'. esc_html( $alt ) .'" />'.( $wpb_fp_gallery_caption == 'on' ? $gallery_caption : '' ).'</span></li>';
			}

			$value .= '</ul>';


	    }

		return $value;
	}
}