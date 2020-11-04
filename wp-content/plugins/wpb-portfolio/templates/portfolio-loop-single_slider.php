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
?>

<div <?php post_class( $item_classes ) ?>>
	<div class="wpb-fp-portfolio-item-inner wpb-fp-loader-wrapper">
		<div class="wpb_fp_row">
			<div class="wpb-fp-portfolio-item-details col-lg-6 col-sm-12">
				<h3 class="wpb-fp-portfolio-item-title"><?php the_title(); ?></h3>
				<?php echo wpb_fp_portfolio_terms( $taxonomy, 1 ); ?>
				<div class="portfolio-short-description">
					<?php echo wpautop( wpb_fp_the_excerpt_max_charlength(200) ); ?>
				</div>
				<?php if( get_post_type() == 'product' && class_exists( 'WooCommerce' ) ): ?>
					<div class="wpb-fp-woocommerce-elements woocommerce">
						<?php echo woocommerce_template_loop_rating(); ?>
						<?php echo woocommerce_template_loop_price(); ?>
						<?php echo '<div class="wpb-fp-woocommerce-cart-btn">'. wpb_fp_get_woocommerce_template_loop_add_to_cart() .'</div>'; ?>
						<?php do_action( 'wpb_fp_woocommerce_elements' ); ?>
					</div>
				<?php endif; ?>
				<div class="wpb-fp-portfolio-read-more">
					<?php 
						if( $wpb_fp_link_full_grid_type == 'details_page' ){
							echo '<a class="wpb-fp-portfolio-read-more-link" '.$portfolio_link_target.' href="'. esc_url( $portfolio_permalink ) .'">'. apply_filters( 'wpb_fp_single_slider_read_more_text', esc_html__( 'Keep Reading...', WPB_FP_TEXTDOMAIN ) ) .'</a>';
						} elseif( $wpb_fp_link_full_grid_type == 'quickview_popup' ){
							if( $quickview_type == 'image_content' ){
								echo '<a data-post-id="' . esc_attr( $post->ID ) . '" class="wpb-fp-portfolio-read-more-link wpb_fp_preview open-popup-link wpb-fp-open-popup-link-gallery" href="#" data-mfp-src="#'. esc_attr( $wpb_fp_quickview_id ) .'" data-effect="'. esc_attr( $wpb_fp_popup_effect ) .'">'. apply_filters( 'wpb_fp_single_slider_read_more_text', esc_html__( 'Keep Reading...', WPB_FP_TEXTDOMAIN ) ) .'</a>';
							}else{
								echo '<a class="wpb-fp-portfolio-read-more-link wpb_fp_image_lightbox" href="#" data-mfp-src="'. esc_url( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ) ) .'">'. apply_filters( 'wpb_fp_single_slider_read_more_text', esc_html__( 'Keep Reading...', WPB_FP_TEXTDOMAIN ) ) .'</a>';
							}
						}
					?>
				</div>
			</div>
			<div class="wpb-fp-portfolio-item-img-container col-lg-6 col-sm-12">
				<?php echo $feature_image; ?>
			</div>
		</div>
	</div>

	<?php if( $quickview_gallery && $quickview_gallery == 'on' ): ?>
		<div id="<?php echo esc_attr( $wpb_fp_quickview_id ); ?>" class="white-popup mfp-with-anim wpb_fp_quick_view wpb_fp_quick_view_with_gallery mfp-hide">
			<?php wpb_fp_get_template( 'content-portfolio-lightbox.php', array( 'post_id' => $post->ID ) ); ?>
		</div>
	<?php endif; ?>
</div>