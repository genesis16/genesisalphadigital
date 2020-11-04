<?php

/*
	WPB Filterable Portfolio
	By WPBean
	
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Register Custom Post Type for portfolio
 */

add_action( 'init', 'wpb_fp_post_type', 0 );

if ( ! function_exists('wpb_fp_post_type') ) {
	function wpb_fp_post_type() {

		$labels = apply_filters( 'wpb_fp_portfolio_post_type_labels', array(
			'name'                => esc_html_x( 'WPB Portfolios', 'Post Type General Name', WPB_FP_TEXTDOMAIN ),
			'singular_name'       => esc_html_x( 'Portfolio', 'Post Type Singular Name', WPB_FP_TEXTDOMAIN ),
			'menu_name'           => esc_html__( 'WPB Portfolio', WPB_FP_TEXTDOMAIN ),
			'parent_item_colon'   => esc_html__( 'Parent Portfolio:', WPB_FP_TEXTDOMAIN ),
			'all_items'           => esc_html__( 'All Portfolios', WPB_FP_TEXTDOMAIN ),
			'view_item'           => esc_html__( 'View Portfolio', WPB_FP_TEXTDOMAIN ),
			'add_new_item'        => esc_html__( 'Add New Portfolio', WPB_FP_TEXTDOMAIN ),
			'add_new'             => esc_html__( 'Add New', WPB_FP_TEXTDOMAIN ),
			'edit_item'           => esc_html__( 'Edit Portfolio', WPB_FP_TEXTDOMAIN ),
			'update_item'         => esc_html__( 'Update Portfolio', WPB_FP_TEXTDOMAIN ),
			'search_items'        => esc_html__( 'Search Portfolio', WPB_FP_TEXTDOMAIN ),
			'not_found'           => esc_html__( 'Not found', WPB_FP_TEXTDOMAIN ),
			'not_found_in_trash'  => esc_html__( 'Not found in Trash', WPB_FP_TEXTDOMAIN ),
		) );

		$wpb_fp_portfolio_slug = wpb_fp_get_option( 'wpb_fp_portfolio_slug_', 'wpb_fp_advanced', 'portfolio-items' );

		$rewrite = array(
			'slug'                => $wpb_fp_portfolio_slug,
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => apply_filters( 'wpb_fp_portfolio_post_type_label', esc_html__( 'Portfolio', WPB_FP_TEXTDOMAIN ) ),
			'description'         => esc_html__( 'WPB Filterable Portfolio plugin post type', WPB_FP_TEXTDOMAIN ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'show_in_rest' 		  => true,
			'taxonomies'          => array( 'wpb_fp_portfolio_cat' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-portfolio',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);

		$args = apply_filters( 'wpb_fp_portfolio_post_type_args', $args );

		register_post_type( 'wpb_fp_portfolio', $args );

	}
}


/**
 * Feature Image Support
 */

if ( ! function_exists('wpb_fp_theme_support') ) {
	function wpb_fp_theme_support()  {
		add_theme_support( 'post-thumbnails', array( 'wpb_fp_portfolio' ) );
	}
}
add_action( 'after_setup_theme', 'wpb_fp_theme_support' );



/**
 * Register Custom Taxonomy for Portfolio
 */

add_action( 'init', 'wpb_fp_taxonomy', 0 );

if ( ! function_exists( 'wpb_fp_taxonomy' ) ) {
	function wpb_fp_taxonomy() {

		$labels = array(
			'name'                       => esc_html_x( 'WPB Portfolio Categories', 'Taxonomy General Name', WPB_FP_TEXTDOMAIN ),
			'singular_name'              => esc_html_x( 'Portfolio Category', 'Taxonomy Singular Name', WPB_FP_TEXTDOMAIN ),
			'menu_name'                  => esc_html__( 'Portfolio Category', WPB_FP_TEXTDOMAIN ),
			'all_items'                  => esc_html__( 'All Categories', WPB_FP_TEXTDOMAIN ),
			'parent_item'                => esc_html__( 'Parent Category', WPB_FP_TEXTDOMAIN ),
			'parent_item_colon'          => esc_html__( 'Parent Category:', WPB_FP_TEXTDOMAIN ),
			'new_item_name'              => esc_html__( 'New Category Name', WPB_FP_TEXTDOMAIN ),
			'add_new_item'               => esc_html__( 'Add New Category', WPB_FP_TEXTDOMAIN ),
			'edit_item'                  => esc_html__( 'Edit Category', WPB_FP_TEXTDOMAIN ),
			'update_item'                => esc_html__( 'Update Category', WPB_FP_TEXTDOMAIN ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', WPB_FP_TEXTDOMAIN ),
			'search_items'               => esc_html__( 'Search categories', WPB_FP_TEXTDOMAIN ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Categories', WPB_FP_TEXTDOMAIN ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', WPB_FP_TEXTDOMAIN ),
			'not_found'                  => esc_html__( 'Not Found', WPB_FP_TEXTDOMAIN ),
		);
		$rewrite = array(
			'slug'                       => 'portfolio-category',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => $rewrite,
			'show_in_rest'				 => true,
		);
		register_taxonomy( 'wpb_fp_portfolio_cat', array( 'wpb_fp_portfolio' ), $args );

	}
}