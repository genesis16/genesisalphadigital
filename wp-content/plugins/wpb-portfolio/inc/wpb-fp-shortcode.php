<?php

/*
	WPB Filterable Portfolio
	By WPBean
	
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 



/**
 * PHP implode with key and value ( Owl carousel data attr )
 */

if( !function_exists('wpb_fp_data_attr_implode') ){
	function wpb_fp_data_attr_implode( $array ){
		
		foreach ($array as $key => $value) {

			if( isset($value) && $value != '' ){
				$output[] = $key . '=' . '"' . esc_attr( $value ) . '"' ;
			}
		}

        return implode( ' ', $output );
	}
}


/* ==========================================================================
   Shortcode For this plugin
   ========================================================================== */


add_shortcode( 'wpb-portfolio','wpb_fp_shortcode_funcation' );	

if( !function_exists( 'wpb_fp_shortcode_funcation' ) ):
	function wpb_fp_shortcode_funcation( $atts ){

		$cat_excludes = wpb_fp_get_option( 'wpb_fp_cat_exclude_', 'wpb_fp_advanced', array() );
		$cat_include  = wpb_fp_get_option( 'wpb_fp_cat_include_', 'wpb_fp_advanced', array() );

		extract(shortcode_atts(array(
			'orderby'				=> 'date', // portfolio orderby
			'order'					=> 'DESC', // portfolio order
			'exclude'				=> ( isset($cat_excludes) && !empty($cat_excludes) ? implode(',', $cat_excludes ) : '' ), // comma separated portfolio category ids
			'include'				=> ( isset($cat_include) && !empty($cat_include) ? implode(',', $cat_include ) : '' ), // comma separated portfolio category ids
			'column'				=> wpb_fp_get_option( 'wpb_fp_column_', 'wpb_fp_general', 4 ), // 2, 3, 4, 6

			'type'					=> 'grid', //slider

			'autoplay'				=> wpb_fp_get_option( 'wpb_fp_autoplay', 'wpb_fp_slider', 'on' ),
			'loop'					=> wpb_fp_get_option( 'wpb_fp_loop', 'wpb_fp_slider', '' ),
			'items'					=> wpb_fp_get_option( 'wpb_fp_items', 'wpb_fp_slider', 3 ),
			'tablet'				=> wpb_fp_get_option( 'wpb_fp_items_tablet', 'wpb_fp_slider', 2 ),
			'mobile'				=> wpb_fp_get_option( 'wpb_fp_items_mobile', 'wpb_fp_slider', 1 ),
			'navigation'			=> wpb_fp_get_option( 'wpb_fp_navigation', 'wpb_fp_slider', 'on' ),
			'pagination'			=> wpb_fp_get_option( 'wpb_fp_pagination', 'wpb_fp_slider', 'on' ),
			'margin'				=> wpb_fp_get_option( 'wpb_fp_margin', 'wpb_fp_slider', 15 ),
		), $atts));
	   
		ob_start();

		echo do_shortcode( '[wpb-another-portfolio orderby="'.$orderby.'" order="'.$order.'" fp_category="'.$include.'" exclude_tax="'.$exclude.'" column="'.$column.'" type="'.$type.'" autoplay="'.$autoplay.'" loop="'.$loop.'" items="'.$items.'" tablet="'.$tablet.'" mobile="'.$mobile.'" navigation="'.$navigation.'" slider_pagination="'.$pagination.'" margin="'.$margin.'"]' );

		return ob_get_clean();
	}
endif;



/* ==========================================================================
   Another Portfolio
   Added since V 1.06
   ========================================================================== */

add_shortcode( 'wpb-another-portfolio','wpb_fp_another_portfolio_shortcode_funcation' );

