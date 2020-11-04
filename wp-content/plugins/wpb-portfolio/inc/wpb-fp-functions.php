<?php

/*
    WPB Portfolio PRO
    By WPBean
    
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * WPB FP DropDown Category Walker
 */

if( !class_exists('WPB_FP_Dropdown_Category_Walker') ){
	class WPB_FP_Dropdown_Category_Walker extends Walker_Category {

	    /**
	     * Starts the list before the elements are added.
	     *
	     * Added for Flatsome theme issue fix
	     */
	    public function start_lvl( &$output, $depth = 0, $args = array() ) {
	        if ( 'list' != $args['style'] )
	            return;
	 
	        $indent = str_repeat("\t", $depth);
	        $output .= "$indent<ul class='wpb-fp-children'>\n";
	    }


		public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
			/** This filter is documented in wp-includes/category-template.php */
			$cat_name = apply_filters(
				'list_cats',
				esc_attr( $category->name ),
				$category
			);

			// Don't generate an element if the category name is empty.
			if ( ! $cat_name ) {
				return;
			}

			$wpb_fp_show_counting 	= wpb_fp_get_option( 'wpb_fp_show_counting_', 'wpb_fp_general', 'show' );
			$termname 				= 'wpb_fp_cat_'.$category->term_id;


			$link = '<span class="filter control" data-filter="' . '.' . $termname . '">'. $cat_name . '</span>';


			if ( 'list' == $args['style'] ) {

				$output .= "\t<li";
				$css_classes = array(
					'cat-item',
					'cat-item-' . $category->term_id,
				);

				$termchildren = get_term_children( $category->term_id, $category->taxonomy );

	            if( count($termchildren)>0 ){
	                $css_classes[] =  'cat-item-have-child';
	            }

				if ( ! empty( $args['current_category'] ) ) {
					$_current_category = get_term( $args['current_category'], $category->taxonomy );
					if ( $category->term_id == $args['current_category'] ) {
						$css_classes[] = 'current-cat';
					} elseif ( $category->term_id == $_current_category->parent ) {
						$css_classes[] = 'wpb-fp-current-cat-parent';
					}
				}

				$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

				$output .=  ' class="' . $css_classes . '"';
				$output .= ">$link\n";
			} else {
				$output .= "\t$link<br />\n";
			}
		}
	}
}



/**
 * Portfolio Post Category Name in Div class function
 */

if( !function_exists('wpb_fp_portfolio_categories') ):
	function wpb_fp_portfolio_categories( $taxonomy ){
	    global $post;
	    $category_ids 	= array();
	    $terms 			= get_the_terms( $post->ID, $taxonomy );
	                                                   
	    if ( $terms && ! is_wp_error( $terms ) ) :
	     
	        foreach ( $terms as $term ) {
	            $category_ids[] = 'wpb_fp_cat_'.$term->term_id;
	        }
	           
	    endif;

	    return $category_ids;      
	}
endif;


/**
 * Portfolio filter
 */

if( !function_exists('wpb_fp_portfolio_filter') ){
	function wpb_fp_portfolio_filter( $taxonomy, $exclude_tax, $fp_category, $filter_style, $filter_options = array(), $filtering_script ){
		wpb_fp_get_template( 'portfolio-filter.php', array( 'taxonomy' => $taxonomy, 'exclude_tax' => $exclude_tax, 'fp_category' => $fp_category, 'filter_style' => $filter_style, 'filter_options' => $filter_options, 'filtering_script' => $filtering_script ) );
	}
}


/**
 * Portfolio terms 
 */

if( !function_exists('wpb_fp_portfolio_terms') ):
	function wpb_fp_portfolio_terms( $taxonomy, $limit = 1, $link = true ){
	    global $post;
	    $categories 	= array();
	    $terms 			= get_the_terms( $post->ID, $taxonomy );
	                                                   
	    if ( $terms && ! is_wp_error( $terms ) ) :
	     	
	     	$i = 0;

	        foreach ( $terms as $term ) {
	            if($link == true){
	            	$categories[] = '<a class="wpb-fp-portfolio-item-category" href="'. esc_url( get_term_link( $term ) ) .'">'. esc_html( $term->name ) .'</a>';
	            }else{
	            	$categories[] = '<div class="wpb-fp-portfolio-item-category">'. esc_html( $term->name ) .'</div>';
	            }

	            if (++$i == $limit) break;
	        }
	           
	    endif;

	    if( !empty($categories) && isset($categories) ){
	    	return '<div class="wpb-fp-portfolio-item-categories">'. implode(', ', $categories) .'</div>';
	    }  
	}
endif;


/**
 * Add dynamic styles [ custom css ]
 */

