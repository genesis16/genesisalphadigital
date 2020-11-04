<?php

/*
	WPB Filterable Portfolio
	By WPBean
	
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Shortcode Generator
 */

function wpb_fp_shortcode_generate_post_type() {

	$labels = array(
		'name'                => esc_html_x( 'Portfolio Shortcodes', 'Post Type General Name', WPB_FP_TEXTDOMAIN ),
		'singular_name'       => esc_html_x( 'Portfolio Shortcode', 'Post Type Singular Name', WPB_FP_TEXTDOMAIN ),
		'menu_name'           => esc_html__( 'Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'name_admin_bar'      => esc_html__( 'Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'parent_item_colon'   => esc_html__( 'Parent Portfolio Shortcode:', WPB_FP_TEXTDOMAIN ),
		'all_items'           => esc_html__( 'Portfolio Shortcodes', WPB_FP_TEXTDOMAIN ),
		'add_new_item'        => esc_html__( 'Add New Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'add_new'             => esc_html__( 'Add New Shortcode', WPB_FP_TEXTDOMAIN ),
		'new_item'            => esc_html__( 'New Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'edit_item'           => esc_html__( 'Edit Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'update_item'         => esc_html__( 'Update Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'view_item'           => esc_html__( 'View Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'search_items'        => esc_html__( 'Search Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'not_found'           => esc_html__( 'Not found', WPB_FP_TEXTDOMAIN ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', WPB_FP_TEXTDOMAIN ),
	);
	$args = array(
		'label'               => esc_html__( 'Portfolio Shortcode', WPB_FP_TEXTDOMAIN ),
		'description'         => esc_html__( 'Post Type For Portfolio Shortcode Generator ', WPB_FP_TEXTDOMAIN ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=wpb_fp_portfolio',
		'menu_position'       => 5,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,		
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'wpb_fp_shortcode_gen', $args );

}
add_action( 'init', 'wpb_fp_shortcode_generate_post_type', 0 );


/**
 * Post Type Title for Portfolio Shortcode 
 */

function wpb_fp_change_default_title_placeholder( $title ){
    $screen = get_current_screen();
    if ( 'wpb_fp_shortcode_gen' == $screen->post_type ){
        $title = esc_html__( 'Shortcode Name',WPB_FP_TEXTDOMAIN );
    }
    return $title;
}
add_filter( 'enter_title_here', 'wpb_fp_change_default_title_placeholder' );


/**
 * Post Type Title for Portfolio Shortcode 
 */

function wpb_fp_change_default_post_update_message( $message ){
    $screen = get_current_screen();
    if ( 'wpb_fp_shortcode_gen' == $screen->post_type ){
       $message['post'][1] = $title = esc_html__( 'Shortcode updated.',WPB_FP_TEXTDOMAIN );
       $message['post'][4] = $title = esc_html__( 'Shortcode updated.',WPB_FP_TEXTDOMAIN );
       $message['post'][6] = $title = esc_html__( 'Shortcode published.',WPB_FP_TEXTDOMAIN );
       $message['post'][8] = $title = esc_html__( 'Shortcode submitted.',WPB_FP_TEXTDOMAIN );
       $message['post'][10] = $title = esc_html__( 'Shortcode draft updated.',WPB_FP_TEXTDOMAIN );
    }
    return $message;
}
add_filter( 'post_updated_messages', 'wpb_fp_change_default_post_update_message' );

if(!function_exists('qtranxf_getLanguage') && defined( 'QTRANSLATE_FILE' ) ){
	function qtranxf_getLanguage() {
		global $q_config;
		return $q_config['language'];
	}
}

/**
 * Getting ready category for the shortcode generator checkbox group
 */


function wpb_fp_tax_for_checkbox_group_meta ( $taxonomy ){

	if ( ! taxonomy_exists( $taxonomy ) ) {
		return;
	}

	global $post;

	$output = array();

	$args = apply_filters( 'wpb_fp_checkbox_group_meta_get_terms_args', array(
    	'taxonomy' => $taxonomy,
	));

	/* PolyLang Support Added */ 
	
	if(function_exists('pll_current_language')){
    	$args['lang'] =  pll_current_language();
    }

    if( isset($_GET['lang']) ){
    	$args['lang'] =  $_GET['lang'];
    }

    $terms = get_terms( $taxonomy, $args );

	if($terms && function_exists('pll_get_term_language')){
		foreach ($terms as $key => $tax) {
			if(pll_get_term_language($tax->term_id) !== $args['lang']){
				unset($terms[$key]);
			}
		}
		$terms = array_values($terms);
	}

	/* Return the categories */

	if( $terms && !empty($terms) && !is_wp_error($terms) ){
		foreach ( $terms as $term ) {
	    	$output[$term->term_id] = array( 
	    		'label' => $term->name,
				'value'	=> $term->term_id,
	    	);
	    }
	}

    return $output;
}



/**
 * Shortcode options
 */

add_action( 'admin_init', 'wpb_fp_shortcode_generator_metaboxes' );

function wpb_fp_shortcode_generator_metaboxes(){
	$post_id 			= '';
	$prefix 			= 'wpb_fp_';
	$post_type 			= 'wpb_fp_shortcode_gen';
	global $pagenow;

    if( $pagenow == 'post.php' && isset($_GET['post'])  ){
    	$post_id 		= absint($_GET['post']);

    	if( get_post_type($post_id) == $post_type ){
    		$taxonomy 		= get_post_meta( $post_id, 'wpb_fp_taxonomy', true );
    	}else{
    		$taxonomy 		= wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' );
    	}
    }else{
    	$taxonomy 			= wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' );
	}
	
	if( $taxonomy == '' ){
		$taxonomy = 'wpb_fp_portfolio_cat';
	}

	$fields = array(
		array(
			'label'			=> esc_html__( 'Number of portfolio', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Number of portfolio, default -1, it will show all the portfolios', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'posts',
			'type'			=> 'slider',
			'min'			=> '-1',
			'max'			=> '100',
			'step'			=> '1',
			'default_value' => -1
		),
		array(
			'label'			=> esc_html__( 'Need Pagination', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: Off.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'pagination',
			'type'			=> 'select',
			'default_value'	=> 'off',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Show Load More Button', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: Off. Check it for enable the Load More Button', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'load_more',
			'type'			=> 'select',
			'default_value'	=> 'off',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'	=> esc_html__( 'Portfolio Order By', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Default: date.', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'orderby',
			'type'	=> 'select',
			'select_button'	=> true,
			'options' => array (
				'date' => array (
					'label' => esc_html__( 'Date', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'date'
				),
				'title' => array (
					'label' => esc_html__( 'Title', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'title'
				),
				'ID' => array (
					'label' => esc_html__( 'ID', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'ID'
				),
				'modified' => array (
					'label' => esc_html__( 'Last modified', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'modified'
				),
				'rand' => array (
					'label' => esc_html__( 'Random', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'rand'
				),
				'menu_order' => array (
					'label' => esc_html__( 'Menu Order', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'menu_order'
				),
			)
		),
		array(
			'label'	=> esc_html__( 'Portfolio Order', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Default: DESC.', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'order',
			'type'	=> 'select',
			'select_button'	=> true,
			'options' => array (
				'DESC' => array (
					'label' => esc_html__( 'Descending', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'DESC'
				),
				'ASC' => array (
					'label' => esc_html__( 'Ascending', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'ASC'
				),
			)
		),
		array(
			'label'		=> esc_html__( 'Portfolio columns', WPB_FP_TEXTDOMAIN ),
			'desc'		=> esc_html__( 'Default 4 columns.', WPB_FP_TEXTDOMAIN ),
			'id'		=> $prefix.'column',
			'type'		=> 'select',
			'select_button'	=> true,
			'default_value' => '3',
			'options' 	=> array (
				'2' => array (
					'label' => esc_html__( '6 Columns', WPB_FP_TEXTDOMAIN ),
					'value'	=> '2'
				),
				'3' => array (
					'label' => esc_html__( '4 Columns', WPB_FP_TEXTDOMAIN ),
					'value'	=> '3'
				),
				'4' => array (
					'label' => esc_html__( '3 Columns', WPB_FP_TEXTDOMAIN ),
					'value'	=> '4'
				),
				'6' => array (
					'label' => esc_html__( '2 Columns', WPB_FP_TEXTDOMAIN ),
					'value'	=> '6'
				),
			)
		),
		array (
			'label'		=> esc_html__( 'Portfolio Category [ Include ]', WPB_FP_TEXTDOMAIN ),
			'desc'		=> esc_html__( 'This shortcode will show the selected cateories portfolios.', WPB_FP_TEXTDOMAIN ),
			'id'		=> $prefix.'fp_category',
			'type'		=> 'checkbox_group',
			'options' 	=> wpb_fp_tax_for_checkbox_group_meta( $taxonomy ),
		),
		array (
			'label'		=> esc_html__( 'Portfolio Category [ Exclude ]', WPB_FP_TEXTDOMAIN ),
			'desc'		=> esc_html__( 'This shortcode will not show the selected cateories portfolios.', WPB_FP_TEXTDOMAIN ),
			'id'		=> $prefix.'exclude_tax',
			'type'		=> 'checkbox_group',
			'options' 	=> wpb_fp_tax_for_checkbox_group_meta( $taxonomy ),
		),
		array(
			'label'			=> esc_html__( 'Portfolio Post Type', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default :', WPB_FP_TEXTDOMAIN ).wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' ),
			'id'			=> $prefix.'post_type',
			'type'			=> 'text',
			'default_value' => wpb_fp_get_option( 'wpb_post_type_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio' ),
		),
		array(
			'label'			=> esc_html__( 'Portfolio Taxonomy', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default :', WPB_FP_TEXTDOMAIN ).wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ),
			'id'			=> $prefix.'taxonomy',
			'type'			=> 'text',
			'default_value' => wpb_fp_get_option( 'wpb_taxonomy_select_', 'wpb_fp_advanced', 'wpb_fp_portfolio_cat' ),
		),

	);

	/**
	* Instantiate the class with all variables to create a meta box
	* var $id string meta box id
	* var $title string title
	* var $fields array fields
	* var $page string|array post type to add meta box to
	* var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
	*/

	$portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_options', esc_html__( 'Portfolio General Settings', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_shortcode_generator_metabox', $fields, $prefix ), $post_type, 'normal' );

}



/**
 * Shortcode style settings
 */

add_action( 'init', 'wpb_fp_shortcode_generator_metaboxes_style_settings' );

function wpb_fp_shortcode_generator_metaboxes_style_settings(){
	$prefix 			= 'wpb_fp_';
	$post_type 			= 'wpb_fp_shortcode_gen';

	$fields = array(
		array(
			'label'	=> esc_html__( 'Filtering Script', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Choose a portfolio filtering script.', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'filtering_script',
			'type'	=> 'select',
			'select_button'	=> true,
			'options' => array (
				'mixitup' => array (
					'label' => esc_html__( 'Mixitup', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'mixitup'
				),
				'isotope' => array (
					'label' => esc_html__( 'Isotope', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'isotope'
				),
			)
		),
		array(
			'label'		=> esc_html__( 'Portfolio Skin', WPB_FP_TEXTDOMAIN ),
			'desc'		=> esc_html__( 'Select a skin for portfolio.', WPB_FP_TEXTDOMAIN ),
			'id'		=> $prefix.'portfolio_skin',
			'type'		=> 'select',
			'options' 	=> wpb_fp_get_portfolio_skins_meta(),
		),
		array(
			'label'		=> esc_html__( 'Image Hard Crop', WPB_FP_TEXTDOMAIN ),
			'desc'		=> esc_html__( 'If you disable / hide the hard crop the images is not going to crop form the shortcode builder, you can only set the images width and height here in the settings. And you have to regenerate thumbnails everytime you change those.', WPB_FP_TEXTDOMAIN ),
			'id'		=> $prefix.'image_hard_crop',
			'type'		=> 'select',
			'select_button'	=> true,
			'options' 	=> array (
				'no' => array (
					'label' => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'no'
				),
				'yes' => array (
					'label' => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'yes'
				),
			)
		),
		array(
			'label'	=> esc_html__( 'Image Width', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Portfolio thumbnail image width. Default 680px', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'width',
			'type'	=> 'number',
		),
		array(
			'label'	=> esc_html__( 'Image Height', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Portfolio thumbnail image height. Default 680px', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'height',
			'type'	=> 'number',
		),
		array(
			'label'			=> esc_html__( 'Select any default WordPress image size', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Use this if you are not hard croping images.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'no_hard_crop_image_size',
			'type'			=> 'select',
			'default_value'	=> 'wpb_portfolio_thumbnail',
			'options' 		=> wpb_fp_get_intermediate_image_sizes_meta(),
		),
	);

	/**
	* Instantiate the class with all variables to create a meta box
	* var $id string meta box id
	* var $title string title
	* var $fields array fields
	* var $page string|array post type to add meta box to
	* var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
	*/

	$portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_style_settings', esc_html__( 'Portfolio Style Settings', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_shortcode_generator_metabox', $fields, $prefix ), $post_type, 'normal' );

}


/**
 * Show Shortcode
 */

add_action( 'init', 'wpb_fp_shortcode_generator_metaboxes_show_shortcode' );

function wpb_fp_shortcode_generator_metaboxes_show_shortcode(){
	$prefix 			= 'wpb_fp_';
	$post_type 			= 'wpb_fp_shortcode_gen';

	$fields = array(
		array(
			'label' 		=> esc_html__( 'Shortcode', WPB_FP_TEXTDOMAIN ),
			'desc'  		=> esc_html__( 'Shortcode to use.', WPB_FP_TEXTDOMAIN ),
			'id'    		=> $prefix.'shortcode',
			'type'  		=> 'shortcode',
			'default_value' => 'wpb-portfolio-shortcode'
		),

	);

	/**
	* Instantiate the class with all variables to create a meta box
	* var $id string meta box id
	* var $title string title
	* var $fields array fields
	* var $page string|array post type to add meta box to
	* var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
	*/

	$portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_show_shortcode', esc_html__( 'Portfolio Shortcode', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_shortcode_generator_metabox', $fields, $prefix ), $post_type, 'side' );

}



/**
 * Shortcode style settings
 */

add_action( 'init', 'wpb_fp_shortcode_generator_metaboxes_filter_options' );

function wpb_fp_shortcode_generator_metaboxes_filter_options(){
	$prefix 			= 'wpb_fp_';
	$post_type 			= 'wpb_fp_shortcode_gen';

	$fields = array(
		array(
			'label'			=> esc_html__( 'Need Filtering', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: Yes.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'filtering',
			'type'			=> 'select',
			'default_value'	=> 'yes',
			'select_button'	=> true,
			'options' 		=> array (
				'no' => array (
					'label' => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'no'
				),
				'yes' => array (
					'label' => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'yes'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Filter Style', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Select a style for portfolio filter.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'filter_style',
			'type'			=> 'select',
			'select_button'	=> true,
			'default_value'	=> 'default',
			'options' 		=> array (
				'default' => array (
					'label' => esc_html__( 'Default', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'default'
				),
				'capsule' => array (
					'label' => esc_html__( 'Capsule', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'capsule'
				),
				'capsule_two' => array (
					'label' => esc_html__( 'Capsule_two', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'capsule_two'
				),
				'plain' => array (
					'label' => esc_html__( 'Plain', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'plain'
				),
				'dropdown' => array (
					'label' => esc_html__( 'Dropdown', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'dropdown'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Hide sub cateories', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Hide sub cateories and show only top-level cateories. Default: No.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'hide_sub_categories',
			'type'			=> 'select',
			'default_value'	=> 'no',
			'select_button'	=> true,
			'options' 		=> array (
				'no' => array (
					'label' => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'no'
				),
				'yes' => array (
					'label' => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'yes'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Order By', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Filtering cateories orderby. Default: name.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'filter_orderby',
			'type'			=> 'select',
			'select_button'	=> true,
			'default_value'	=> 'name',
			'options' 		=> array (
				'name' => array (
					'label' => esc_html__( 'Name', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'name'
				),
				'ID' => array (
					'label' => esc_html__( 'ID', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'id'
				),
				'count' => array (
					'label' => esc_html__( 'Count', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'count'
				),
				'slug' => array (
					'label' => esc_html__( 'Slug', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'slug'
				),
				'none' => array (
					'label' => esc_html__( 'None', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'none'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Order', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Filtering cateories order. Default: ASC.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'filter_order',
			'type'			=> 'select',
			'select_button'	=> true,
			'default_value'	=> 'ASC',
			'options' 		=> array (
				'DESC' => array (
					'label' => esc_html__( 'Descending', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'DESC'
				),
				'ASC' => array (
					'label' => esc_html__( 'Ascending', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'ASC'
				),
			)
		),
		array(
			'label'	=> esc_html__( 'Number of Cateories', WPB_FP_TEXTDOMAIN ),
			'desc'	=> esc_html__( 'Number of cateories item to show in filter. Default - empty to show all the cateories.', WPB_FP_TEXTDOMAIN ),
			'id'	=> $prefix.'filter_number',
			'type'	=> 'number',
		),
		array(
			'label'			=> esc_html__( 'All cateories text', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Filter all cateories text. Default - All.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'filter_all_text',
			'default_value'	=> wpb_fp_get_option( 'wpb_fp_all_btn_text', 'wpb_fp_general', esc_html__( 'All', WPB_FP_TEXTDOMAIN ) ),
			'type'			=> 'text',
		),
	);

	/**
	* Instantiate the class with all variables to create a meta box
	* var $id string meta box id
	* var $title string title
	* var $fields array fields
	* var $page string|array post type to add meta box to
	* var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
	*/

	$portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_filter_settings', esc_html__( 'Portfolio Filter Settings', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_shortcode_generator_metabox', $fields, $prefix ), $post_type, 'normal' );

}



/**
 * Shortcode Slider Settings
 */

add_action( 'init', 'wpb_fp_shortcode_generator_metaboxes_slider_settings' );

function wpb_fp_shortcode_generator_metaboxes_slider_settings(){
	$prefix 			= 'wpb_fp_';
	$post_type 			= 'wpb_fp_shortcode_gen';

	$fields = array(
		array(
			'label'			=> esc_html__( 'Enable Slider?', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: No.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'enable_slider',
			'type'			=> 'select',
			'default_value'	=> 'no',
			'select_button'	=> true,
			'options' 		=> array (
				'no' => array (
					'label' => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'no'
				),
				'yes' => array (
					'label' => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'yes'
				),
			)
		),

		array(
			'label'			=> esc_html__( 'Slider Columns', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default 3 Columns', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_items',
			'type'			=> 'slider',
			'min'			=> '0',
			'max'			=> '30',
			'step'			=> '1',
			'default_value' => '3'
		),
		array(
			'label'			=> esc_html__( 'Slider Columns in Tablet', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default 2 Columns', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_tablet',
			'type'			=> 'slider',
			'min'			=> '0',
			'max'			=> '30',
			'step'			=> '1',
			'default_value' => '2'
		),
		array(
			'label'			=> esc_html__( 'Slider Columns in Mobile', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default 1 Columns', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_mobile',
			'type'			=> 'slider',
			'min'			=> '0',
			'max'			=> '30',
			'step'			=> '1',
			'default_value' => '1'
		),
		array(
			'label'			=> esc_html__( 'Slider Autoplay', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: On.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_autoplay',
			'type'			=> 'select',
			'default_value'	=> 'on',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Slider Loop', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: Off.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_loop',
			'type'			=> 'select',
			'default_value'	=> 'off',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Slider Navigation', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: On.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_navigation',
			'type'			=> 'select',
			'default_value'	=> 'on',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Slider Pagination', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Default: Off.', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_pagination',
			'type'			=> 'select',
			'default_value'	=> 'off',
			'select_button'	=> true,
			'options' 		=> array (
				'on' => array (
					'label' => esc_html__( 'On', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'on'
				),
				'off' => array (
					'label' => esc_html__( 'Off', WPB_FP_TEXTDOMAIN ),
					'value'	=> 'off'
				),
			)
		),
		array(
			'label'			=> esc_html__( 'Slider Margin', WPB_FP_TEXTDOMAIN ),
			'desc'			=> esc_html__( 'Space between two slider item. Default 15px', WPB_FP_TEXTDOMAIN ),
			'id'			=> $prefix.'slider_margin',
			'type'			=> 'slider',
			'min'			=> '0',
			'max'			=> '100',
			'step'			=> '1',
			'default_value' => '15'
		),
	);

	/**
	* Instantiate the class with all variables to create a meta box
	* var $id string meta box id
	* var $title string title
	* var $fields array fields
	* var $page string|array post type to add meta box to
	* var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
	*/

	$portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_slider_settings', esc_html__( 'Portfolio Slider Settings', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_shortcode_generator_metabox', $fields, $prefix ), $post_type, 'normal' );

}


/**
 * Registering the Generated Shortcode
 */

add_shortcode( 'wpb-portfolio-shortcode','wpb_fp_generated_shortcode_function' );

if( !function_exists('wpb_fp_generated_shortcode_function') ):
	function wpb_fp_generated_shortcode_function( $atts ){
		extract(shortcode_atts(array(
			'id'				=> '',
			'title'				=> ''
		), $atts));

		$shortcode_id = $id;
		$shortcode_id = $shortcode_id ? 'shortcode_id="'. esc_attr( $shortcode_id ) .'"' : '';

		$filtering = get_post_meta( $id, 'wpb_fp_filtering', true );
		$filtering = $filtering ? 'filtering="'.$filtering.'"' : '';

		$pagination = get_post_meta( $id, 'wpb_fp_pagination', true );
		$pagination = $pagination ? 'pagination="'.$pagination.'"' : '';

		$load_more  = get_post_meta( $id, 'wpb_fp_load_more', true );
		$load_more = $load_more ? 'load_more="'.$load_more.'"' : '';

		$posts = get_post_meta( $id, 'wpb_fp_posts', true );
		$posts = $posts ? 'posts="'.$posts.'"' : '';

		$orderby = get_post_meta( $id, 'wpb_fp_orderby', true );
		$orderby = $orderby ? 'orderby="'.$orderby.'"' : '';

		$order = get_post_meta( $id, 'wpb_fp_order', true );
		$order = $order ? 'order="'.$order.'"' : '';

		$column = get_post_meta( $id, 'wpb_fp_column', true );
		$column = $column ? 'column="'.$column.'"' : '';

		$width = get_post_meta( $id, 'wpb_fp_width', true );
		$width = $width ? 'width="'.$width.'"' : '';

		$height = get_post_meta( $id, 'wpb_fp_height', true );
		$height = $height ? 'height="'.$height.'"' : '';

		$img_hard_crop = get_post_meta( $id, 'wpb_fp_image_hard_crop', true );
		$img_hard_crop = $img_hard_crop ? 'img_hard_crop="'.$img_hard_crop.'"' : '';

		$img_no_hard_crop_size = get_post_meta( $id, 'wpb_fp_no_hard_crop_image_size', true );
		$img_no_hard_crop_size = $img_no_hard_crop_size ? 'img_no_hard_crop_size="'.$img_no_hard_crop_size.'"' : '';

		$post_type = get_post_meta( $id, 'wpb_fp_post_type', true );
		$post_type = $post_type ? 'post_type="'.$post_type.'"' : '';

		$taxonomy = get_post_meta( $id, 'wpb_fp_taxonomy', true );
		$taxonomy = $taxonomy ? 'taxonomy="'.$taxonomy.'"' : '';

		$fp_category = get_post_meta( $id, 'wpb_fp_fp_category', false );
		$fp_category = !empty($fp_category) ? implode (",", $fp_category[0]) : '';
		$fp_category = $fp_category ? 'fp_category="'.$fp_category.'"' : '';

		$exclude_tax = get_post_meta( $id, 'wpb_fp_exclude_tax', false );
		$exclude_tax = !empty($exclude_tax) ? implode (",", $exclude_tax[0]) : '';
		$exclude_tax = $exclude_tax ? 'exclude_tax="'.$exclude_tax.'"' : '';

		$wpb_fp_skin = get_post_meta( $id, 'wpb_fp_portfolio_skin', true );
		$wpb_fp_skin = $wpb_fp_skin ? 'wpb_fp_skin="'.$wpb_fp_skin.'"' : '';

		$filtering_script = get_post_meta( $id, 'wpb_fp_filtering_script', true );
		$filtering_script = $filtering_script ? 'filtering_script="'.$filtering_script.'"' : '';

		$filter_style = get_post_meta( $id, 'wpb_fp_filter_style', true );
		$filter_style = $filter_style ? 'filter_style="'. esc_attr( $filter_style ) .'"' : '';

		$hide_sub_categories = get_post_meta( $id, 'wpb_fp_hide_sub_categories', true );
		$hide_sub_categories = $hide_sub_categories ? 'hide_sub_categories="'.$hide_sub_categories.'"' : '';

		$filter_orderby = get_post_meta( $id, 'wpb_fp_filter_orderby', true );
		$filter_orderby = $filter_orderby ? 'filter_orderby="'. esc_attr( $filter_orderby ) .'"' : '';

		$filter_order = get_post_meta( $id, 'wpb_fp_filter_order', true );
		$filter_order = $filter_order ? 'filter_order="'. esc_attr( $filter_order ) .'"' : '';

		$filter_number = get_post_meta( $id, 'wpb_fp_filter_number', true );
		$filter_number = $filter_number ? 'filter_number="'. esc_attr( $filter_number ) .'"' : '';

		$filter_all_text = get_post_meta( $id, 'wpb_fp_filter_all_text', true );
		$filter_all_text = $filter_all_text ? 'filter_all_text="'. esc_attr( $filter_all_text ) .'"' : '';

		$enable_slider = get_post_meta( $id, 'wpb_fp_enable_slider', true );
		$type = 'type="'. esc_attr( $enable_slider == 'yes' ? 'slider' : 'grid' ) .'"';

		$items = get_post_meta( $id, 'wpb_fp_slider_items', true );
		$items = $items ? 'items="'.$items.'"' : '';

		$tablet = get_post_meta( $id, 'wpb_fp_slider_tablet', true );
		$tablet = $tablet ? 'tablet="'.$tablet.'"' : '';

		$mobile = get_post_meta( $id, 'wpb_fp_slider_mobile', true );
		$mobile = $mobile ? 'mobile="'.$mobile.'"' : '';

		$autoplay = get_post_meta( $id, 'wpb_fp_slider_autoplay', true );
		$autoplay = $autoplay ? 'autoplay="'.$autoplay.'"' : '';

		$loop = get_post_meta( $id, 'wpb_fp_slider_loop', true );
		$loop = $loop ? 'loop="'.$loop.'"' : '';

		$navigation = get_post_meta( $id, 'wpb_fp_slider_navigation', true );
		$navigation = $navigation ? 'navigation="'.$navigation.'"' : '';

		$slider_pagination = get_post_meta( $id, 'wpb_fp_slider_pagination', true );
		$slider_pagination = $slider_pagination ? 'slider_pagination="'.$slider_pagination.'"' : '';

		$margin = get_post_meta( $id, 'wpb_fp_slider_margin', true );
		$margin = $margin || $margin == '0' ? 'margin="'.$margin.'"' : '';


	   	ob_start();

		echo do_shortcode( '[wpb-another-portfolio '.$shortcode_id.' '.$pagination.' '.$load_more.' '.$filtering.' '.$posts.' '.$orderby.' '.$order.' '.$column.' '.$width.' '.$height.' '.$post_type.' '.$taxonomy.' '.$fp_category.' '.$exclude_tax.' '.$wpb_fp_skin.' '.$img_hard_crop.' '.$img_no_hard_crop_size.' '.$filtering_script.' '.$filter_style.' '.$hide_sub_categories.' '.$filter_orderby.' '.$filter_order.' '.$filter_number.' '.$filter_all_text.' '.$type.' '.$items.' '.$tablet.' '.$mobile.' '.$autoplay.' '.$loop.' '.$navigation.' '.$slider_pagination.' '.$margin.']' );

		return ob_get_clean();
	
	}
endif;



/**
 * Adding portfolio shortcode on the shortcode post type column
 */


add_action('manage_wpb_fp_shortcode_gen_posts_custom_column', 'wpb_fp_populate_portfolio_shortcodes_columns', 10, 2);
add_action('manage_wpb_fp_shortcode_gen_posts_columns', 'wpb_fp_manage_columns_for_portfolio_shortcodes');

function wpb_fp_manage_columns_for_portfolio_shortcodes( $columns ){
 	
 	unset($columns['date']);
    $columns['portfolio_shortcode']         = esc_html__('ShortCode to Use', WPB_FP_TEXTDOMAIN);
    $columns['date']                        = esc_html__('Date', WPB_FP_TEXTDOMAIN);
 
    return $columns;
}

function wpb_fp_populate_portfolio_shortcodes_columns($column, $post_id){

	$shortcode = get_post_meta( $post_id, 'wpb_fp_shortcode', true );

    if( $column == 'portfolio_shortcode' ){
    	if( $shortcode ){
    		printf("<input type='text' name='wpb_fp_shortcode' id='wpb_fp_shortcode' value='%s' class='regular-text the-shortcode' size='30' readonly='readonly'>", $shortcode);
    	}
    }
    ?>
	<script type="text/javascript">
		jQuery("input.the-shortcode").focus(function() { jQuery(this).select(); } );
	</script>
	<?php
}