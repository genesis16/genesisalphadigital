<?php

/**
 * Portfolio Filter
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$output = $extra_class = '';
$terms_args 		= array();
$dropdown_cat_args 	= array(
	'title_li'			=> '',
	'echo'              => 0,
	'taxonomy'          => $taxonomy,
	'walker'            => new WPB_FP_Dropdown_Category_Walker,
);

if( isset($exclude_tax) && is_array($exclude_tax) ){
	$terms_args['exclude'] 			= $exclude_tax;
	$dropdown_cat_args['exclude'] 	= $exclude_tax;
}
if( isset($fp_category) && is_array($fp_category) ){
	$terms_args['include'] 			= $fp_category;
	$dropdown_cat_args['include'] 	= $fp_category;
}

if( !empty($filter_options) && array_key_exists('hide_sub_categories', $filter_options )){
	$terms_args['parent'] = ( $filter_options['hide_sub_categories'] == 'yes' ? '0' : '' );
}
if( !empty($filter_options) && array_key_exists('orderby', $filter_options )){
	$terms_args['orderby'] 			= $filter_options['orderby'];
	$dropdown_cat_args['orderby'] 	= $filter_options['orderby'];
}
if( !empty($filter_options) && array_key_exists('order', $filter_options )){
	$terms_args['order'] 		= $filter_options['order'];
	$dropdown_cat_args['order'] = $filter_options['order'];
}
if( !empty($filter_options) && array_key_exists('number', $filter_options )){
	$terms_args['number'] 		 = $filter_options['number'];
	$dropdown_cat_args['number'] = $filter_options['number'];
}

if( !empty($filter_options) && array_key_exists('all_text', $filter_options )){
	$all_text = $filter_options['all_text'];
}else{
	$all_text = esc_html__( 'All', WPB_FP_TEXTDOMAIN );
}

if( !empty($filter_options) && array_key_exists('extra_class', $filter_options )){
	$extra_class = $filter_options['extra_class'];
}

$dropdown_cat_args 	= apply_filters( 'wpb_fp_wp_list_categories_args', $dropdown_cat_args );
$terms 				= get_terms( $taxonomy, apply_filters( 'wpb_fp_filter_terms_args', $terms_args ) );

if( !empty($terms) && !is_wp_error($terms) ){

	$count = count($terms);

	if ( $count > 0 ){
		$wpb_fp_filter_position 	= wpb_fp_get_option( 'wpb_fp_filter_position_', 'wpb_fp_general', 'center' );
		$wpb_fp_show_counting 		= wpb_fp_get_option( 'wpb_fp_show_counting_', 'wpb_fp_general', 'show' );

		if( isset($filter_style) && $filter_style == 'select' ){
			$output .= '<div class="wpb_fp_filter_select_area '.esc_attr( $extra_class ).'"><a href="#" class="wpb-fp-portfolio-select-sort"><span>'. esc_html( $all_text ) .'</span> <i class="wpbfpicons-arrow-down"></i></a>';
		}

		if( isset($filter_style) && $filter_style == 'dropdown' ){
			$output .= '<button class="wpb-fp-menu-toggle wpb_fp_btn">'. esc_html__( 'Portfolio Filter', WPB_FP_TEXTDOMAIN ) .'</button>';
		}
		
        $output .= '<ul class="wpb-fp-filter wpb-fp-filter-'. esc_attr(  $filtering_script ) .' controls '.esc_attr( $extra_class ).'text-'. $wpb_fp_filter_position .' wpb_fp_filter_'.$filter_style . ( $filter_style == 'dropdown' ? ' wpb_fp_filter_capsule' : '' ).'">';

        if( $filter_style != 'dropdown' ){

        	$output .= '<li class="filter control'. esc_attr( $filtering_script != 'mixitup' ? ' active' : '' ) .'" data-filter="*">'. esc_html( $all_text ) .'</li>';

        	foreach ( $terms as $term ) {

	            $termname = 'wpb_fp_cat_'.$term->term_id;

				if( isset($wpb_fp_show_counting) && $wpb_fp_show_counting == 'show' ){   
					$output .= '<li class="filter control '. esc_attr( $termname ) .'" data-filter="' . '.' . esc_attr($termname) . '" title="' . esc_attr($term->count) . '">' . esc_html($term->name) . '</li>';
				}else{
					$output .= '<li class="filter control '. esc_attr( $termname ) .'" data-filter="' . '.' . esc_attr($termname) . '">' . esc_html($term->name) . '</li>';
				}
			}
        }else{

        	$output .= '<li class="'. esc_attr( $filtering_script != 'mixitup' ? ' active' : '' ) .'"><span class="filter control" data-filter="*">'. esc_html( $all_text ) .'</span></li>';
			$output .= wp_list_categories( $dropdown_cat_args );
        }
		
		$output .= '</ul>';
	
		if( isset($filter_style) && $filter_style == 'select' ){
			$output .= '</div><div class="wpb_fp_clear"></div>';
		}
	}

	echo $output;
}