function wpb_fp_dynamic_styles(){
	$primary_color 			= wpb_fp_get_option( 'wpb_fp_primary_color_', 'wpb_fp_style', '#DF6537' );
	$primary_color_hover 	= wpb_fp_get_option( 'wpb_fp_primary_color_hover', 'wpb_fp_style', '#009cba' );
	$quickview_max_width 	= wpb_fp_get_option( 'wpb_fp_quickview_max_width', 'wpb_quickview_settings', '1140' );

	ob_start();
	?>
		/* Color */
		.wpb-fp-filter li:hover,
		.wpb_portfolio .wpb_fp_icons .wpb_fp_preview i,
		.wpb_portfolio .wpb_fp_icons .wpb_fp_image_lightbox i,
		.wpb_fp_quick_view_content .wpb_fp_btn:hover,
		.wpb-fp-loadmore .wpb_fp_btn:hover,
		.wpb-fp-menu-toggle.wpb_fp_btn:hover,
		.wpb_fp_filter_dropdown.wpb_fp_filter_capsule li.active > span,
		.wpb_fp_filter_dropdown.wpb_fp_filter_capsule li.mixitup-control-active > span,
		.woocommerce.wpb-fp-woocommerce-elements a.added_to_cart {
			color: <?php echo $primary_color; ?>!important;
		}
		/* Border color */
		.tooltipster-punk, 
		.wpb_fp_filter_default li:hover,
		.wpb_fp_filter_default li.active,
		.wpb_fp_filter_default li.mixitup-control-active,
		.wpb_fp_quick_view_content .wpb_fp_btn:hover,
		.wpb-fp-loadmore .wpb_fp_btn,
		.wpb-fp-loadmore .wpb_fp_btn:hover,
		.wpb-fp-menu-toggle.wpb_fp_btn,
		.wpb-fp-menu-toggle.wpb_fp_btn:hover,
		.wpb_fp_quick_view_content .wpb_fp_btn,
		body .wpb-fp-filter.wpb_fp_filter_capsule_two li.active,
		body .wpb-fp-filter.wpb_fp_filter_capsule_two li.mixitup-control-active {
			border-color: <?php echo $primary_color; ?>!important;
		}
		.flat_design_title_cats .wpb-fp-item .portfolio_info {
			border-bottom-color: <?php echo $primary_color; ?>!important;
		}
		/* Background color */
		.wpb_portfolio .wpb_fp_icons .wpb_fp_link i,
		.wpb_fp_btn,
		.wpb_fp_filter_capsule li.active,
		.wpb_fp_filter_capsule li.mixitup-control-active,
		.wpb_fp_filter_select_area,
		.wpb_fp_filter_select_area .wpb-fp-portfolio-select-sort,
		.wpb_fp_filter_select_area li,
		.wpb-fp-pagination a.page-numbers:hover,
		.wpb-fp-pagination .page-numbers.current,
		.flat_design_title_cats .portfolio_thumbnail .center-bar a,
		.blog_post_style_portfolio .portfolio-type,
		.material_design_portfolio .wpb-fp-portfolio-block .wpb-fp-portfolio-link,
		body .wpb-fp-filter.wpb_fp_filter_capsule_two li.active,
		body .wpb-fp-filter.wpb_fp_filter_capsule_two li.mixitup-control-active,
		.reptro_portfolio .wpb-fp-item figure:hover:before, 
		.reptro_portfolio .wpb-fp-item figure:focus:before,
		.wpb_fp_slider.owl-carousel .owl-nav button,
		.wpb_fp_skin_news_magazine .wpb-fp-portfolio-item-category,
		.woocommerce.wpb-fp-woocommerce-elements a.button {
			background: <?php echo $primary_color; ?>!important;
		}
		.wpb_fp_slider.owl-carousel .owl-nav button:hover, 
		.wpb_fp_slider.owl-carousel .owl-nav button:focus,
		.wpb_fp_slider.owl-carousel.owl-theme .owl-dots .owl-dot span,
		.woocommerce.wpb-fp-woocommerce-elements a.button:hover, .woocommerce.wpb-fp-woocommerce-elements a.button:focus {
			background: <?php echo $primary_color_hover; ?>!important;
		}
		/* Title font size */
		.wpb_fp_grid figure h2 {
			font-size: <?php echo wpb_fp_get_option( 'wpb_fp_title_font_size_', 'wpb_fp_style', 20 ); ?>px!important;
		}
		figure.effect-layla,
		figure.effect-roxy,
		figure.effect-bubba,
		figure.effect-marley,
		figure.effect-oscar {
		    background: <?php echo wpb_fp_get_option( 'wpb_fp_portfolio_bg_', 'wpb_fp_style', '#18a367' ); ?>!important;
		}
		<?php if($quickview_max_width): ?>
		.white-popup {
			max-width: <?php echo $quickview_max_width; ?>px!important;
		}
		<?php endif; ?>
	}
	<?php

	$custom_style = ob_get_clean();
	wp_register_style('wpb-fp-main', plugins_url('../assets/css/main.css', __FILE__), '', '1.0');
	wp_add_inline_style( 'wpb-fp-main', $custom_style );
}
add_action( 'wp_enqueue_scripts','wpb_fp_dynamic_styles', 20 );




/**
 * excerpt with custom length
 */