if( !function_exists('wpb_fp_another_portfolio_shortcode_funcation') ):
	function wpb_fp_another_portfolio_shortcode_funcation( $atts ){

		extract(shortcode_atts(array(
			'shortcode_id'			=> '',
			'orderby'				=> 'date', // portfolio orderby
			'order'					=> 'DESC', // portfolio order
			'fp_category'			=> '', // comma separated cat id's
			'exclude_tax'			=> '', // comma separated cat id's
			'posts'					=> -1, // Number of post
			'pagination'			=> 'off',
			'filtering'				=> 'yes',
			'column' 				=> wpb_fp_get_option( 'wpb_fp_column_', 'wpb_fp_general', 4 ),
			'width' 				=> wpb_fp_get_option( 'wpb_fp_image_width_', 'wpb_fp_advanced', 680 ),
			'height' 				=> wpb_fp_get_option( 'wpb_fp_image_height_', 'wpb_fp_advanced', 680 ),
			'post_type' 			=> wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' ),
			'taxonomy' 				=> wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ),
			'wpb_fp_skin' 			=> wpb_fp_get_option( 'wpb_fp_skin', 'wpb_fp_style', 'img_bg_hover_effect' ),
			'img_hard_crop' 		=> wpb_fp_get_option( 'wpb_fp_image_hard_crop_', 'wpb_fp_advanced', 'yes' ),
			'img_no_hard_crop_size' => wpb_fp_get_option( 'wpb_fp_no_hard_crop_image_size', 'wpb_fp_advanced', 'wpb_portfolio_thumbnail' ),
			'filtering_script' 		=> wpb_fp_get_option( 'wpb_fp_filtering_script', 'wpb_fp_advanced', 'mixitup' ),
			'filter_style' 			=> wpb_fp_get_option( 'wpb_fp_filter_style_', 'wpb_fp_style', 'default' ),
			'quickview_type' 	    => wpb_fp_get_option( 'wpb_fp_quickview_type', 'wpb_quickview_settings', 'image_content' ),
			'load_more' 	    	=> wpb_fp_get_option( 'wpb_fp_load_more', 'wpb_fp_general' ),
			'hide_sub_categories'	=> 'no',
			'filter_orderby'		=> 'name',
			'filter_order'			=> 'ASC',
			'filter_number'			=> '',
			'filter_all_text'		=> wpb_fp_get_option( 'wpb_fp_all_btn_text', 'wpb_fp_general', esc_html__( 'All', WPB_FP_TEXTDOMAIN ) ),

			'type'					=> 'grid', //slider

			'autoplay'				=> wpb_fp_get_option( 'wpb_fp_autoplay', 'wpb_fp_slider', 'on' ),
			'loop'					=> wpb_fp_get_option( 'wpb_fp_loop', 'wpb_fp_slider', '' ),
			'items'					=> wpb_fp_get_option( 'wpb_fp_items', 'wpb_fp_slider', 3 ),
			'tablet'				=> wpb_fp_get_option( 'wpb_fp_items_tablet', 'wpb_fp_slider', 2 ),
			'mobile'				=> wpb_fp_get_option( 'wpb_fp_items_mobile', 'wpb_fp_slider', 1 ),
			'navigation'			=> wpb_fp_get_option( 'wpb_fp_navigation', 'wpb_fp_slider', 'on' ),
			'slider_pagination'		=> wpb_fp_get_option( 'wpb_fp_pagination', 'wpb_fp_slider', 'on' ),
			'margin'				=> wpb_fp_get_option( 'wpb_fp_margin', 'wpb_fp_slider', 15 ),

		), $atts));

		$rand_id 			= rand( 10,1000 );
		$wpb_fp_filtering 	= wpb_fp_get_option( 'wpb_fp_filtering', 'wpb_fp_advanced', 'enable' );
		$quickview_gallery 	= wpb_fp_get_option( 'wpb_fp_quickview_gallery', 'wpb_quickview_settings', '' );
		$enable_slider 		= wpb_fp_get_option( 'wpb_fp_enable_slider', 'wpb_fp_slider' );

		if( $quickview_gallery && $quickview_gallery == 'on' ){
			$quickview_gallery_class = 'yes';
		}else{
			$quickview_gallery_class = 'no';
		}

		if( isset($_GET['wpb_portfolio_skin']) ) {
			$wpb_fp_skin = $_GET['wpb_portfolio_skin'];
		}

		if( isset($_GET['filtering_script']) ) {
			$filtering_script = $_GET['filtering_script'];
		}

		if( isset($_GET['filter_style']) ) {
			$filter_style = $_GET['filter_style'];
		}

		if( isset($_GET['quickview_type']) ) {
			$quickview_type = $_GET['quickview_type'];
		}

		if( isset($_GET['wpb_column']) ) {
			$column = $_GET['wpb_column'];
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type' 		=> $post_type,
			'posts_per_page'	=> $posts,
			'orderby' 			=> $orderby,
			'order' 			=> $order,
			'paged' 			=> $paged,
			'meta_query' 		=> array( array('key' => '_thumbnail_id') ),
		);

		// Exclude current post if using as relative posts

		if( is_singular( $post_type ) ){
			$args['post__not_in'] = array(get_the_id());
		}

		// Exclude selected categories form portfolio.
		
		if( $exclude_tax && $exclude_tax != '' ){
			$exclude_tax = explode(',', $exclude_tax);
			$args['tax_query'][] = array(
				'taxonomy' 	=> $taxonomy,
		        'field'    	=> 'id',
				'terms'    	=> $exclude_tax,
		        'operator' 	=> 'NOT IN' 
			);
		}

		// only selected categories
		if( $fp_category && $fp_category != '' ){
			$fp_category = explode(',', $fp_category);
			$args['tax_query'][] = array(
				'taxonomy' 	=> $taxonomy,
		        'field'    	=> 'id',
				'terms'    	=> $fp_category,
		        'operator' 	=> 'IN' 
			);
		}

		/**
		 * Porfolio Filter options
		 */
		
		$filter_options = array(
			'hide_sub_categories'	=> $hide_sub_categories,
			'orderby'				=> $filter_orderby,
			'order'					=> $filter_order,
			'number'				=> $filter_number,
			'all_text'				=> $filter_all_text,
			'shortcode_id'			=> $shortcode_id,
		);

		if( $type == 'slider' ){
			$portfolio_class 	= 'wpb_fp_slider owl-carousel owl-theme';
			$column_class 		= array('wpb_fp_slider_item');
		}else{
			$portfolio_class 	= 'wpb_fp_row wpb_fp_grid';
			$column_class 		= apply_filters( 'wpb_fp_portfolio_column_class', array( 'col-lg-'.$column, 'col-md-6' ) );
		}

		if( $wpb_fp_skin == 'single_slider' ){
			$items = $tablet = $mobile = 1;
			$margin = 0;
			if( $type == 'grid' ){
				$column_class = array( 'col-lg-12', 'col-md-12' );
			}
		}

		$slider_attr = array(
	    	'data-autoplay' 	=> ( $autoplay == 'on' ? 'true' : 'false' ),
	    	'data-loop' 	    => ( $loop == 'on' ? 'true' : 'false' ),
	    	'data-items' 		=> $items,
	    	'data-tablet' 		=> $tablet,
	    	'data-mobile' 		=> $mobile,
	    	'data-navigation' 	=> ( $navigation == 'on' ? 'true' : 'false' ),
	    	'data-pagination' 	=> ( $slider_pagination == 'on' ? 'true' : 'false' ),
	    	'data-margin' 		=> $margin,
	    	'data-direction' 	=> ( is_rtl() ? 'true' : 'false' ),
	    );

		$loop = new WP_Query( apply_filters( 'wpb_portfolio_post_args', $args, $shortcode_id ) );

		if ( $loop->have_posts() ) {
			$output = '<div class="wpb_portfolio_area wpb_category_portfolio wpb_portfolio_area_'.$filtering_script.'" data-ref="wpb_portfolio_'.$rand_id.'">';

			if($type == 'slider' && $enable_slider != 'on'){
				$output .= '<div class="wpb_fp_notice wpb_fp_notice_error">'. esc_html__( 'Please, enable the slider from the settings.', WPB_FP_TEXTDOMAIN ) .'</div>';
			}

			if( $wpb_fp_filtering == 'enable' && $filtering == 'yes' && $type == 'grid'){
				ob_start();
				wpb_fp_portfolio_filter( $taxonomy, $exclude_tax, $fp_category, $filter_style, $filter_options, $filtering_script );
				$output .= ob_get_clean();
			}

			$output .= '<div class="wpb_portfolio '.$portfolio_class.' wpb_fp_skin_'. esc_attr( $wpb_fp_skin ) .' wpb_fp_quickview_arrows_'. esc_attr( $quickview_gallery_class ) .' wpb_portfolio_quickview_'. esc_attr( $quickview_type ) .' '. esc_attr( $wpb_fp_skin ) .'" '.(  $type == 'slider' ? wpb_fp_data_attr_implode( $slider_attr ) : '' ).'>';

			while ( $loop->have_posts() ) : $loop->the_post();
				ob_start();

					wpb_fp_get_template( 'portfolio-loop-'.$wpb_fp_skin.'.php', array( 'atts' => $atts, 'portfolio_id' => $rand_id, 'column_class' => $column_class ) );

				$output .= ob_get_clean();
			endwhile;

			$output .= '</div>';

			if ( $load_more == 'on' && $loop->max_num_pages > 1 && $type == 'grid' ) {
				$output .=	'<div class="wpb-fp-loadmore"><span class="wpb-fp-loadmore-btn wpb_fp_btn" data-column_class='. implode(',', $column_class) .' data-atts='. wp_json_encode($atts) .' data-query='. wp_json_encode($args) .' data-loading="'. esc_html__( 'Loading...', WPB_FP_TEXTDOMAIN ) .'" data-paged="'. $paged .'" data-max-pages="'. esc_attr( $loop->max_num_pages ) .'">'. esc_html__( 'Load More', WPB_FP_TEXTDOMAIN ) .'</span></div>';
			}

			if ( function_exists('wpb_fp_pagination') && $pagination == 'on' && $type == 'grid' ) {
				$output .=	wpb_fp_pagination( $loop->max_num_pages, "", $paged );
			}

			if( $shortcode_id && is_user_logged_in() ){
				if( current_user_can('edit_post', $shortcode_id ) ){
					$output .= '<a class="wpb-fp-edit-shortcode" href="'. esc_url( get_edit_post_link( $shortcode_id ) ) .'">'. esc_html__( 'Edit ShortCode', WPB_FP_TEXTDOMAIN ) .'</a>';
				}
			}

			$output .= '</div><!-- wpb_portfolio_area -->';
			$output .= do_action('wpb_fp_after_portfolio');

			wp_reset_postdata();

		} else {
			$output = esc_html__( 'No Portfolio Found.', WPB_FP_TEXTDOMAIN );
		}

		wpb_fp_get_scripts($atts);	

		return $output;

	}
