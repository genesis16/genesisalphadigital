<?php

/*
	WPB Filterable Portfolio
	By WPBean
	
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Manage post type columns head
 */

function wpb_fp_manage_columns_for_portfolio($columns){
 	
    unset($columns['date']);
    $columns['portfolio_featured_image']    = esc_html__('Portfolio Featured Image', WPB_FP_TEXTDOMAIN);
    $columns['date']                        = esc_html__('Date', WPB_FP_TEXTDOMAIN);
    $columns['portfolio_id']                = esc_html__('ID', WPB_FP_TEXTDOMAIN);
 
    return $columns;
}
add_action('manage_wpb_fp_portfolio_posts_columns','wpb_fp_manage_columns_for_portfolio');


/**
 * Manage post type columns content
 */

function wpb_fp_populate_portfolio_columns($column, $post_id){

    $output = '';

    if($column == 'portfolio_featured_image'){
        if(has_post_thumbnail($post_id)){
            $output = get_the_post_thumbnail( $post_id, array(60, 60) );
        }else{
            $output = esc_html__('No Image',WPB_FP_TEXTDOMAIN); 
        }
    }

    if( $column == 'portfolio_id' ){
        $output = $post_id;
    }
    
    echo $output;
}
add_action('manage_wpb_fp_portfolio_posts_custom_column', 'wpb_fp_populate_portfolio_columns',10, 2);