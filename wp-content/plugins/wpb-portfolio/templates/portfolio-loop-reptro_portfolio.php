<?php

/**
 * Portfolio Loop
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$width 								= ( array_key_exists('width', $atts) ? $atts['width'] : wpb_fp_get_option( 'wpb_fp_image_width_', 'wpb_fp_advanced', 680 ) );
$height 							= ( array_key_exists('height', $atts) ? $atts['height'] : wpb_fp_get_option( 'wpb_fp_image_height_', 'wpb_fp_advanced', 680 ) );
$img_url 							= wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
$image_thumb 						= wpb_fp_resize( $img_url, $width, $height, true, true, true ); //resize & crop the image
$alt 								= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$wpb_fp_quickview_icon 				= wpb_fp_get_option( 'wpb_fp_quickview_icon', 'wpb_fp_advanced', 'show' );
$wpb_fp_single_portfolio_link 		= wpb_fp_get_option( 'wpb_fp_single_portfolio_link', 'wpb_fp_advanced', 'show' );
$wpb_fp_portfolio_ex_link 			= get_post_meta( $post->ID, 'wpb_fp_portfolio_ex_link', true );
$wpb_fp_popup_effect 				= wpb_fp_get_option( 'wpb_fp_popup_effect_', 'wpb_fp_style', 'mfp-zoom-in' );
$wpb_fp_title_character_limit 		= wpb_fp_get_option( 'wpb_fp_title_character_limit_', 'wpb_fp_general', 'on' );
$wpb_fp_number_of_title_character 	= wpb_fp_get_option( 'wpb_fp_number_of_title_character', 'wpb_fp_general', 40 );
$wpb_fp_after_title 				= wpb_fp_get_option( 'wpb_fp_after_title', 'wpb_fp_general', '...' );
$portfolio_title 					= get_the_title();
$portfolio_permalink 				= get_post_meta( $post->ID, 'wpb_fp_portfolio_ex_link', true );
$portfolio_subtitle 				= get_post_meta( $post->ID, 'wpb_fp_portfolio_subtitle', true );
$portfolio_link_target 				= '';
$content_type 						= get_post_meta( $post->ID, 'wpb_fp_content_type', true );
$video_iframe 						= get_post_meta( $post->ID, 'wpb_fp_video_iframe', true );
$wpb_fp_image_hard_crop 			= ( array_key_exists('img_hard_crop', $atts) ? $atts['img_hard_crop'] : wpb_fp_get_option( 'wpb_fp_image_hard_crop_', 'wpb_fp_advanced', 'yes' ) );
$wpb_fp_no_hard_crop_image_size 	= ( array_key_exists('img_no_hard_crop_size', $atts) ? $atts['img_no_hard_crop_size'] : wpb_fp_get_option( 'wpb_fp_no_hard_crop_image_size', 'wpb_fp_advanced', 'wpb_portfolio_thumbnail' ) );
$grid_content 						= '';
$taxonomy 							= ( array_key_exists('taxonomy', $atts) ? $atts['taxonomy'] : wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ));
$filtering_script 					= ( array_key_exists('filtering_script', $atts) ? $atts['filtering_script'] : wpb_fp_get_option( 'wpb_fp_filtering_script', 'wpb_fp_advanced', 'mixitup' ) );
$quickview_type 					= ( array_key_exists('quickview_type', $atts) ? $atts['quickview_type'] : wpb_fp_get_option( 'wpb_fp_quickview_type', 'wpb_quickview_settings', 'image_content' ));

$type 								= ( array_key_exists('type', $atts) ? $atts['type'] : 'grid' );

if( $wpb_fp_title_character_limit === 'on' ){
	$portfolio_title 				= ( strlen($portfolio_title) > $wpb_fp_number_of_title_character + 2 ) ? substr($portfolio_title,0,$wpb_fp_number_of_title_character ).$wpb_fp_after_title : $portfolio_title;
}

if( $portfolio_permalink && $portfolio_permalink != '' ){
	$portfolio_permalink 			= $portfolio_permalink;
	$portfolio_link_target 			= 'target="_blank"';
}else {
	$portfolio_permalink 			= get_the_permalink();
}

if( $wpb_fp_image_hard_crop == 'yes' ){
	$feature_image 					= '<img src="'. esc_url( $image_thumb ) .'" alt="'. esc_html( $alt ) .'"/>';
}else{
	$feature_image 					= get_the_post_thumbnail( $post->ID, $wpb_fp_no_hard_crop_image_size );
}


if( $content_type && $content_type == 'video'){
	$grid_content 					= $video_iframe;
}else{
	$grid_content 					= $feature_image;
}


// Portfolio categories classes
$categories_classes = wpb_fp_portfolio_categories( $taxonomy );

// Portfolio post class

$item_classes = array( 'wpb-fp-item' );

if( $filtering_script == 'mixitup' && $type == 'grid'){
	$item_classes[] = 'mix';
}

$item_classes = array_merge( $item_classes, $column_class );
$item_classes = array_merge( $item_classes, $categories_classes );

if( isset($_GET['quickview_type']) ) {
	$quickview_type = $_GET['quickview_type'];
}

$wpb_fp_quickview_id = 'wpb_fp_quickview_' . $portfolio_id . '_' . $post->ID;
$quickview_gallery 	 = wpb_fp_get_option( 'wpb_fp_quickview_gallery', 'wpb_quickview_settings', '' );
?>

<div <?php post_class( $item_classes ) ?>>
	<figure class="wpb-fp-loader-wrapper">
		<?php echo $grid_content; ?>
		<figcaption>
			<?php if( $wpb_fp_quickview_icon == 'show' ): ?>
				<i class="wpbfpicons-magnifying-glass"></i>
			<?php endif; ?>
			<h3><?php echo esc_html( $portfolio_title ) ?></h3>
			<?php if( $portfolio_subtitle ): ?>
				<span class="wpb-fp-sub-title"><?php echo esc_html( $portfolio_subtitle ) ?></span>
			<?php endif; ?>
			<?php 
				if( $quickview_type == 'image_content' ){
					printf( '<a data-post-id="%s" class="link_full_grid wpb_fp_preview open-popup-link wpb-fp-open-popup-link-gallery" href="#" data-mfp-src="#'. esc_attr( $wpb_fp_quickview_id ) .'" data-effect="%s"></a>', esc_attr($post->ID), esc_attr( $wpb_fp_popup_effect ) );
				}else{
					printf( '<a class="link_full_grid wpb_fp_image_lightbox" href="#" data-mfp-src="%s"></a>', esc_url( $img_url ) );
				}
			?>
		</figcaption>
	</figure>
	<?php if( $quickview_gallery && $quickview_gallery == 'on' ): ?>
		<div id="<?php echo esc_attr( $wpb_fp_quickview_id ); ?>" class="white-popup mfp-with-anim wpb_fp_quick_view wpb_fp_quick_view_with_gallery mfp-hide">
			<?php wpb_fp_get_template( 'content-portfolio-lightbox.php', array( 'post_id' => $post->ID ) ); ?>
		</div>
	<?php endif; ?>
</div>