endif;


/**
 * Portfolio Filter Shortcode
 */

add_shortcode( 'wpb-portfolio-filter','wpb_fp_portfolio_filter_shortcode_funcation' );	

if( !function_exists( 'wpb_fp_portfolio_filter_shortcode_funcation' ) ):
	function wpb_fp_portfolio_filter_shortcode_funcation( $atts ){

		extract(shortcode_atts(array(
			'taxonomy' 				=> wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ),
			'exclude'				=> '', // comma separated cat id's
			'include'				=> '', // comma separated cat id's
			'filter_style' 			=> wpb_fp_get_option( 'wpb_fp_filter_style_', 'wpb_fp_style', 'default' ),
			'hide_sub_categories'	=> 'no',
			'filter_orderby'		=> 'name',
			'filter_order'			=> 'ASC',
			'filter_number'			=> '',
			'filter_all_text'		=> wpb_fp_get_option( 'wpb_fp_all_btn_text', 'wpb_fp_general', esc_html__( 'All', WPB_FP_TEXTDOMAIN ) ),
			'shortcode_id'			=> '',
		), $atts));

		$filter_options = array(
			'hide_sub_categories'	=> $hide_sub_categories,
			'orderby'				=> $filter_orderby,
			'order'					=> $filter_order,
			'number'				=> $filter_number,
			'all_text'				=> $filter_all_text,
			'shortcode_id'			=> $shortcode_id,
			'extra_class'			=> 'wpb-portfolio-filter-shortcode',
		);
	   
		ob_start();

		wpb_fp_portfolio_filter( $taxonomy, $exclude, $include, $filter_style, $filter_options, $filtering_script );

		return ob_get_clean();
	}
endif;