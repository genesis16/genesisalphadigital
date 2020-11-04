<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPB_FP_Widget_Portfolio extends Widget_Base {

	public function get_name() {
		return 'wpb_filterable_portfolio';
	}

	public function get_title() {
		return esc_html__( 'WPB Portfolio', WPB_FP_TEXTDOMAIN );
	}

	public function get_icon() {
		return 'eicon-gallery-justified';
	}

  public function is_reload_preview_required(){
    return true;
  }

	public function get_categories() {
		return [ 'wpb_widgets' ];
	}

	protected function _register_controls() {
    $skins          = apply_filters( 'wpb_fp_portfolio_skins', array() );
    $skins_options  = array();

    if( isset($skins) && !empty($skins) ){
      foreach ($skins as $key => $skin ) {
        $skins_options[$skin['value']] = $skin['label'];
      }
    }

    $this->start_controls_section(
      'wpb_fp_settings',
      [
        'label' => esc_html__( 'Portfolio Settings', WPB_FP_TEXTDOMAIN )
      ]
    );

    $this->add_control(
      'wpb_fp_skin',
      [   
        'label'         => esc_html__( 'Portfolio Skin', WPB_FP_TEXTDOMAIN ),
        'type'          => Controls_Manager::SELECT,
        'default'       => 'img_bg_hover_effect',
        'options'       => $skins_options,
      ]
    );

    $this->add_control(
        'filter_style',
        [
            'label'         => esc_html__( 'Filter Style', WPB_FP_TEXTDOMAIN ),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'default',              
            'options'       => [
              'default'       => esc_html__( 'Default', WPB_FP_TEXTDOMAIN ),
              'capsule'       => esc_html__( 'Capsule', WPB_FP_TEXTDOMAIN ),
              'capsule_two'   => esc_html__( 'Capsule Two', WPB_FP_TEXTDOMAIN ),
              'plain'         => esc_html__( 'Plain', WPB_FP_TEXTDOMAIN ),
              'select'        => esc_html__( 'Select Box', WPB_FP_TEXTDOMAIN ),
            ]              
        ]
    );

    $this->add_control(
        'quickview_type',
        [
            'label'         => esc_html__( 'Quickview Type', WPB_FP_TEXTDOMAIN ),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'image_content',              
            'options'       => [
              'image_only'       => esc_html__( 'Image only', WPB_FP_TEXTDOMAIN ),
              'image_content'    => esc_html__( 'Image and Content', WPB_FP_TEXTDOMAIN ),
            ]              
        ]
    );

    $this->add_control(
        'column_settings',
        [
            'label'         => esc_html__( 'Columns', WPB_FP_TEXTDOMAIN ),
            'type'          => Controls_Manager::SELECT,
            'default'       => 3,              
            'options'       => [
                2           => esc_html__( '6 Columns', WPB_FP_TEXTDOMAIN ),
                5           => esc_html__( '5 Columns', WPB_FP_TEXTDOMAIN ),
                3           => esc_html__( '4 Columns', WPB_FP_TEXTDOMAIN ),
                4           => esc_html__( '3 Columns', WPB_FP_TEXTDOMAIN ),
                6           => esc_html__( '2 Columns', WPB_FP_TEXTDOMAIN ),
                12          => esc_html__( '1 Columns', WPB_FP_TEXTDOMAIN )
            ]              
        ]
    );

    $this->add_control(
        'wpb_fp_posts',
        [
            'label'         => esc_html__( 'Count', WPB_FP_TEXTDOMAIN ),
            'description'   => esc_html__('Number of portfolios to show. Default 16.', WPB_FP_TEXTDOMAIN),
            'type'          => Controls_Manager::SLIDER,
            'default'       => [
              'size'      => 16,
            ],
            'range'         => [
              'px'        => [
                'min'   => 1,
                'max'   => 50,
              ],
            ],
        ]
    );

    $this->add_control(
      'order',
      [
          'type'          => Controls_Manager::SELECT,
          'label'         => esc_html__( 'Order', WPB_FP_TEXTDOMAIN ),
          'default'       => 'DESC',
          'description'   => esc_html__('Portfolio Order', WPB_FP_TEXTDOMAIN),
          'options'       => [
              'ASC'       => esc_html__( 'Ascending', WPB_FP_TEXTDOMAIN ),
              'DESC'      => esc_html__( 'Descending', WPB_FP_TEXTDOMAIN )
          ],
      ]
    );        

    $this->add_control(
      'order_by',
      [
          'type'          => Controls_Manager::SELECT,
          'label'         => esc_html__( 'Order By', WPB_FP_TEXTDOMAIN ),
          'default'       => 'date',
          'description'   => esc_html__('Portfolio OrderBy', WPB_FP_TEXTDOMAIN),
          'options'       => [
              'none'          => esc_html__('No order', WPB_FP_TEXTDOMAIN ),
              'ID'            => esc_html__('Post ID', WPB_FP_TEXTDOMAIN ),
              'author'        => esc_html__('Author', WPB_FP_TEXTDOMAIN ),
              'title'         => esc_html__('Title', WPB_FP_TEXTDOMAIN ),
              'date'          => esc_html__('Published date', WPB_FP_TEXTDOMAIN ),
              'modified'      => esc_html__('Modified date', WPB_FP_TEXTDOMAIN ),
              'parent'        => esc_html__('By parent', WPB_FP_TEXTDOMAIN ),
              'rand'          => esc_html__('Random order', WPB_FP_TEXTDOMAIN ),
              'comment_count' => esc_html__('Comment count', WPB_FP_TEXTDOMAIN ),
              'menu_order'    => esc_html__('Menu order', WPB_FP_TEXTDOMAIN ),
              'post__in'      => esc_html__('By include order', WPB_FP_TEXTDOMAIN )
          ],
      ]
    );

    $this->add_control(
      'pagination',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Show Pagination?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'yes',
      ]
    );

    $this->add_control(
      'load_more',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Show Load More Button?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'yes',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'wpb_fp_slider_settings',
      [
        'label' => esc_html__( 'Slider Settings', WPB_FP_TEXTDOMAIN )
      ]
    );

    $this->add_control(
      'enable_slider',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Enable Slider?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'yes',
      ]
    );

    $this->add_control(
      'autoplay',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Slider Autoplay?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'on',
        'default'       => 'on',
      ]
    );

    $this->add_control(
      'loop',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Slider Loop?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'on',
      ]
    );

    $this->add_control(
      'navigation',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Slider Navigation?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'on',
        'default'       => 'on',
      ]
    );

    $this->add_control(
      'slider_pagination',
      [
        'type'          => Controls_Manager::SWITCHER,
        'label'         => esc_html__( 'Slider Pagination?', WPB_FP_TEXTDOMAIN ),
        'return_value'  => 'on',
      ]
    );

    $this->add_control(
      'margin',
      [
        'label'         => esc_html__( 'Slider Margin', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 15px.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '15',
      ]
    );

    $this->add_control(
      'items',
      [
        'label'         => esc_html__( 'Slider Columns', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 3.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '3',
      ]
    );

    $this->add_control(
      'tablet',
      [
        'label'         => esc_html__( 'Slider Columns in Tablet', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 2.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '2',
      ]
    );

    $this->add_control(
      'mobile',
      [
        'label'         => esc_html__( 'Slider Columns in Mobile', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 1.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '1',
      ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'wpb_fp_query_settings',
      [
        'label' => esc_html__( 'Query Settings', WPB_FP_TEXTDOMAIN )
      ]
    );

    $post_types = get_post_types(array(
      'public'   => true,
      '_builtin' => false,
    ));

    unset($post_types['elementor_library']);
    unset($post_types['wpb_fp_shortcode_gen']);
    $post_types['post'] = 'post';
    $post_type_options  = array();

    if( isset($post_types) && !empty($post_types) ){
      foreach ($post_types as  $key => $post_type ) {
        $post_type_options[$post_type] = $post_type;
      }
    }

    $this->add_control(
        'wpb_fp_post_type',
        [   
            'label'         => esc_html__( 'Portfolio Post Type', WPB_FP_TEXTDOMAIN ),
            'description'   => esc_html__( 'Default: wpb_fp_portfolio. Go to this plugin advance settings to add portfolio option support on your custom post type.', WPB_FP_TEXTDOMAIN ),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'wpb_fp_portfolio',
            'options'       => $post_type_options,
        ]
    );

    $taxonomy_objects   = get_taxonomies( array( 'public' => true ), 'objects' );
    $taxonomy           = array();
    foreach ($taxonomy_objects as $taxonomy_object) {
      $taxonomy[$taxonomy_object->name] = $taxonomy_object->label;
    }

    $this->add_control(
        'wpb_fp_taxonomy',
        [   
          'label'         => esc_html__( 'Portfolio Taxonomy', WPB_FP_TEXTDOMAIN ),
          'description'   => esc_html__( 'Default: wpb_fp_portfolio_cat.', WPB_FP_TEXTDOMAIN ),
          'type'          => Controls_Manager::SELECT,
          'default'       => 'wpb_fp_portfolio_cat',
          'options'       => $taxonomy,
        ]
    );

    $this->add_control(
      'wpb_fp_cat_include',
      [
        'label'         => esc_html__( 'Category Include', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__( 'Comma separated categories id to include.', WPB_FP_TEXTDOMAIN ),
        'type'          => Controls_Manager::TEXT,
      ]
    );

    $this->add_control(
      'wpb_fp_cat_exclude',
      [
        'label'         => esc_html__( 'Category Exclude', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__( 'Comma separated categories id to exclude.', WPB_FP_TEXTDOMAIN ),
        'type'          => Controls_Manager::TEXT,
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'wpb_fp_image_settings',
      [
        'label' => esc_html__( 'Image Settings', WPB_FP_TEXTDOMAIN )
      ]
    );

    $this->add_control(
      'default_img_size',
      [   
        'label'         => esc_html__( 'Image Size', WPB_FP_TEXTDOMAIN ),
        'type'          => Controls_Manager::SELECT,
        'default'       => 'wpb_portfolio_thumbnail',
        'options'       => wpb_fp_get_intermediate_image_sizes_elementor(),
      ]
    );

    $this->add_control(
      'wpb_fp_img_width',
      [
        'label'         => esc_html__( 'Image Width', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 580.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '580',
        'condition'     => [
          '.default_img_size' => 'custom'
        ]
      ]
    );

    $this->add_control(
      'wpb_fp_img_height',
      [
        'label'         => esc_html__( 'Image Height', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__('Default 580.', WPB_FP_TEXTDOMAIN),
        'type'          => Controls_Manager::NUMBER,
        'min'           => 0,
        'default'       => '580',
        'condition'     => [
          '.default_img_size' => 'custom'
        ]
      ]
    );

    $this->end_controls_section();
	}

  protected function render() {
    $settings           = $this->get_settings();
    $wpb_fp_skin        =  $settings['wpb_fp_skin'];
    $filter_style       =  $settings['filter_style'];
    $quickview_type     =  $settings['quickview_type'];
    $wpb_fp_posts       =  $settings['wpb_fp_posts']['size'];
    $pagination         =  ( $settings['pagination'] == 'yes' ? 'on' : 'off' );
    $load_more          =  ( $settings['load_more'] == 'yes' ? 'on' : 'off' );
    $column             =  $settings['column_settings'];
    $order              =  $settings['order'];
    $order_by           =  $settings['order_by'];
    $post_type          =  $settings['wpb_fp_post_type'];
    $taxonomy           =  $settings['wpb_fp_taxonomy'];
    $cat_include        =  $settings['wpb_fp_cat_include'];
    $cat_exclude        =  $settings['wpb_fp_cat_exclude'];
    $img_size           =  $settings['default_img_size'];
    $img_width          =  $settings['wpb_fp_img_width'];
    $img_height         =  $settings['wpb_fp_img_height'];
    $type               =  ( $settings['enable_slider'] == 'yes' ? 'slider' : 'grid' );

    if( $img_size == 'custom' ){
      $img_hard_crop = 'yes';
    }else{
      $img_hard_crop = 'no';
    }

    echo do_shortcode( '[wpb-another-portfolio shortcode_id="'.$this->get_id().'" wpb_fp_skin="'.$wpb_fp_skin.'" filter_style="'.$filter_style.'" quickview_type="'.$quickview_type.'" posts="'.$wpb_fp_posts.'" pagination="'.$pagination.'" load_more="'.$load_more.'" column="'.$column.'" order="'.$order.'" orderby="'.$order_by.'" post_type="'.$post_type.'" taxonomy="'.$taxonomy.'" fp_category="'.$cat_include.'" exclude_tax="'.$cat_exclude.'" img_no_hard_crop_size="'.$img_size.'" img_hard_crop="'.$img_hard_crop.'" width="'.$img_width.'" height="'.$img_height.'" type="'.$type.'" autoplay="'.$settings['autoplay'].'" loop="'.$settings['loop'].'" navigation="'.$settings['navigation'].'" slider_pagination="'.$settings['slider_pagination'].'" margin="'.$settings['margin'].'" items="'.$settings['items'].'" tablet="'.$settings['tablet'].'" mobile="'.$settings['mobile'].'"]' );
  }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPB_FP_Widget_Portfolio() );