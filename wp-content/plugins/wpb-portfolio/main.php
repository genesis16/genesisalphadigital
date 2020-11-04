<?php
/**
 * Plugin Name: WPB Filterable Portfolio
 * Plugin URI:  https://wpbean.com/product/wpb-filterable-portfolio
 * Description: Filterable portfolio Wordpress plugin. Shortcode [wpb-portfolio]
 * Version:     2.8.1
 * Author:      WpBean
 * Author URI:  https://wpbean.com/
 * Text Domain: wpb_fp
 * Domain Path: /languages
 *
 * WC requires at least: 3.5
 * WC tested up to: 4.1.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


/**
 * Define Constants 
 */

if ( !defined( 'WPB_FP_VERSION' ) ) {
    define( 'WPB_FP_VERSION', '2.8.1' );
}

if ( !defined( 'WPB_FP_ITEM_ID' ) ) {
    define( 'WPB_FP_ITEM_ID', 1011 ); 
}

if ( !defined( 'WPB_FP_URI' ) ) {
    define( 'WPB_FP_URI', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WPB_FP_PREMIUM' ) ) {
    define( 'WPB_FP_PREMIUM', plugin_basename( __FILE__ ) );
}

if ( !defined( 'WPB_FP_Plugin_Path' ) ) {
    define( 'WPB_FP_Plugin_Path', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( !defined( 'WPB_FP_Plugin_EL_Template_Path' ) ) {
    define( 'WPB_FP_Plugin_EL_Template_Path', WPB_FP_Plugin_Path . '/elementor/' );
}

if ( !defined( 'WPB_FP_CUSTOM_METABOXES_DIR' ) ) {
    define( 'WPB_FP_CUSTOM_METABOXES_DIR', plugins_url('/admin/metaboxes', __FILE__) );
}

if ( !defined( 'WPB_FP_TEXTDOMAIN' ) ) {
    define( 'WPB_FP_TEXTDOMAIN', 'wpb_fp' );
}



/**
 * Free version deactivation if installed
 */

if( ! function_exists( 'wpbean_deactive_free_version' ) ) {
    require_once 'inc/wpb-deactive-plugin.php';
}
wpbean_deactive_free_version( 'WPB_FP_FREE_INIT', plugin_basename( __FILE__ ) );


/**
 * WpBean Plugin updater init
 * Warning!!!! 
 * Do not make any change in the code below. It will process the plugin auto update.
 */

function wpb_fp_plugin_updater_init() {

    $store_url      = wpb_fp_updater_init()->store_url;
    $prefix         = wpb_fp_updater_init()->prefix;
    $license_key    = trim( get_option( $prefix.'license_key' ) );

    $edd_updater    = new WPB_EDD_SL_Plugin_Updater( $store_url, __FILE__, array(
            'version'   => WPB_FP_VERSION,
            'license'   => $license_key,
            'item_id'   => WPB_FP_ITEM_ID,
            'author'    => 'WpBean',
            'url'       => home_url(),
        )
    );
}


/**
 * WPB Filterable Portfolio Class
 */

class WPB_Filterable_Portfolio {

    /**
     * The plugin path
     *
     * @var string
     */
    public $plugin_path;


    /**
     * The theme directory path
     *
     * @var string
     */
    public $theme_dir_path;


    /**
     * Initializes the WPB_Filterable_Portfolio() class
     *
     * Checks for an existing WPB_Filterable_Portfolio() instance
     * and if it doesn't find one, creates it.
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new WPB_Filterable_Portfolio();

            $instance->plugin_init();
        }

        return $instance;
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    function plugin_init() {
    	$this->theme_dir_path = apply_filters( 'wpb_filterable_portfolio_dir_path', 'wpb-filterable-portfolio/' );

    	$this->file_includes();

        add_action( 'init', array( $this, 'localization_setup' ) );

        register_deactivation_hook( plugin_basename( __FILE__ ), array( $this, 'plugin_deactivation' ) );
        register_activation_hook( plugin_basename( __FILE__ ), array( $this, 'plugin_activation' ) );

        add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );

        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'wpb_portfolio_plugin_actions' ) );
    }


    /**
     * Load the required files
     *
     * @return void
     */
    function file_includes() {
        
		require_once dirname( __FILE__ ) . '/admin/wpb_aq_resizer.php';
		require_once dirname( __FILE__ ) . '/admin/wpb-fp-admin.php';
		require_once dirname( __FILE__ ) . '/admin/wpb-class.settings-api.php';
		require_once dirname( __FILE__ ) . '/admin/wpb-settings-config.php';
		require_once dirname( __FILE__ ) . '/admin/metaboxes/meta_box.php';
		require_once dirname( __FILE__ ) . '/admin/wpb_fp_metabox_config.php';
		require_once dirname( __FILE__ ) . '/admin/wpb_fp_shortcode_generator.php';


		require_once dirname( __FILE__ ) . '/inc/wpb_scripts.php';
		require_once dirname( __FILE__ ) . '/inc/wpb-fp-shortcode.php';
        require_once dirname( __FILE__ ) . '/inc/wpb-fp-post-type.php';
		require_once dirname( __FILE__ ) . '/inc/wpb-fp-functions.php';

		if( !class_exists( 'WPB_EDD_SL_Plugin_Updater' ) ) {
			include( dirname( __FILE__ ) . '/admin/updater/plugin-updater.php' );
		}
		require_once dirname( __FILE__ ) . '/admin/updater/updater-init.php';


		$wpb_fp_gallery_support = wpb_fp_get_option( 'wpb_fp_gallery_support', 'wpb_fp_general', 'on' );
		if( $wpb_fp_gallery_support == 'on' ){
			require_once dirname( __FILE__ ) . '/inc/wpb_fp_gallery.php';
		}

        if( defined('ELEMENTOR__FILE__') ){
            require_once dirname( __FILE__ ) . '/inc/wpb_fp_elementor.php';
        }
    }


    /**
     * Plugin loaded
     */
    
    function plugins_loaded() {
        
    }


    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {

        load_plugin_textdomain( WPB_FP_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Plugin Deactivation
     */

    function plugin_deactivation() {
      flush_rewrite_rules();
    }

    /**
     * Plugin Activation
     */

    function plugin_activation() {
      flush_rewrite_rules();
    }


    /**
	 * Add plugin action links
	 */

	function wpb_portfolio_plugin_actions( $links ) {
	   $links[] = '<a href="'. esc_url( menu_page_url('portfolio-settings', false) ) .'">'. esc_html__('Settings', WPB_FP_TEXTDOMAIN) .'</a>';
       $links[] = '<a href="https://wpbean.com/support/" target="_blank">'. esc_html__('Support', WPB_FP_TEXTDOMAIN) .'</a>';
       $links[] = '<a href="'. esc_url( admin_url( '/post-new.php?post_type=wpb_fp_portfolio' )) .'">'. esc_html__('Add a Portfolio', WPB_FP_TEXTDOMAIN) .'</a>';
	   $links[] = '<a href="'. esc_url( admin_url( '/edit.php?post_type=wpb_fp_shortcode_gen' )) .'">'. esc_html__('Add a ShortCode', WPB_FP_TEXTDOMAIN) .'</a>';
	   $links[] = '<a href="http://docs.wpbean.com/docs/wpb-filterable-portfolio/" target="_blank">'. esc_html__('Documentation', WPB_FP_TEXTDOMAIN) .'</a>';
	   return $links;
	}



    /**
     * Get the plugin path.
     *
     * @return string
     */
    public function plugin_path() {
        if ( $this->plugin_path ) return $this->plugin_path;

        return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Get the template path.
     *
     * @return string
     */
    public function template_path() {
        return $this->plugin_path() . '/templates/';
    }

}

/**
 * Initialize the plugin
 */
function wpb_filterable_portfolio() {
    return WPB_Filterable_Portfolio::init();
}


/**
 * Plugin Init
 */

function wpb_filterable_portfolio_plugin_init(){
    add_action( 'admin_init', 'wpb_fp_plugin_updater_init', 0 );
    wpb_filterable_portfolio();
}
add_action( 'plugins_loaded', 'wpb_filterable_portfolio_plugin_init' );