if( !function_exists('wpb_fp_the_excerpt_max_charlength') ){
	function wpb_fp_the_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex 		= mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords 	= explode( ' ', $subex );
			$excut 		= - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut ) . '...';
			} else {
				return $subex;
			}
			return '...';
		} else {
			return $excerpt;
		}
	}
}


/**
 * Getting all custom post type avaiable for portfolio plugin
 */

if ( ! function_exists('wpb_fp_post_type_select_option_for_meta') ) {

	function wpb_fp_post_type_select(){

		$args = array(
		   	'public'   => true,
   			'_builtin' => false
		);

		$rerutn_object = get_post_types( $args );
		$rerutn_object['post'] = 'Post';

		return $rerutn_object;
	}

}


if ( ! function_exists('wpb_fp_taxonomy_select') ) {

	// Getting all custom taxonomy avaiable for portfolio plugin

	function wpb_fp_taxonomy_select(){
		$taxonomy = array();
		$args = array(
			'public' => true,
		);
		$taxonomy_objects = get_taxonomies( $args, 'objects' );
		foreach ($taxonomy_objects as $taxonomy_object) {
			$taxonomy[$taxonomy_object->name] = $taxonomy_object->label;
		}

		return $taxonomy;
	}

}


if ( ! function_exists('wpb_fp_exclude_categories') ) {

	// Exclude selected categiry form portfolio.

	function wpb_fp_exclude_categories(){
		$terms = $category_link = array();
		$wpb_fp_post_type = wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' );
		$taxonomy_objects = get_object_taxonomies( $wpb_fp_post_type, 'objects' );

		if( isset($taxonomy_objects) && !empty($taxonomy_objects) ){
		 	$wpb_fp_taxonomy = wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' );
		    $terms = get_terms($wpb_fp_taxonomy);
		    foreach ( $terms as $term ) {
		        $category_link[$term->term_id] = $term->name;
		    }                                         
	      
	    }
	    return $category_link;
	}

}



if ( ! function_exists('wpb_fp_post_type_multicheck_option') ) {

	// Exclude selected categiry form portfolio.

	function wpb_fp_post_type_multicheck_option(){
		$args = array(
		   	'public'   => true,
   			'_builtin' => false
		);
		$output = array();
		$post_types = get_post_types( $args );
		$post_types[] = 'post';

		foreach ($post_types as $post_type) {
			$output[$post_type] = $post_type;
		}

	    return $output;
	}

}




/**
 * Ajax quick view
 */

add_action('wp_ajax_wpb_fp_quickview', 'wpb_fp_quickview');
add_action('wp_ajax_nopriv_wpb_fp_quickview', 'wpb_fp_quickview');

/** The Quickview Ajax Output **/
if( !function_exists('wpb_fp_quickview') ):
	function wpb_fp_quickview() {
	    global $post;
	    $post_id 	=  $_POST["portfolio"];
	    $post 		= get_post($post_id);
	    ob_start();

		//require_once WPB_FP_URI. 'templates/content-portfolio-lightbox.php';
		wpb_fp_get_template( 'content-portfolio-lightbox.php', array( 'post_id' => $post_id ) );

	    $output = ob_get_contents();
	    ob_end_clean();
	    echo $output;
	    die();
	}
endif;


/**
 * Gallery Image Size
 */

if( !function_exists('wpb_fp_add_image_sizes') ):
	function wpb_fp_add_image_sizes() {
		$width = wpb_fp_get_option( 'wpb_fp_qv_img_width', 'wpb_fp_gallery', 756 );
		$height = wpb_fp_get_option( 'wpb_fp_qv_img_height', 'wpb_fp_gallery', 423 );

		$image_hard_crop = wpb_fp_get_option( 'wpb_fp_gallery_image_hard_crop', 'wpb_fp_gallery', 'on' );
		$x_crop_position = wpb_fp_get_option( 'wpb_fp_gallery_image_x_crop_position', 'wpb_fp_gallery', 'center' );
		$y_crop_position = wpb_fp_get_option( 'wpb_fp_gallery_image_y_crop_position', 'wpb_fp_gallery', 'center' );
		$crop = false;

		if( $image_hard_crop == 'on' ){
			$crop = array( $x_crop_position, $y_crop_position );
		}

	    add_image_size( 'wpb-fp-full', $width, $height, $crop );
	}
endif;
add_action( 'after_setup_theme', 'wpb_fp_add_image_sizes' );


/**
 * Gallery Setting sections
 */

add_filter( 'wpb_fp_settings_sections', 'wpb_fp_gallery_settings_section', 10 );

if( !function_exists('wpb_fp_gallery_settings_section') ):
	function wpb_fp_gallery_settings_section($sections){
		$wpb_fp_gallery_support = wpb_fp_get_option( 'wpb_fp_gallery_support', 'wpb_fp_general', 'on' );

		if( $wpb_fp_gallery_support == 'on' ){
			$sections[] = array(
				'id' 	=> 'wpb_fp_gallery',
	            'title' => esc_html__( 'Single Portfolio Gallery Settings', WPB_FP_TEXTDOMAIN )
			);
		}

		return $sections;
	}
