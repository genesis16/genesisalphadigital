<?php

/**
 * Portfolio Loop
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$width 								= ( array_key_exists('width', $atts) ? $atts['width'] : wpb_fp_get_option( 'wpb_fp_image_width_', 'wpb_fp_advanced', 680 ) );
$height 							= ( array_key_exists('height', $atts) ? $atts['height'] : wpb_fp_get_option( 'wpb_fp_image_height_', 'wpb_fp_advanced', 680 ) );
$image_thumb 						= wpb_fp_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), $width, $height, true, true, true ); //resize & crop the image
$alt 								= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$portfolio_permalink 				= get_post_meta( $post->ID, 'wpb_fp_portfolio_ex_link', true );
$wpb_fp_image_hard_crop 			= ( array_key_exists('img_hard_crop', $atts) ? $atts['img_hard_crop'] : wpb_fp_get_option( 'wpb_fp_image_hard_crop_', 'wpb_fp_advanced', 'yes' ) );
$wpb_fp_no_hard_crop_image_size 	= ( array_key_exists('img_no_hard_crop_size', $atts) ? $atts['img_no_hard_crop_size'] : wpb_fp_get_option( 'wpb_fp_no_hard_crop_image_size', 'wpb_fp_advanced', 'wpb_portfolio_thumbnail' ) );
$filtering_script 					= ( array_key_exists('filtering_script', $atts) ? $atts['filtering_script'] : wpb_fp_get_option( 'wpb_fp_filtering_script', 'wpb_fp_advanced', 'mixitup' ) );
$taxonomy 							= ( array_key_exists('taxonomy', $atts) ? $atts['taxonomy'] : wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ));
$wpb_fp_popup_effect 				= wpb_fp_get_option( 'wpb_fp_popup_effect_', 'wpb_fp_style', 'mfp-zoom-in' );
$wpb_fp_link_full_grid 				= wpb_fp_get_option( 'wpb_fp_link_full_grid_', 'wpb_fp_advanced', '' );
$wpb_fp_link_full_grid_type 		= wpb_fp_get_option( 'wpb_fp_link_full_grid_type_', 'wpb_fp_advanced', 'details_page' );
$wpb_fp_single_portfolio_link 		= wpb_fp_get_option( 'wpb_fp_single_portfolio_link', 'wpb_fp_advanced', 'show' );
$quickview_type 					= ( array_key_exists('quickview_type', $atts) ? $atts['quickview_type'] : wpb_fp_get_option( 'wpb_fp_quickview_type', 'wpb_quickview_settings', 'image_content' ));
$type 								= ( array_key_exists('type', $atts) ? $atts['type'] : 'grid' );
$categories_classes 				= wpb_fp_portfolio_categories( $taxonomy );
$item_classes 						= array( 'wpb-fp-item' );

$portfolio_link_target = $link_full_grid = '';

if( $filtering_script == 'mixitup' && $type == 'grid'){
	$item_classes[] = 'mix';
}

$item_classes 						= array_merge( $item_classes, $column_class );
$item_classes 						= array_merge( $item_classes, $categories_classes );

if( $wpb_fp_image_hard_crop == 'yes' ){
	$feature_image 					= '<img src="'. esc_url( $image_thumb ) .'" alt="'. esc_html( $alt ) .'"/>';
}else{
	$feature_image 					= get_the_post_thumbnail( $post->ID, $wpb_fp_no_hard_crop_image_size );
}



if( $portfolio_permalink && $portfolio_permalink != '' ){
	$portfolio_permalink 			= $portfolio_permalink;
	$portfolio_link_target 			= 'target="_blank"';
}else{
	$portfolio_permalink 			= get_the_permalink();
}


// Link Image if overlay is eabled

if( isset($_GET['quickview_type']) ) {
	$quickview_type = $_GET['quickview_type'];
}

$wpb_fp_quickview_id = 'wpb_fp_quickview_' . $portfolio_id . '_' . $post->ID;
$quickview_gallery 	 = wpb_fp_get_option( 'wpb_fp_quickview_gallery', 'wpb_quickview_settings', '' );

if( $wpb_fp_link_full_grid_type == 'details_page' ){
	$link_full_grid 			= '<a class="wpb-fp-portfolio-item-link" '.$portfolio_link_target.' href="'. esc_url( $portfolio_permalink ) .'"></a>';
} elseif( $wpb_fp_link_full_grid_type == 'quickview_popup' ){
	if( $quickview_type == 'image_content' ){
		$link_full_grid 			= '<a data-post-id="' . esc_attr( $post->ID ) . '" class="wpb-fp-portfolio-item-link wpb_fp_preview open-popup-link wpb-fp-open-popup-link-gallery" href="#" data-mfp-src="#'. esc_attr( $wpb_fp_quickview_id ) .'" data-effect="'. esc_attr( $wpb_fp_popup_effect ) .'"></a>';
	}else{
		$link_full_grid = '<a class="wpb-fp-portfolio-item-link wpb_fp_image_lightbox" href="#" data-mfp-src="'. esc_url( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ) ) .'"></a>';
	}
}

?>

<div <?php post_class( $item_classes ) ?>>
	<div class="wpb-fp-portfolio-item-inner wpb-fp-loader-wrapper">
		<div class="wpb-fp-portfolio-item-img-container">
			<?php echo $feature_image; ?>
		</div>

		<?php echo $link_full_grid; ?>

		<div class="wpb-fp-portfolio-item-details">

			<div class="wpb-fp-portfolio-item-experts">
				<a class="wpb-fp-portfolio-item-experts-link" href="#"><?php echo get_the_date( get_option( 'date_format' ) ); ?></a>
			</div>

			<h3 class="wpb-fp-portfolio-item-title"><?php the_title(); ?></h3>

			<?php echo wpb_fp_portfolio_terms( $taxonomy, 1 ); ?>

		</div>
	</div>
	<?php if( $quickview_gallery && $quickview_gallery == 'on' ): ?>
		<div id="<?php echo esc_attr( $wpb_fp_quickview_id ); ?>" class="white-popup mfp-with-anim wpb_fp_quick_view wpb_fp_quick_view_with_gallery mfp-hide">
			<?php wpb_fp_get_template( 'content-portfolio-lightbox.php', array( 'post_id' => $post->ID ) ); ?>
		</div>
	<?php endif; ?>
</div>