<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'BestBug_ScrollMagic_Shortcode' ) ) {
	/**
	 * BestBug_ScrollMagic_Shortcode Class
	 *
	 * @since	1.0
	 */
	class BestBug_ScrollMagic_Shortcode {


		/**
		 * Constructor
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {
			add_shortcode( 'bb_scrollmagic_scene', array( $this,'shortcodeScrollmagic') );
		}

		public function init() {

        }

        function shortcodeScrollmagic(  $atts ) {
			if(is_admin())return;
            $sceneId = $atts["id"];
            if(!$sceneId) {
				return;
            }
            $scene = get_post( $sceneId);
			if(!$scene) {
				return;
            }
            $sceneSettings = json_decode ( base64_decode( $scene->post_content) );
            $shortcodeSelected = $sceneSettings->shortcodeSelected;
            if($shortcodeSelected == null){
                return;
            }
			$classScroll =  $sceneSettings->general->name;
			ob_start();
			include "template_shortcode/".$shortcodeSelected.".view.php";
			$scroll_magic_scene = ob_get_contents(); 
			ob_end_clean();
			return $scroll_magic_scene;
		}

    }
	
	new BestBug_ScrollMagic_Shortcode();
}