endif;



/**
 * Gallery Setting fields
 */

add_filter( 'wpb_fp_settings_fields', 'wpb_fp_gallery_settings_fields', 10 );

if( !function_exists('wpb_fp_gallery_settings_fields') ):
	function wpb_fp_gallery_settings_fields($settings_fields){
		$wpb_fp_gallery_support = wpb_fp_get_option( 'wpb_fp_gallery_support', 'wpb_fp_general', 'on' );

		if( $wpb_fp_gallery_support == 'on' ){
			$settings_fields['wpb_fp_gallery'] = array(
				array(
                    'name'      => 'wpb_fp_gallery_images_in_portfolio_page',
                    'label'     => esc_html__( 'Show Gallery on Single Portfolio Page', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on'
                ),
				array(
                    'name'      => 'wpb_fp_gallery_type',
                    'label'     => esc_html__( 'Gallery Type', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select gallery type.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'slider',
                    'options'   => array(
                        'slider'     => esc_html__( 'Slider', WPB_FP_TEXTDOMAIN ),
                        'grid'     	 => esc_html__( 'Images Grid', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_gallery_column',
                    'label'     => esc_html__( 'Gallery Grid Column', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Number of gallery grid column.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => '5',
                    'options'   => array(
                        '5'     => esc_html__( '5 Columns', WPB_FP_TEXTDOMAIN ),
                        '3'     => esc_html__( '4 Columns', WPB_FP_TEXTDOMAIN ),
                        '4'     => esc_html__( '3 Columns', WPB_FP_TEXTDOMAIN ),
                        '6'     => esc_html__( '2 Columns', WPB_FP_TEXTDOMAIN ),
                        '12'    => esc_html__( '1 Columns', WPB_FP_TEXTDOMAIN ),
                    )
                ),
				array(
                    'name'  	=> 'wpb_fp_gallery_feature_image',
                    'label' 	=> esc_html__( 'Show Feature Image in Gallery', WPB_FP_TEXTDOMAIN ),
                    'desc'  	=> esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'  	=> 'checkbox',
                    'default'   => 'on'
                ),
				array(
                    'name'  => 'wpb_fp_gallery_autoplay',
                    'label' => esc_html__( 'Gallery Slider Autoplay ?', WPB_FP_TEXTDOMAIN ),
                    'desc'  => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'  	=> 'wpb_fp_gallery_caption',
                    'label' 	=> esc_html__( 'Gallery Slider Show Caption', WPB_FP_TEXTDOMAIN ),
                    'desc'  	=> esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'  	=> 'checkbox',
                    'default'   => 'on'
                ),
                array(
                    'name'      => 'wpb_fp_gallery_speed',
                    'label'     => esc_html__( 'Gallery Slider Speed', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Quickview gallery spped. Default: 600', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 600
                ),
                array(
                    'name'      => 'wpb_fp_gallery_image_settings',
                    'class'		=> 'wpb_fp_settings_subtitle',
                    'label'     => esc_html__( 'Gallery Images Size Settings', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'subtitle',
                    'placeholder' => esc_html__( 'Gallery Images Size Settings', WPB_FP_TEXTDOMAIN ),
                ),
                array(
                    'name'  	=> 'wpb_fp_no_resize_the_gallery_image',
                    'label' 	=> esc_html__( 'Gallery Images Resize', WPB_FP_TEXTDOMAIN ),
                    'desc'  	=> esc_html__( 'Load full size images', WPB_FP_TEXTDOMAIN ),
                    'type'  	=> 'checkbox',
                ),
                array(
                    'name'      => 'wpb_fp_qv_img_width',
                    'label'     => esc_html__( 'Image Width', WPB_FP_TEXTDOMAIN ),
                    'desc'      => __( 'Gallery lightbox image width. Default 756. Use <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a> plugin & regenerate all thumbnails after changing the size and other image settings.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 756
                ),
                array(
                    'name'      => 'wpb_fp_qv_img_height',
                    'label'     => esc_html__( 'Image height', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Gallery lightbox image height. Default 423', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 423
                ),
                array(
                    'name'  	=> 'wpb_fp_gallery_image_hard_crop',
                    'label' 	=> esc_html__( 'Hard crop gallery images.', WPB_FP_TEXTDOMAIN ),
                    'desc'  	=> esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'  	=> 'checkbox',
                    'default'   => 'on'
                ),
                array(
                    'name'      => 'wpb_fp_gallery_image_x_crop_position',
                    'label'     => esc_html__( 'X crop position', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'When setting a crop position, the first value in the array is the x axis crop position, the second is the y axis crop position. <a href="https://developer.wordpress.org/reference/functions/add_image_size/#crop-mode" target="_blank">Details</a>', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'center',
                    'options'   => array(
                        'center'     => esc_html__( 'Center', WPB_FP_TEXTDOMAIN ),
                        'left'    	 => esc_html__( 'Left', WPB_FP_TEXTDOMAIN ),
                        'right'      => esc_html__( 'Right', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_gallery_image_y_crop_position',
                    'label'     => esc_html__( 'Y crop position', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'When setting a crop position, the first value in the array is the x axis crop position, the second is the y axis crop position. <a href="https://developer.wordpress.org/reference/functions/add_image_size/#crop-mode" target="_blank">Details</a>', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'center',
                    'options'   => array(
                        'center'     => esc_html__( 'Center', WPB_FP_TEXTDOMAIN ),
                        'top'    	 => esc_html__( 'Top', WPB_FP_TEXTDOMAIN ),
                        'bottom'     => esc_html__( 'Bottom', WPB_FP_TEXTDOMAIN ),
                    )
                ),
			);
		}

		return $settings_fields;
	}
endif;



/**
 * Portfolio Pagination 
 */

if( !function_exists('wpb_fp_pagination') ):
	function wpb_fp_pagination($numpages = '', $pagerange = '', $paged='') {

		if (empty($pagerange)) {
			$pagerange = 2;
		}

		/**
		* This first part of our function is a fallback
		* for custom pagination inside a regular loop that
		* uses the global $paged and global $wp_query variables.
		* 
		* It's good because we can now override default pagination
		* in our theme, and use this function in default quries
		* and custom queries.
		*/
		global $paged;
		if (empty($paged)) {
			$paged = 1;
		}
		if ($numpages == '') {
			global $wp_query;
			$numpages = $wp_query->max_num_pages;
			if(!$numpages) {
				$numpages = 1;
			}
		}
		$big = 999999999; // need an unlikely integer

		$output = '';

		/** 
		* We construct the pagination arguments to enter into our paginate_links
		* function. 
		*/
		$pagination_args = array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'          => '?paged=%#%',
			'total'           => $numpages,
			'current'         => max( 1, $paged ),
			'show_all'        => false,
			'end_size'        => 1,
			'mid_size'        => $pagerange,
			'prev_next'       => true,
			'prev_text'       => esc_html__('&laquo;'),
			'next_text'       => esc_html__('&raquo;'),
			'type'            => 'array',
			'add_args'        => false,
			'add_fragment'    => ''
		);

		$pages = paginate_links($pagination_args);

		if( is_array( $pages ) ) {
			$output .= "<ul class='wpb-fp-pagination pagination'>";
			$output .=  sprintf( '<li class="page-numbers page-num">'. esc_html__( 'Page %s of %s', WPB_FP_TEXTDOMAIN ) .'</li>',  esc_html( $paged ), esc_html( $numpages ) );
			foreach ( $pages as $page ) {
		        $output .=  "<li>$page</li>";
		    }
			$output .= "</ul>";
			return $output;
		}

	}
endif;



/**
 * Visual Composer Element
 */

function wpb_fp_get_shortcodes_list(){
	$output = array( esc_html__( 'Select a shortcode', WPB_FP_TEXTDOMAIN ) => '' );
	$args = array(
		'posts_per_page'   => -1,
		'post_type'        => 'wpb_fp_shortcode_gen',
		'post_status'      => 'publish',
	);

	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$output[$post->post_title] = $post->ID;
	}

	return $output;
}



if ( ! class_exists( 'wpb_fp_vc_elements_class' ) ) {

	/**
	 * Logo slider VC element Class
	 *
	 * @since	1.0
	 */
	class wpb_fp_vc_elements_class {


		public $text_domain = WPB_FP_TEXTDOMAIN; // textdomain for the plugin


		/**
		 * Constructor, checks for Visual Composer and defines hooks
		 *
		 * @since	1.0
		 */
		function __construct() {
            add_action( 'after_setup_theme', array( $this, 'wpb_fp_init' ), 1 );
		}

        public function wpb_fp_init() {
            if ( ! defined( 'WPB_VC_VERSION' ) ) {
                return;
            }
            if ( version_compare( WPB_VC_VERSION, '4.2', '<' ) ) {
        		add_action( 'after_setup_theme', array( $this, 'wpb_fp_vc_element' ) );
            } else {
        		add_action( 'vc_before_init', array( $this, 'wpb_fp_vc_element' ) );
            }
        }



		public function wpb_fp_vc_element() {
			// Check if Visual Composer is installed
			if ( ! defined( 'WPB_VC_VERSION' ) || ! function_exists( 'vc_add_param' ) ) {
				return;
			}


			vc_map( array(				
				'name' 			=> esc_html__( 'WPB Portfolio', $this->text_domain ),
				'base' 			=> 'wpb-portfolio-shortcode',
				'icon' 			=> 'wpb_fp_icon',
				'wrapper_class' => 'wpb_fp_clearfix',
				'description' 	=> esc_html__( 'WPB filterable portfolio.', $this->text_domain ),
			    'params' 		=> array(
				
					array(
						'type' 			=> 'dropdown',
						'heading' 		=> esc_html__( 'Shortcode', $this->text_domain ),
						'param_name' 	=> 'id',
						'value'			=> wpb_fp_get_shortcodes_list(),
						'description' 	=> esc_html__( 'Choose a shortcode. Go to shortcode generator for adding a new shortcode.', $this->text_domain ),
						'admin_label' 	=> true,
					)
					
			    ),
			) );
		}

	}

	new wpb_fp_vc_elements_class();
}


/**
 * Add Portfolio Images
 */

add_action( 'after_setup_theme', 'wpb_fp_add_new_image_size' );

function wpb_fp_add_new_image_size() {
	$width = wpb_fp_get_option( 'wpb_fp_image_width_', 'wpb_fp_advanced', 680 );
	$height = wpb_fp_get_option( 'wpb_fp_image_height_', 'wpb_fp_advanced', 680 );
    add_image_size( 'wpb_portfolio_thumbnail', $width, $height, true );
}


/**
 * Adding portfolio video and gallery images in portfolio details page
 */

add_filter( 'the_content', 'wpb_fp_show_gallery_images_video_in_portfolio_page' );

if( !function_exists('wpb_fp_show_gallery_images_video_in_portfolio_page') ){
	function wpb_fp_show_gallery_images_video_in_portfolio_page( $content ){
		$wpb_fp_post_type 					= wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' );
		$gallery_images_in_portfolio_page 	= wpb_fp_get_option( 'wpb_fp_gallery_images_in_portfolio_page', 'wpb_fp_gallery', 'on' );
		$video_in_portfolio_page 			= wpb_fp_get_option( 'wpb_fp_video_in_portfolio_page', 'wpb_fp_general', 'on' );
		$info_in_portfolio_page 			= wpb_fp_get_option( 'wpb_fp_info_in_portfolio_page', 'wpb_fp_general', 'on' );
		$wpb_fp_gallery_support 			= wpb_fp_get_option( 'wpb_fp_gallery_support', 'wpb_fp_general', 'on' );
		$video_iframe 						= get_post_meta( get_the_id(), 'wpb_fp_quickview_video_iframe', true );

		if( is_singular( $wpb_fp_post_type ) && $video_in_portfolio_page == 'on' ) {
			$content = $video_iframe . $content;
		}

		if( is_singular( $wpb_fp_post_type ) && $info_in_portfolio_page == 'on' ) {
			$content = wpb_fp_get_portfolio_informations( get_the_id() ) . $content;
		}

		if( is_singular( $wpb_fp_post_type ) && $gallery_images_in_portfolio_page == 'on' && function_exists('wpb_fp_quickview_galllery') ) {
			wpb_fp_get_scripts_single_portfolio();
			$content =  wpb_fp_quickview_galllery( '', get_the_id() ) . $content;
		}

		return $content;
	}
}


/**
 * Single portfolio gallery shortcode
 *
 * Since: V 2.4.2
 *
 * id: portfolio post id, required
 */

add_shortcode( 'wpb-single-portfolio-gallery', 'wpb_fp_single_portfolio_gallery_shortcode' );	

function wpb_fp_single_portfolio_gallery_shortcode( $atts ) {

	extract(shortcode_atts(array(
		'id'				=> get_the_id(),
		'gallery_type'		=> 'grid', // slider
	), $atts));
   
	ob_start();

	if( function_exists('wpb_fp_quickview_galllery') && $id ) {
		wpb_fp_get_scripts_single_portfolio();
		echo '<div class="wpb-fp-single-gallery-shortcode">';
		echo wpb_fp_quickview_galllery( '', $id, $gallery_type );
		echo '</div>';
	}

	return ob_get_clean();
}



/**
 * long description shortcode support
 */

add_filter( 'wpb_fp_portfolio_content', 'do_shortcode' );



/**
 * Get template part implementation
 *
 * Looks at the theme directory first
 */

function wpb_fp_get_template_part( $slug, $name = '' ) {
    $wpb_filterable_portfolio = WPB_Filterable_Portfolio::init();

    $templates = array();
    $name = (string) $name;

    // lookup at theme/slug-name.php or wpb-filterable-portfolio/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = $wpb_filterable_portfolio->theme_dir_path . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( $wpb_filterable_portfolio->template_path() . "{$slug}-{$name}.php" ) ) {
        $template = $wpb_filterable_portfolio->template_path() . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = array(
            "{$slug}.php",
            $wpb_filterable_portfolio->theme_dir_path . "{$slug}.php"
        );

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

/**
 * Include a template by precedance
 *
 * Looks at the theme directory first
 *
 * @param  string  $template_name
 * @param  array   $args
 *
 * @return void
 */

function wpb_fp_get_template( $template_name, $args = array() ) {
    $wpb_filterable_portfolio = WPB_Filterable_Portfolio::init();

    if ( $args && is_array($args) ) {
        extract( $args );
    }

    $template = locate_template( array(
        $wpb_filterable_portfolio->theme_dir_path . $template_name,
        $template_name
    ) );

    if ( ! $template ) {
        $template = $wpb_filterable_portfolio->template_path() . $template_name;
    }

    if ( file_exists( $template ) ) {
        include $template;
    }
}


/**
 * Get image sizes array for settings
 */

function wpb_fp_get_intermediate_image_sizes(){
	$sizes 		= get_intermediate_image_sizes();
	$sizes[] 	= 'full';
	$new_sizes 	= array(); 

	if( !empty($sizes) && isset($sizes) ){
		foreach ($sizes as $key => $size) {
			$new_sizes[$size] = $size;
		}
	}

	return $new_sizes;
}


/**
 * Get image sizes array for meta box
 */

function wpb_fp_get_intermediate_image_sizes_meta(){
	$sizes 		= get_intermediate_image_sizes();
	$sizes[] 	= 'full';
	$new_sizes 	= array(); 

	if( !empty($sizes) && isset($sizes) ){
		foreach ($sizes as $key => $size) {

			$new_sizes[$key] = array (  
		        'label' => $size,  
		        'value' => $size,
		    );
		}
	}

	return $new_sizes;
}

/**
 * Get image sizes array for Elementor
 */

function wpb_fp_get_intermediate_image_sizes_elementor(){
	$sizes 		= get_intermediate_image_sizes();
	$sizes[] 	= 'full';
	$sizes[] 	= 'custom';
	$output 	= array(); 

	if( !empty($sizes) && isset($sizes) ){
		foreach ($sizes as $size) {
		    $output[$size] = $size;
		}
	}

	return $output;
}


/**
 * Portfolio Skins
 */

add_filter( 'wpb_fp_portfolio_skins', 'wpb_fp_portfolio_skins' );

function wpb_fp_portfolio_skins( $skins ){

	$skins = array(
		array(
			'label' => esc_html__( 'Image background with hover effect', WPB_FP_TEXTDOMAIN ),
		    'value' => 'img_bg_hover_effect',
		),
		array(
			'label' => esc_html__( 'Minimal hover effect', WPB_FP_TEXTDOMAIN ),
		    'value' => 'minimal_hover_effect',
		),
		array(
			'label' => esc_html__( 'Material design', WPB_FP_TEXTDOMAIN ),
		    'value' => 'material_design_portfolio',
		),
		array(
			'label' => esc_html__( 'Flat design with title & categories', WPB_FP_TEXTDOMAIN ),
		    'value' => 'flat_design_title_cats',
		),
		array(
			'label' => esc_html__( 'Blog post style portfolio', WPB_FP_TEXTDOMAIN ),
		    'value' => 'blog_post_style_portfolio',
		),
		array(
			'label' => esc_html__( 'Reptro', WPB_FP_TEXTDOMAIN ),
		    'value' => 'reptro_portfolio',
		),
		array(
			'label' => esc_html__( 'News or Magazine', WPB_FP_TEXTDOMAIN ),
		    'value' => 'news_magazine',
		),
		array(
			'label' => esc_html__( 'Single Slider', WPB_FP_TEXTDOMAIN ),
		    'value' => 'single_slider',
		),
	);

	return $skins;
}


/**
 * Portfolio Skins for settings dropdown options
 */


function wpb_fp_get_portfolio_skins(){
	$skins 		= apply_filters( 'wpb_fp_portfolio_skins', array() );

	$output 	= array(); 

	if( !empty($skins) && isset($skins) ){
		foreach ($skins as $key => $skin) {
			$output[$skin['value']] = $skin['label'];
		}
	}

	return $output;
}


/**
 * Portfolio Skins for meta box dropdown options
 */

function wpb_fp_get_portfolio_skins_meta(){
	$skins 		= apply_filters( 'wpb_fp_portfolio_skins', array() );
	$output 	= array(); 

	if( !empty($skins) && isset($skins) ){
		foreach ($skins as $key => $skin) {

			$output[$skin['value']] = array (  
		        'label' => $skin['label'],  
		        'value' => $skin['value'],
		    );
		}
	}

	return $output;
}


/**
 * Portfolio Column Cat ID
 */

add_filter( 'manage_edit-wpb_fp_portfolio_cat_columns', 'wpb_fp_columns_head', 10, 3 );
add_filter( 'manage_wpb_fp_portfolio_cat_custom_column', 'wpb_fp_columns_content_taxonomy', 10, 3 );

/* Column Head */

if( !function_exists('wpb_fp_columns_head') ){
    function wpb_fp_columns_head( $defaults ) {
    	
    	$output = '';

        $defaults['wpb_fp_portfolio_cat_id']   = esc_html__( 'ID', WPB_FP_TEXTDOMAIN );

        return $defaults;
    }
}


/* Column Content */

if( !function_exists('wpb_fp_columns_content_taxonomy') ){
    function wpb_fp_columns_content_taxonomy($c, $column_name, $term_id) {

        if ($column_name == 'wpb_fp_portfolio_cat_id') {

            $output =  $term_id;
        }

        return $output;
    }
}


/**
 * Quick View layout config
 */

add_action( 'wpb_fp_quick_view_img_column', 'wpb_fp_quick_view_layout_config' );
add_action( 'wpb_fp_quick_view_content_column', 'wpb_fp_quick_view_layout_config' );

function wpb_fp_quick_view_layout_config( $column ){
	$quickview_layout = wpb_fp_get_option( 'wpb_fp_quickview_layout', 'wpb_quickview_settings', 'left_right' );

	if( $quickview_layout == 'top_bottom' ){
		$column = 'col-lg-12';
	}

	return $column;
}

/**
 * Portfolio Informations
 */

if( !function_exists('wpb_fp_portfolio_informations') ){
	function wpb_fp_portfolio_informations( $id = null ){

		if( !isset($id) || $id == null ){
			$id = get_the_ID();
		}

		$informations 		= get_post_meta( $id, 'wpb_fp_informations', true );
		$portfolio_email 	= get_post_meta( $id, 'wpb_fp_portfolio_email', true );

		$show_informations = true;

		if( isset($informations) && !empty($informations) ){
			if( count($informations) == 1 && $informations[0]['info_label'] == '' ){
				$show_informations = false; 
			}
		}

		echo do_action( 'wpb_fp_before_portfolio_informations', $id );

		if( isset($informations) && !empty($informations) && $show_informations == true ){

			echo '<ul class="wpb-fp-portfolio-informations">';
				foreach ( $informations as $information ) {
					?>
					<li>
						<?php if(array_key_exists('info_label', $information)): ?>
							<span class="wpb-fp-portfolio-info-label"><?php echo esc_html( $information['info_label'] ) ?></span>
						<?php endif; ?>
						<?php if(array_key_exists('the_info', $information)): ?>
							<span class="wpb-fp-portfolio-info-title"><?php echo esc_html( $information['the_info'] ) ?></span>
						<?php endif; ?>
					</li>
					<?php 
				}
			echo '</ul>';
		}

		echo do_action( 'wpb_fp_after_portfolio_informations', $id );

		if( $portfolio_email && $show_informations == true ){
			printf('<div class="wpb-fp-portfolio-email"><a href="mailto:%s">%s</a></div>', sanitize_email( $portfolio_email ), esc_html( $portfolio_email ));
		}
	}
}

/**
 * Get Portfolio Informations
 */

if( !function_exists('wpb_fp_get_portfolio_informations') ){
	function wpb_fp_get_portfolio_informations( $id = null ){
		ob_start();
		wpb_fp_portfolio_informations( $id );
		return ob_get_clean();
	}
}



/**
 * Get Portfolio short description
 */

if( !function_exists('wpb_fp_portfolio_short_desc') ){
	function wpb_fp_portfolio_short_desc( $id = null ){

		if( !isset($id) || $id == null ){
			$id = get_the_ID();
		}

		$short_description = get_post_meta( $id, 'wpb_fp_portfolio_short_description', true );

		if( $short_description ){
			echo sprintf('<div class="wpb-fp-short-desc">%s</div>',  wpautop( $short_description ) );
		}
	}
}


/**
 * Ajax handler for load more button
 */



add_action('wp_ajax_wpb_fp_loadmore', 'wpb_fp_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_wpb_fp_loadmore', 'wpb_fp_loadmore_ajax_handler');

/** The Quickview Ajax Output **/
if( !function_exists('wpb_fp_loadmore_ajax_handler') ):
	function wpb_fp_loadmore_ajax_handler() {
		$rand_id 				= rand( 10,1000 );
		$query_args 			= $_POST["query_args"];
		$shortcode_atts 		= $_POST["shortcode_atts"];
		$column 		        = $_POST["column_class"];
		$query_args['paged'] 	= $_POST['page'] + 1;
		//$query_args['paged']  	= (( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1) + 1;
	    $posts 					= new WP_Query( $query_args );

	    if( $posts->have_posts() ) {
	        while ( $posts->have_posts() ) { 
	            $posts->the_post();
	            wpb_fp_get_template( 'portfolio-loop-'.$shortcode_atts['wpb_fp_skin'].'.php', array( 'atts' => $shortcode_atts, 'portfolio_id' => $rand_id, 'column_class' => explode(',', $column) ) );
	        }
	    }

	    die();
	}
endif;


/**
 * PHP implode with key and value ( For data attr )
 */

if( !function_exists('wpb_fp_carousel_data_attr_implode') ){
    function wpb_fp_carousel_data_attr_implode( $array ){
        
        foreach ($array as $key => $value) {

            if( isset($value) &&  $value != '' ){
                $output[] = $key . '=' . '"'. esc_attr( $value ) . '"' ;
            }
        }

        return implode( ' ', $output );
    }
}


/**
 *  get WooCommerce Cart Button
 */

function wpb_fp_get_woocommerce_template_loop_add_to_cart(){

	if ( !function_exists('woocommerce_template_loop_add_to_cart') ) {
		return;
	}

	ob_start();
	woocommerce_template_loop_add_to_cart();
	return ob_get_clean();
}