<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPB_FP_Widget_Portfolio_Gallery extends Widget_Base {

	public function get_name() {
		return 'wpb_filterable_portfolio_gallery';
	}

	public function get_title() {
		return esc_html__( 'WPB Portfolio Gallery', WPB_FP_TEXTDOMAIN );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

  public function is_reload_preview_required(){
    return true;
  }

	public function get_categories() {
		return [ 'wpb_widgets' ];
	}

	protected function _register_controls() {
    $this->start_controls_section(
      'wpb_fp_gallery_settings',
      [
        'label' => esc_html__( 'Gallery Settings', WPB_FP_TEXTDOMAIN )
      ]
    );

    $this->add_control(
      'portfolio_id',
      [
        'label'         => esc_html__( 'Portfolio Post ID', WPB_FP_TEXTDOMAIN ),
        'description'   => esc_html__( 'Not necessary if you add this on single portfolio page.', WPB_FP_TEXTDOMAIN ),
        'type'          => \Elementor\Controls_Manager::TEXT,
      ]
    );

    $this->add_control(
        'gallery_type',
        [
            'label'     => esc_html__( 'Gallery Type', WPB_FP_TEXTDOMAIN ),
            'type'      => Controls_Manager::SELECT,
            'default'   => 'slider',
            'options'   => [
                'slider'       => esc_html__( 'Slider', WPB_FP_TEXTDOMAIN ),
                'grid'         => esc_html__( 'Grid', WPB_FP_TEXTDOMAIN ),
            ]
        ]
    );

    $this->add_control(
        'grid_column',
        [
            'label'     => esc_html__( 'Gird Columns', WPB_FP_TEXTDOMAIN ),
            'type'      => Controls_Manager::SELECT,
            'default'   => '5',
            'condition'     => [
                '.gallery_type' => 'grid'
            ],      
            'options'   => [
                '2'     => esc_html__( '6 Columns', WPB_FP_TEXTDOMAIN ),
                '5'     => esc_html__( '5 Columns', WPB_FP_TEXTDOMAIN ),
                '3'     => esc_html__( '4 Columns', WPB_FP_TEXTDOMAIN ),
                '4'     => esc_html__( '3 Columns', WPB_FP_TEXTDOMAIN ),
                '6'     => esc_html__( '2 Columns', WPB_FP_TEXTDOMAIN ),
                '12'    => esc_html__( '1 Columns', WPB_FP_TEXTDOMAIN ),
            ]
        ]
    ); 

    $this->end_controls_section();
	}

  protected function render() {
    $settings           = $this->get_settings();
    $portfolio_id       =  $settings['portfolio_id'];
    $gallery_type       =  $settings['gallery_type'];
    $grid_column        =  $settings['grid_column'];

    if( is_single() && !$portfolio_id ){
      $portfolio_id = get_the_ID();
    }

    echo wpb_fp_get_scripts_single_portfolio();
    echo wpb_fp_quickview_galllery( '', $portfolio_id, $gallery_type, $grid_column, 'wpb_fp_el_gallery_slider' );
  }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPB_FP_Widget_Portfolio_Gallery() );