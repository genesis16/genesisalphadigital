<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPB_FP_Widget_Portfolio_Info extends Widget_Base {

	public function get_name() {
		return 'wpb_filterable_portfolio_info';
	}

	public function get_title() {
		return esc_html__( 'WPB Portfolio Info', WPB_FP_TEXTDOMAIN );
	}

	public function get_icon() {
		return 'eicon-alert';
	}

  public function is_reload_preview_required(){
    return true;
  }

	public function get_categories() {
		return [ 'wpb_widgets' ];
	}

	protected function _register_controls() {
    $this->start_controls_section(
      'wpb_fp_info_settings',
      [
        'label' => esc_html__( 'Info Settings', WPB_FP_TEXTDOMAIN )
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

    $this->end_controls_section();
	}

  protected function render() {
    $settings           = $this->get_settings();
    $portfolio_id       =  $settings['portfolio_id'];

    if( is_single() && !$portfolio_id ){
      $portfolio_id = get_the_ID();
    }

    echo wpb_fp_portfolio_informations($portfolio_id);
  }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPB_FP_Widget_Portfolio_Info() );