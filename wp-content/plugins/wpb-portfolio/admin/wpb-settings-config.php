<?php

/*
    WPB Portfolio PRO
    By WPBean
    
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * installing setting api class by wpbean
 */
if ( !class_exists('WPB_fp_settings_config' ) ):
class WPB_fp_settings_config {

    private $settings_api;

    function __construct() {
        $this->settings_api = new wpb_fp_WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }
    
    function admin_menu() {

        add_submenu_page( 
            'edit.php?post_type=wpb_fp_portfolio', 
            esc_html__( 'Portfolio Settings', WPB_FP_TEXTDOMAIN ),
            esc_html__( 'Portfolio Settings', WPB_FP_TEXTDOMAIN ),
            'delete_posts',
            'portfolio-settings',
            array($this, 'wpb_plugin_page')
        ); 

    }
    // setings tabs
    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'wpb_fp_general',
                'title' => esc_html__( 'General Settings', WPB_FP_TEXTDOMAIN )
            ),
            array(
                'id'    => 'wpb_fp_advanced',
                'title' => esc_html__( 'Advanced Settings', WPB_FP_TEXTDOMAIN )
            ),
            array(
                'id'    => 'wpb_fp_style',
                'title' => esc_html__( 'Style Settings', WPB_FP_TEXTDOMAIN )
            ),
            array(
                'id'    => 'wpb_quickview_settings',
                'title' => esc_html__( 'QuickView Settings', WPB_FP_TEXTDOMAIN )
            ),
            array(
                'id'    => 'wpb_fp_slider',
                'title' => esc_html__( 'Slider Settings', WPB_FP_TEXTDOMAIN )
            ),
        );
        $sections = apply_filters( 'wpb_fp_settings_sections', $sections );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array( 
            
            'wpb_fp_general' => array(
                array(
                    'name'      => 'wpb_fp_column_',
                    'label'     => esc_html__( 'Columns', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Number of portfolio column.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 3,
                    'options'   => array(
                        '2'     => esc_html__( '6 Columns', WPB_FP_TEXTDOMAIN ),
                        '3'     => esc_html__( '4 Columns', WPB_FP_TEXTDOMAIN ),
                        '4'     => esc_html__( '3 Columns', WPB_FP_TEXTDOMAIN ),
                        '6'     => esc_html__( '2 Columns', WPB_FP_TEXTDOMAIN ),
                        '12'    => esc_html__( '1 Column', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_filter_position_',
                    'label'     => esc_html__( 'Filter Position', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio filter position. Options: left, right, center. Default: left.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'center',
                    'options'   => array(
                        'left'     => esc_html__( 'Left', WPB_FP_TEXTDOMAIN ),
                        'center'   => esc_html__( 'Center', WPB_FP_TEXTDOMAIN ),
                        'right'    => esc_html__( 'Right', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_number_of_post_',
                    'label'     => esc_html__( 'Number of Portfolio', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Number of portfolios to show. Default -1, means show all.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => -1
                ),
                array(
                    'name'      => 'wpb_fp_pagination',
                    'label'     => esc_html__( 'Portfolio Pagination', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_load_more',
                    'label'     => esc_html__( 'Show Load More Button', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                ),
                array(
                    'name'      => 'wpb_fp_info_support',
                    'label'     => esc_html__( 'Portfolio Informations Support', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_gallery_support',
                    'label'     => esc_html__( 'Portfolio Gallery Support', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_video_in_portfolio_page',
                    'label'     => esc_html__( 'Show Video in Single Portfolio Page', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on'
                ),
                array(
                    'name'      => 'wpb_fp_info_in_portfolio_page',
                    'label'     => esc_html__( 'Show Informations in Single Portfolio Page', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on'
                ),
                array(
                    'name'      => 'wpb_fp_title_character_limit_',
                    'label'     => esc_html__( 'Portfolio Title Character Limit', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Yes.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_number_of_title_character',
                    'label'     => esc_html__( 'Number of Characters in Title', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Number of characters in title to show. Default 40. You have to must check Portfolio Title Character Limit to function this limit.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 40
                ),
                array(
                    'name'      => 'wpb_fp_after_title',
                    'label'     => esc_html__( 'After Title Content', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'If checked Portfolio Title Character Limit, the title will be cut off and will be add this content after the title.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'text',
                    'default'   => '...'
                ),
                array(
                    'name'      => 'wpb_fp_all_btn_text',
                    'label'     => esc_html__( 'Filter All Button Text', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio filter all button text.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'text',
                    'default'   => esc_html__( 'All', WPB_FP_TEXTDOMAIN ),
                ),
            ),
            'wpb_fp_advanced' => array(
                array(
                    'name'      => 'wpb_fp_filtering_script',
                    'label'     => esc_html__( 'Filtering Script', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Choose a portfolio filtering script.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'mixitup',
                    'options'   => array(
                        'mixitup'   => esc_html__( 'Mixitup', WPB_FP_TEXTDOMAIN ),
                        'isotope'   => esc_html__( 'Isotope', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_post_type_select_',
                    'label'     => esc_html__( 'Post Type', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'You can select your own custom post type. Default: Our portfolio post type that come with plugin.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'wpb_fp_portfolio',
                    'options'   => wpb_fp_post_type_select(),
                ),
                array(
                    'name'      => 'wpb_taxonomy_select_',
                    'label'     => esc_html__( 'Taxonomy', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'You can select your own custom taxonomy ( taxonomy means custom category ).  Default: Our portfolio category that come with plugin.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'wpb_fp_portfolio_cat',
                    'options'   => wpb_fp_taxonomy_select(),
                ),
                array(
                    'name'      => 'wpb_fp_cat_exclude_',
                    'label'     => esc_html__( 'Exclude Categories', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'You can exclude selected categories from the portfolio.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'multicheck',
                    'options'   => wpb_fp_exclude_categories(),
                ),
                array(
                    'name'      => 'wpb_fp_cat_include_',
                    'label'     => esc_html__( 'Include Categories', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'You can include selected categories from the portfolio.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'multicheck',
                    'options'   => wpb_fp_exclude_categories(),
                ),
                array(
                    'name'      => 'wpb_fp_image_width_',
                    'label'     => esc_html__( 'Image Width', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio thumbnail width in Px. Minimum 200. Default 680', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'min'       => 200,
                    'default'   => 680
                ),
                array(
                    'name'      => 'wpb_fp_image_height_',
                    'label'     => esc_html__( 'Image height', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio thumbnail height in Px. Minimum 200. Default 680', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'min'       => 200,
                    'default'   => 680
                ),
                array(
                    'name'      => 'wpb_fp_image_hard_crop_',
                    'label'     => esc_html__( 'Image Hard Crop', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'If you disable / hide the hard crop the images is not going to crop form the shortcode builder, you can only set the images width and height here in the settings. And you have to regenerate thumbnails everytime you change those.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'yes',
                    'options'   => array(
                        'yes'   => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
                        'no'    => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                // Select any default WordPress size
                array(
                    'name'    => 'wpb_fp_no_hard_crop_image_size',
                    'label'   => esc_html__( 'Select any default WordPress image size', WPB_FP_TEXTDOMAIN ),
                    'type'    => 'select',
                    'desc'    => esc_html__( 'Use this if you are not hard croping images.', WPB_FP_TEXTDOMAIN ),
                    'default' => 'wpb_portfolio_thumbnail',
                    'options' => wpb_fp_get_intermediate_image_sizes(),
                ),
                array(
                    'name'      => 'wpb_fp_show_overlay_',
                    'label'     => esc_html__( 'Portfolio overlay', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio overlay on mouse hover. Default: Show.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'show',
                    'options'   => array(
                        'show'  => esc_html__( 'Show', WPB_FP_TEXTDOMAIN ),
                        'hide'  => esc_html__( 'Hide', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_link_full_grid_',
                    'label'     => esc_html__( 'Full Grid Linking', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'If you disable / hide the overlay on mouse hover the grid, you may want to link full grid itself.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'no',
                    'options'   => array(
                        'yes'   => esc_html__( 'Yes', WPB_FP_TEXTDOMAIN ),
                        'no'    => esc_html__( 'No', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_link_full_grid_type_',
                    'label'     => esc_html__( 'Full Grid Link type', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'If you disable / hide the overlay on mouse hover the grid and enable the full grid linking, you may want to link either portfolio details page or qiickview popup.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'quickview_popup',
                    'options'   => array(
                        'details_page'      => esc_html__( 'Portfolio details / External URL', WPB_FP_TEXTDOMAIN ),
                        'quickview_popup'   => esc_html__( 'QuickView Popup', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_quickview_icon',
                    'label'     => esc_html__( 'Portfolio Quick View Icon', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio on mouse hover showing quick view link. Default: Show.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'show',
                    'options'   => array(
                        'show'  => esc_html__( 'Show', WPB_FP_TEXTDOMAIN ),
                        'hide'  => esc_html__( 'Hide', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_single_portfolio_link',
                    'label'     => esc_html__( 'Portfolio Single Page Link Icon', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio on mouse hover showing single portfolio page. If set to hide, it will only show the icon when portfolio has external link set.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'show',
                    'options'   => array(
                        'show'  => esc_html__( 'Show', WPB_FP_TEXTDOMAIN ),
                        'hide'  => esc_html__( 'Hide', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_filtering',
                    'label'     => esc_html__( 'Portfolio Filtering', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio filtering can be enable or disable. Default: Enable.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'radio',
                    'default'   => 'enable',
                    'options'   => array(
                        'enable'    => esc_html__( 'Enable', WPB_FP_TEXTDOMAIN ),
                        'disable'   => esc_html__( 'Disable', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_view_portfolio_btn_text_',
                    'label'     => esc_html__( 'View Portfolio Button Text', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'View portfolio button that allow you to link your external site or anything else. You can change that button text.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'text',
                    'default'   => 'View Portfolio'
                ),
                array(
                    'name'      => 'wpb_fp_portfolio_slug_',
                    'label'     => esc_html__( 'Portfolio Slug', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'After updating the portfolio slug, deactivate this plugin and activate again.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'text',
                    'default'   => 'portfolio-items'
                ),
                array(
                    'name'      => 'wpb_fp_post_type_meta_support_',
                    'label'     => esc_html__( 'Post type portfolio options support', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select post types you want to add portfolio options (meta box) support.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'multicheck',
                    'default'   => array( 'wpb_fp_portfolio' => 'wpb_fp_portfolio' ),
                    'options'   => wpb_fp_post_type_multicheck_option(),
                ),
            ),
            'wpb_fp_style' => array(
                array(
                    'name'      => 'wpb_fp_skin',
                    'label'     => esc_html__( 'Portfolio Skin', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select a skin for portfolio.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'img_bg_hover_effect',
                    'options'   => wpb_fp_get_portfolio_skins(),
                ),
                array(
                    'name'      => 'wpb_fp_popup_effect_',
                    'label'     => esc_html__( 'Quick View Effect.', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select your Quick View Effect popup effect.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'mfp-zoom-in',
                    'options'   => array(
                        'mfp-zoom-in'           => esc_html__( 'Zoom effect', WPB_FP_TEXTDOMAIN ),
                        'mfp-newspaper'         => esc_html__( 'Newspaper effect', WPB_FP_TEXTDOMAIN ),
                        'mfp-move-horizontal'   => esc_html__( 'Move-horizontal effect', WPB_FP_TEXTDOMAIN ),
                        'mfp-move-from-top'     => esc_html__( 'Move-from-top effect', WPB_FP_TEXTDOMAIN ),
                        'mfp-3d-unfold'         => esc_html__( '3d unfold', WPB_FP_TEXTDOMAIN ),
                        'mfp-zoom-out'          => esc_html__( 'Zoom-out effect', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'      => 'wpb_fp_hover_effect_',
                    'label'     => esc_html__( 'Hover Effect.', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select an effect for mouse hover on portfolio. ( only for skin hover effect )', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'effect-bubba',
                    'options'   => array(
                        'effect-layla'    => esc_html__( 'Layla', WPB_FP_TEXTDOMAIN ),
                        'effect-roxy'     => esc_html__( 'Roxy', WPB_FP_TEXTDOMAIN ),
                        'effect-bubba'    => esc_html__( 'Bubba', WPB_FP_TEXTDOMAIN ),
                        'effect-marley'   => esc_html__( 'Marley', WPB_FP_TEXTDOMAIN ),
                        'effect-oscar'    => esc_html__( 'Oscar', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'      => 'wpb_fp_filter_style_',
                    'label'     => esc_html__( 'Filter Style', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select a style for portfolio filter. ( We recommend not to use the Select Box. )', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'default',
                    'options'   => array(
                        'default'       => esc_html__( 'Default', WPB_FP_TEXTDOMAIN ),
                        'capsule'       => esc_html__( 'Capsule', WPB_FP_TEXTDOMAIN ),
                        'capsule_two'   => esc_html__( 'Capsule Two', WPB_FP_TEXTDOMAIN ),
                        'plain'         => esc_html__( 'Plain', WPB_FP_TEXTDOMAIN ),
                        'dropdown'      => esc_html__( 'Dropdown Sub Categories', WPB_FP_TEXTDOMAIN ),
                        'select'        => esc_html__( 'Select Box (deprecated)', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'      => 'wpb_fp_title_font_size_',
                    'label'     => esc_html__( 'Portfolio title font size.', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Font size for portfolio title. Default 20px.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 20
                ),
                array(
                    'name'      => 'wpb_fp_primary_color_',
                    'label'     => esc_html__( 'Primary color', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select your portfolio primary color. Default: #21cdec', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'color',
                    'default'   => '#21cdec'
                ),
                array(
                    'name'      => 'wpb_fp_primary_color_hover',
                    'label'     => esc_html__( 'Primary color hover', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select your portfolio primary hover color. Default: #009cba', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'color',
                    'default'   => '#009cba'
                ),
                array(
                    'name'      => 'wpb_fp_portfolio_bg_',
                    'label'     => esc_html__( 'Portfolio Background Color', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio background color. ( Skin: Image Background & Hover Effect )', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'color',
                    'default'   => '#18a367'
                ),
                array(
                    'name' => 'wpb_fp_custom_css_',
                    'label' => esc_html__( 'Portfolio Custom CSS', WPB_FP_TEXTDOMAIN ),
                    'desc' => esc_html__( 'You can write you own custom css code here.', WPB_FP_TEXTDOMAIN ),
                    'type' => 'textarea',
                    'rows' => 8
                ),

            ),
            'wpb_quickview_settings' => array(
                array(
                    'name'      => 'wpb_fp_quickview_type',
                    'label'     => esc_html__( 'QuickView Type', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select a type for quick view popup.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'image_content',
                    'options'   => array(
                        'image_only'            => esc_html__( 'Image only', WPB_FP_TEXTDOMAIN ),
                        'image_content'         => esc_html__( 'Image and Content', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'  => 'wpb_fp_quickview_gallery',
                    'label' => esc_html__( 'Quickview Popup Arrows?', WPB_FP_TEXTDOMAIN ),
                    'desc'  => esc_html__( 'Check this if you need left right arrows with quickview popup.', WPB_FP_TEXTDOMAIN ),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'      => 'wpb_fp_quickview_max_width',
                    'label'     => esc_html__( 'QuickView LightBox Max Width.', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Portfolio QuickView LightBox max width (px).', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => '1140'
                ),
                array(
                    'name'      => 'wpb_fp_quickview_layout',
                    'label'     => esc_html__( 'QuickView Layout', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Select a layout for quick view popup.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'left_right',
                    'options'   => array(
                        'left_right'     => esc_html__( 'Left Right ( Image & content, side by side )', WPB_FP_TEXTDOMAIN ),
                        'top_bottom'     => esc_html__( 'Top Bottom ( Image & content, top bottom )', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'    => 'wpb_fp_quickview_content',
                    'label'   => esc_html__( 'QuickView Contents', WPB_FP_TEXTDOMAIN ),
                    'desc'    => esc_html__( 'You can enable or disable any specific quickview content.', WPB_FP_TEXTDOMAIN ),
                    'type'    => 'multicheck',
                    'default' => array('image' => 'image', 'content' => 'content', 'title' => 'title', 'info' => 'info', 'button' => 'button'),
                    'options' => array(
                        'image'   => esc_html__( 'Image or Gallery', WPB_FP_TEXTDOMAIN ),
                        'title'   => esc_html__( 'Title', WPB_FP_TEXTDOMAIN ),
                        'info'    => esc_html__( 'Informations', WPB_FP_TEXTDOMAIN ),
                        'content' => esc_html__( 'Content', WPB_FP_TEXTDOMAIN ),
                        'button'  => esc_html__( 'Details button.', WPB_FP_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'      => 'wpb_fp_qv_content_type',
                    'label'     => esc_html__( 'QuickView Content Type', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'full_content',
                    'options'   => array(
                        'short_desc'     => esc_html__( 'Sort Description', WPB_FP_TEXTDOMAIN ),
                        'full_content'   => esc_html__( 'Full Content', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'      => 'wpb_fp_details_btn_type',
                    'label'     => esc_html__( 'Details Button Type', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'external_link',
                    'options'   => array(
                        'external_link'     => esc_html__( 'External Link', WPB_FP_TEXTDOMAIN ),
                        'details_page'      => esc_html__( 'Details Portfolio Page', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'      => 'wpb_fp_view_portfolio_btn_target',
                    'label'     => esc_html__( 'View Button Target.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'select',
                    'default'   => 'new',
                    'options'   => array(
                        'new'     => esc_html__( 'New Window', WPB_FP_TEXTDOMAIN ),
                        'same'    => esc_html__( 'Same Window', WPB_FP_TEXTDOMAIN ),
                    ),
                ),
                array(
                    'name'  => 'wpb_fp_force_load_magnific_popup',
                    'label' => esc_html__( 'Quickview Popup Issue?', WPB_FP_TEXTDOMAIN ),
                    'desc'  => esc_html__( 'Check this if you having any issue with quickview popup.', WPB_FP_TEXTDOMAIN ),
                    'type'  => 'checkbox'
                ),
            ),
            
            'wpb_fp_slider' => array(
                array(
                    'name'  => 'wpb_fp_enable_slider',
                    'label' => esc_html__( 'Enable Slider', WPB_FP_TEXTDOMAIN ),
                    'desc'  => esc_html__( 'Check this to enable the portfolio slider', WPB_FP_TEXTDOMAIN ),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'      => 'wpb_fp_autoplay',
                    'label'     => esc_html__( 'Slider Autoplay', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Check this to enable the slider autoplay', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_loop',
                    'label'     => esc_html__( 'Slider Loop', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Check this to enable the slider loop', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox'
                ),
                array(
                    'name'      => 'wpb_fp_navigation',
                    'label'     => esc_html__( 'Slider Navigation', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Check this to enable the slider navigation', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_pagination',
                    'label'     => esc_html__( 'Slider Pagination', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Check this to enable the slider pagination', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'checkbox',
                    'default'   => 'on',
                ),
                array(
                    'name'      => 'wpb_fp_margin',
                    'label'     => esc_html__( 'Slider Margin', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Space between slider items. Default 15px.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 15
                ),
                array(
                    'name'      => 'wpb_fp_items',
                    'label'     => esc_html__( 'Slider Column', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Slider column. Default 3.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 3
                ),
                array(
                    'name'      => 'wpb_fp_items_tablet',
                    'label'     => esc_html__( 'Slider Column in Tablet', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Slider column in tablet. Default 2.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 2
                ),
                array(
                    'name'      => 'wpb_fp_items_mobile',
                    'label'     => esc_html__( 'Slider Column in Mobile', WPB_FP_TEXTDOMAIN ),
                    'desc'      => esc_html__( 'Slider column in mobile. Default 1.', WPB_FP_TEXTDOMAIN ),
                    'type'      => 'number',
                    'default'   => 1
                ),
            ),
        );
        
        $settings_fields = apply_filters( 'wpb_fp_settings_fields', $settings_fields );

        return $settings_fields;
    }
    
    // warping the settings
    function wpb_plugin_page() {
        echo '<div class="wrap wpb_fp_wrap">';
            settings_errors();
            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();
        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }
        return $pages_options;
    }
}
endif;

$settings = new WPB_fp_settings_config();


//--------- trigger setting api class---------------- //

function wpb_fp_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}