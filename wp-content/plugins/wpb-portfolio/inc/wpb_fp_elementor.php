<?php


/**
 * Add a New Elementor Widegt Category
 */

add_action( 'elementor/init', 'wpb_fp_add_elementor_category' );

if( !function_exists('wpb_fp_add_elementor_category') ){
    function wpb_fp_add_elementor_category(){
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'wpb_widgets',
            array(
                'title' => esc_html__( 'WpBean Plugins', WPB_FP_TEXTDOMAIN ),
            ),
            1
        );
    }
}


/**
 * Add Elementor Widegts
 */


class WPB_FP_Elementor_Element {

  private static $instance = null;

  public static function get_instance() {
    if ( ! self::$instance )
    self::$instance = new self;
    return self::$instance;
  }

  public function init(){
    add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
    add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_register_scripts' ) );
    add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
    add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
    add_action( 'elementor/frontend/after_register_styles', array( $this, 'widget_register_styles' ) );
    add_action( 'elementor/frontend/after_enqueue_styles', array($this, 'widget_enqueue_styles') );

  }

  public function widget_register_scripts() {
    wp_register_script('wpb-fpel-mixitup', plugins_url('../assets/js/jquery.mixitup.min.js', __FILE__), array('jquery'), '2.1.6', false);
    wp_register_script('wpb-fpel-imagesloaded', plugins_url('../assets/js/imagesloaded.pkgd.min.js', __FILE__), array('jquery'), '4.1.4', false);
    wp_register_script('wpb-fpel-isotope', plugins_url('../assets/js/isotope.pkgd.min.js', __FILE__), array('jquery'), '3.0.5', false);
    wp_register_script('wpb-fpel-magnific-popup', plugins_url('../assets/js/jquery.magnific-popup.min.js', __FILE__) ,array('jquery'),'1.0', false);
    wp_register_script('wpb-fpel-lightslider-js', plugins_url('../assets/js/lightslider.min.js', __FILE__), array('jquery'), '1.0', false);
    wp_register_script('wpb-fpel-owl-carousel', plugins_url('../assets/js/owl.carousel.min.js', __FILE__), array('jquery'), '2.3.4', false);
    wp_register_script('wpb-fpel-main-js', plugins_url('../assets/js/main.js', __FILE__) ,array('jquery'),'1.0', false);
    wp_register_script('wpb-fpel-el-main-js', plugins_url('../assets/js/el-main.js', __FILE__) ,array('jquery'),'1.0', false);

    wp_localize_script( 'wpb-fpel-el-main-js', 'wpb_fp_ajax_name', array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
    wp_add_inline_style( 'wpb-fpel-main', wpb_fp_get_option( 'wpb_fp_custom_css_', 'wpb_fp_style', '' ) );
  }

  public function widget_enqueue_scripts() {
    wp_enqueue_script('wpb-fpel-mixitup', plugins_url('../assets/js/jquery.mixitup.min.js', __FILE__), array('jquery'), '2.1.6', false);
    wp_enqueue_script('wpb-fpel-imagesloaded', plugins_url('../assets/js/imagesloaded.pkgd.min.js', __FILE__), array('jquery'), '4.1.4', false);
    wp_enqueue_script('wpb-fpel-isotope', plugins_url('../assets/js/isotope.pkgd.min.js', __FILE__), array('jquery'), '3.0.5', false);
    wp_enqueue_script('wpb-fpel-magnific-popup', plugins_url('../assets/js/jquery.magnific-popup.min.js', __FILE__) ,array('jquery'),'1.0', false);
    wp_enqueue_script('wpb-fpel-lightslider-js', plugins_url('../assets/js/lightslider.min.js', __FILE__), array('jquery'), '1.0', false);
    wp_enqueue_script('wpb-fpel-owl-carousel', plugins_url('../assets/js/owl.carousel.min.js', __FILE__), array('jquery'), '2.3.4', false);
    wp_enqueue_script('wpb-fpel-main-js', plugins_url('../assets/js/main.js', __FILE__) ,array('jquery'),'1.0', false);
    wp_enqueue_script('wpb-fpel-el-main-js', plugins_url('../assets/js/el-main.js', __FILE__) ,array('jquery'),'1.0', false);

    wp_localize_script( 'wpb-fpel-el-main-js', 'wpb_fp_ajax_name', array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
    wp_add_inline_style( 'wpb-fpel-main', wpb_fp_get_option( 'wpb_fp_custom_css_', 'wpb_fp_style', '' ) );
  }

  public function widget_register_styles(){
    wp_register_style('bootstrap-grid', plugins_url('../assets/css/bootstrap-grid.min.css', __FILE__), '', '4.0');
    wp_register_style('wpb-fpel-magnific-popup', plugins_url('../assets/css/magnific-popup.css', __FILE__), '', '1.0');
    wp_register_style('wpb-fpel-lightslider', plugins_url('../assets/css/lightslider.min.css', __FILE__), '', '1.0');
    wp_register_style('wpb-fpel-owl-carousel', plugins_url('../assets/css/owl.carousel.min.css', __FILE__), '', '2.3.4');
    wp_register_style('wpb-fp-main', plugins_url('../assets/css/main.css', __FILE__), '', '1.0');
  }

  public function widget_enqueue_styles(){
    wp_enqueue_style('bootstrap-grid', plugins_url('../assets/css/bootstrap-grid.min.css', __FILE__), '', '4.0'); 
    wp_enqueue_style('wpb-fpel-magnific-popup', plugins_url('../assets/css/magnific-popup.css', __FILE__), '', '1.0');
    wp_enqueue_style('wpb-fpel-lightslider', plugins_url('../assets/css/lightslider.min.css', __FILE__), '', '1.0');
    wp_enqueue_style('wpb-fpel-owl-carousel', plugins_url('../assets/css/owl.carousel.min.css', __FILE__), '', '2.3.4');
    wp_enqueue_style('wpb-fp-main', plugins_url('../assets/css/main.css', __FILE__), '', '1.0');
  }

  public function widgets_registered() {
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){

      require_once( WPB_FP_Plugin_EL_Template_Path . 'wpb-fp-portfolio-elementor-widget.php' );
      require_once( WPB_FP_Plugin_EL_Template_Path . 'wpb-fp-portfolio-info-widget.php' );
      require_once( WPB_FP_Plugin_EL_Template_Path . 'wpb-fp-portfolio-short-desc-widget.php' );
      require_once( WPB_FP_Plugin_EL_Template_Path . 'wpb-fp-portfolio-gallery.php' );

    }
  }
}

WPB_FP_Elementor_Element::get_instance()->init();