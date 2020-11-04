<?php 

/*
  WPB Filterable Portfolio
  By WPBean
  
*/

add_action( 'init', 'wpb_fp_metaboxes' );

function wpb_fp_metaboxes(){

  $prefix = 'wpb_fp_';
  $wpb_post_type_select = wpb_fp_get_option( 'wpb_fp_post_type_meta_support_', 'wpb_fp_advanced', array('wpb_fp_portfolio') );

  $fields = apply_filters( 'wpb_fp_post_type_custom_meta' , array(
    array(
      'label' => esc_html__( 'Portfolio Sub-title', WPB_FP_TEXTDOMAIN ),
      'desc'  => esc_html__( 'Portfolio sub title.(Not for all skin)', WPB_FP_TEXTDOMAIN ),
      'id'    => $prefix.'portfolio_subtitle',
      'type'  => 'text'
    ),
    array(
      'label' => esc_html__( 'Portfolio External Link', WPB_FP_TEXTDOMAIN ),
      'desc'  => esc_html__( 'Portfolio external link, If not provided it will linking to single portfolio.', WPB_FP_TEXTDOMAIN ),
      'id'    => $prefix.'portfolio_ex_link',
      'type'  => 'text'
    ),
    array(
      'label'     => esc_html__( 'Portfolio Short Description', WPB_FP_TEXTDOMAIN ),
      'id'        => $prefix.'portfolio_short_description',
      'type'      => 'editor',
      'settings'  => array(
        'media_buttons' => false,
        'tinymce'       => false,
        'editor_height' => 120,
      ),
    ),
    array(
      'label' => esc_html__( 'Disable Overlay', WPB_FP_TEXTDOMAIN ),
      'desc'  => esc_html__( 'Portfolio grid can be disable for specific item.', WPB_FP_TEXTDOMAIN ),
      'id'    => $prefix.'disable_overlay',
      'type'  => 'checkbox'
    ),
    array(
      'label'   => esc_html__( 'Grid Content Type', WPB_FP_TEXTDOMAIN ),
      'desc'    => 'Select a content type for portfolio grid. Default: feature image.',
      'id'      => $prefix.'content_type',
      'type'    => 'select',
      'options' => array (
        'feature_image' => array (
          'label'       => esc_html__( 'Feature Image', WPB_FP_TEXTDOMAIN ),
          'value'       => 'feature_image'
        ),
        'video' => array (
          'label' => esc_html__( 'Video', WPB_FP_TEXTDOMAIN ),
          'value' => 'video'
        ),
      )
    ),
    array(
      'label'     => esc_html__( 'Video Iframe', WPB_FP_TEXTDOMAIN ),
      'desc'      => esc_html__( 'YouTube, Vimeo or any other video iframe', WPB_FP_TEXTDOMAIN ),
      'id'        => $prefix.'video_iframe',
      'type'      => 'textarea',
      'sanitizer' => 'no',
    ),
    array(
      'label'   => esc_html__( 'Quick View Content Type', WPB_FP_TEXTDOMAIN ),
      'desc'    => 'Select a content type for portfolio quick view popup. Default: feature image.',
      'id'      => $prefix.'quickview_content_type',
      'type'    => 'select',
      'options' => array (
        'feature_image' => array(
          'label' => esc_html__( 'Feature Image', WPB_FP_TEXTDOMAIN ),
          'value' => 'feature_image'
        ),
        'video' => array (
          'label' => esc_html__( 'Video', WPB_FP_TEXTDOMAIN ),
          'value' => 'video'
        ),
      )
    ),
    array(
      'label'     => esc_html__( 'Quick View Video Iframe', WPB_FP_TEXTDOMAIN ),
      'desc'      => esc_html__( 'Large iframe for quick view lightbox.', WPB_FP_TEXTDOMAIN ),
      'id'        => $prefix.'quickview_video_iframe',
      'type'      => 'textarea',
      'sanitizer' => 'no',
    )

  ));

  /**
   * Instantiate the class with all variables to create a meta box
   * var $id string meta box id
   * var $title string title
   * var $fields array fields
   * var $page string|array post type to add meta box to
   * var $context The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). 
   */

  $portfolio_metabox = new WPB_FP_Custom_Add_Meta_Box( 'portfolio_options', esc_html__( 'Portfolio Options', WPB_FP_TEXTDOMAIN ), apply_filters( 'wpb_fp_metabox', $fields, $prefix ), $wpb_post_type_select, 'normal' );

}


/**
 * Adding the Portfolio Informations Meta Box
 */


add_filter( 'wpb_fp_metabox', 'wpb_fp_portfolio_informations_meta', 10, 2 );
if( !function_exists('wpb_fp_portfolio_informations_meta') ){

  function wpb_fp_portfolio_informations_meta( $fields, $prefix ){
    $wpb_fp_info_support = wpb_fp_get_option( 'wpb_fp_info_support', 'wpb_fp_general', 'on' );

    if( $wpb_fp_info_support == 'on' ){

      $fields[] = array(
        'label'     => esc_html__( 'Portfolio Informations', WPB_FP_TEXTDOMAIN ),
        'desc'      => esc_html__( 'You can add you portfolio informations here. click add new button to add more informations.', WPB_FP_TEXTDOMAIN ),
        'id'        => $prefix . 'informations',
        'type'      => 'repeatable',
        'sanitizer' => array(
          'info_label'  => 'sanitize_text_field',
          'the_info'    => 'sanitize_text_field',
        ),
        'repeatable_fields' => array (
          'info_label' => array(
            'label' => esc_html__( 'Label', WPB_FP_TEXTDOMAIN ),
            'id'    => 'info_label',
            'type'  => 'text'
          ),
          'the_info' => array(
            'label' => esc_html__( 'Information', WPB_FP_TEXTDOMAIN ),
            'id'    => 'the_info',
            'type'  => 'text'
          ),
        )
      );

      $fields[] = array(
        'label' => esc_html__( 'Email Address', WPB_FP_TEXTDOMAIN ),
        'desc'  => esc_html__( 'Portfolio information email.', WPB_FP_TEXTDOMAIN ),
        'id'    => $prefix.'portfolio_email',
        'type'  => 'email'
      );

    }

    return $fields;
  }
}