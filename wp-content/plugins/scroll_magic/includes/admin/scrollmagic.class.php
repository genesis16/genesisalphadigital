<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'BestBug_ScrollMagic_Builder' ) ) {
	/**
	 * BestBug_ScrollMagic_Builder Class
	 *
	 * @since	1.0
	 */
	class BestBug_ScrollMagic_Builder {
		
		public $page_title;
		public $shortcodes;

		/**
		 * Constructor
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {
			$this->init();
		}

		public function init() {
			
			add_action( 'admin_menu', array( $this, 'all_scenes' ) );
			
			if(is_admin()) {
				add_action( 'admin_enqueue_scripts', array( $this, 'adminEnqueueScripts' ) );
			}
			if(is_admin() && isset($_GET['page']) && $_GET['page'] == BESTBUG_SCENE_ADD) {
				add_action( 'admin_enqueue_scripts', array( $this, 'adminEnqueueScriptsAddScene' ) );
			}
			
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
			add_action( 'wp_ajax_rc_delete_shortcode', array($this, 'delete') );
			add_filter( 'script_loader_tag', array($this, 'modify_jsx_tag'), 10, 3 );
			
			add_action( 'wp_ajax_update_scene', array( $this, 'update_scene' ) );
			add_action( 'wp_ajax_bbsm_delete_scene', array( $this, 'delete' ) );
			add_action( 'wp_ajax_bbsm_duplicate_scene', array( $this, 'duplicate' ) );

			add_action( 'wp_ajax_bbsm_delete_checked_scene', array( $this, 'delete_checked' ) );
        }
		
		public function modify_jsx_tag( $tag, $handle, $src ) {
			// Check that this is output of JSX file
			if ( 'bb-scene-editor' == $handle ) {
				$tag = str_replace( "<script type='text/javascript'", "<script type='text/babel'", $tag );
				$tag = str_replace( "<script src=", "<script type='text/babel' src=", $tag );
				$tag = str_replace( "<script  src=", "<script type='text/babel' src=", $tag );
			}
			
			if(isset($_GET['page']) && $_GET['page'] == BESTBUG_SCENE_ADD) {
				if('react' == $handle) {
					$tag = "<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/reactjs/react.min.js'></script>";
				} else if('react-dom' == $handle) {
					$tag = "<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/reactjs/react-dom.min.js'></script>";
				}
			}

			return $tag;
		}
		
		public function adminEnqueueScripts(){
			if(isset($_GET['page']) && ($_GET['page'] == BESTBUG_SM_SLUG || $_GET['page'] == BESTBUG_SCENE_ADD || $_GET['page'] == BESTBUG_SM_SLUG_SETTINGS)) {
				wp_enqueue_script( 'sweetalert', BESTBUG_CORE_URL . '/assets/admin/js/sweetalert.min.js', array( 'jquery' ), null, true );
				wp_enqueue_script( 'bb-sm', BESTBUG_SM_URL . '/assets/admin/js/admin.js', array( 'jquery' ), BESTBUG_SM_VERSION, true );
				wp_enqueue_script( 'bb-iframe', BESTBUG_SM_URL . '/assets/admin/js/load_iframe.js', array( 'jquery' ), BESTBUG_SM_VERSION, true );
			}
		}

		public function adminEnqueueScriptsAddScene() {
			if(is_admin() && isset($_GET['page']) && $_GET['page'] == BESTBUG_SCENE_ADD) {

				wp_enqueue_style( 'wp-color-picker');
				wp_enqueue_script( 'wp-color-picker' );
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-resizable' );
				wp_enqueue_script( 'jquery-ui-widget' );

				wp_enqueue_style( 'jquery-ui', BESTBUG_SM_URL . 'assets/libs/jquery/jquery-ui.min.css' );
				
				wp_enqueue_style( 'font-awesome', BESTBUG_SM_URL."assets/libs/font-awesome/css/font-awesome.min.css" );
				wp_enqueue_style( 'font-scrollmagic',BESTBUG_SM_URL."assets/libs/font-scrollmagic/style.css" );
				wp_enqueue_script( 'pagination',BESTBUG_SM_URL."assets/libs/pagination/pagination.min.js", array( 'jquery' ), '2.0.2', true );

				wp_enqueue_script( 'widget',BESTBUG_SM_URL."assets/libs/jquery/widget.min.js", array( 'jquery' ), '2.0.2', true );
				wp_enqueue_script( 'growl',BESTBUG_SM_URL."assets/libs/jquery/jquery.growl.js", array( 'jquery' ), '2.0.2', true );
				wp_enqueue_script( 'fontselect',BESTBUG_SM_URL."assets/libs/fontselect/jquery.fontselect.min.js", array( 'jquery' ), '0.1', true );
				wp_enqueue_style( 'fontselect', BESTBUG_SM_URL . 'assets/libs/fontselect/jquery.fontselect.min.css' );
				
				wp_enqueue_style( 'animate', BESTBUG_SM_URL . 'assets/libs/animate/animate.min.css' );

				wp_enqueue_script( 'gsap', BESTBUG_SM_URL . 'assets/libs/TweenMax/gsap-latest-beta.min.js', array( 'jquery' ), '3.0.1', true );
				wp_enqueue_script( 'SplitText3', BESTBUG_SM_URL . 'assets/libs/TweenMax/SplitText3.min.js', array( 'jquery' ), '2.0.2', true );

				wp_enqueue_script( 'MotionPathPlugin', BESTBUG_SM_URL . 'assets/libs/TweenMax/MotionPathPlugin.js', array( 'jquery' ), '3.2.3', true );
				
				wp_enqueue_script( 'scrollmagic', BESTBUG_SM_URL . 'assets/libs/scrollmagic/ScrollMagic.min.js', array( 'jquery' ), '2.0.7', true );
				wp_enqueue_script( 'animation-gsap', BESTBUG_SM_URL . 'assets/libs/scrollmagic/plugins/animation.gsap.min.js', array( 'jquery' ), '2.0.7', true );
				wp_enqueue_script( 'addIndicators', BESTBUG_SM_URL . 'assets/libs/scrollmagic/plugins/debug.addIndicators.min.js', array( 'jquery' ), '2.0.7', true );

				wp_enqueue_script( 'react', BESTBUG_SM_URL . 'assets/libs/reactjs/react.min.js', array( 'jquery' ), '16.7.0', true );
				wp_enqueue_script( 'react-dom', BESTBUG_SM_URL . 'assets/libs/reactjs/react-dom.min.js', array( 'react' ), '16.7.0', true );
				wp_enqueue_script( 'browser', BESTBUG_SM_URL . 'assets/libs/reactjs/browser.min.js', array( 'react' ), '5.8.38', true );

				wp_enqueue_script( 'bb-scene-editor', BESTBUG_SM_URL . 'assets/admin/js/bb-scene-editor.jsx', array( 'react' ), BESTBUG_SM_VERSION, true );
				// Localize the script
				$translation = array(
					'livePreview' => esc_html__( 'Live Preview', 'bestbug' ),
					'sceneSettings' => esc_html__('General Settings', 'bestbug'),
					'properties' => esc_html__('After', 'bestbug'),
					'ease' => esc_html__('Ease', 'bestbug'),
					'bezier' => esc_html__('Bezier', 'bestbug'),
					'classes' => esc_html__('Class', 'bestbug'),
					'general' => esc_html__('General', 'bestbug'),
					'init' => esc_html__('Init', 'bestbug'),
				);
				wp_localize_script( 'bb-scene-editor', 'BB_TRANSLATION', $translation );

				$props = array(
					'width' => '', 
					'height' => '',
					
					'zIndex' => '',
					'display' => '',
					'overflow' => '',
					
					'position' => '',
					'left' => '',
					'top' => '',
					'right' => '',
					'bottom' => '',
				
					'transformOrigin' => '',
				
					'x' => '',
					'y' => '',
					'z' => '',
				
					'scaleX' => '',
					'scaleY' => '',
				
					'rotation' => '',
					'rotationX' => '',
					'rotationY' => '',
					'rotationZ' => '',
				
					'skewX' => '',
					'skewY' => '',
				
					'backgroundColor' => '',
					'color' => '',
					
					'backgroundAttachment' => '',
					
					'overflow' => '',
				);
				
				$shortcode = array(
					'text' => array(
						'name' => 'text',
						'icon' => 'scrollyicon-font_download',
						'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
						'URL' => '',
						'target' => '_blank',
						'fontSize' => '14px',
						'fontFamily' => '',
						'cstFontFamily' => '',
						'fontWeight' => '400',
						'fontStyle' => 'normal',
						'textAlign' => 'left',
						'textTransform'=>'none',
						'letterSpacing' => '',
						'lineHeight' => '',
						'textDecoration' => 'none',
						'classCSS' => '',
					),
					'img' => array(
						'name' => 'image',
						'icon' => 'scrollyicon-photo_size_select_actual',
						'image' =>  BESTBUG_SM_URL . 'assets/images/img.png',
						'URL' => '',
						'target' => '_blank',
						'alt' => '',
						'classCSS' => '',
					),
					'button' => array(
						'name' => 'button',
						'icon' => 'scrollyicon-radio_button_checked',
						'title' => 'Click Here',
						'iconButton' => '',
						'URL' => '',
						'target' => '_blank',
						'iconFontSize' => '24px',
						'fontSize' => '14px',
						'fontFamily' => '',
						'cstFontFamily' => '',
						'fontWeight' => '400',
						'fontStyle' => 'normal',
						'textTransform'=>'none',
						'letterSpacing' => '',
						'lineHeight' => '',
						'textDecoration' => 'none',

						'classCSS' => '',
					),
					'sequence' => array(
						'name' => 'sequence',
						'icon' => 'scrollyicon-burst_mode',
						'images' => [BESTBUG_SM_URL . 'assets/images/sequense-image.png',],
						'URL' => '',
						'target' => '_blank',
						'alt' => '',
						'classCSS' => '',
					),
					'video' => array(
						'name' => 'video',
						'icon' => 'scrollyicon-video_collection',
						'video' => '',
						'poster' => BESTBUG_SM_URL . 'assets/images/video.png',
						
						'autoPlay' => 'off',
						'controls' => 'on',
						'loop' => 'off',
						'muted' => 'off',
						'preload' => 'off',

						'classCSS' => '',
					),
					'audio' => array(
						'name' => 'audio',
						'icon' => 'scrollyicon-audiotrack',
						'audio' => '',
						
						'autoPlay' => 'off',
						'controls' => 'on',
						'loop' => 'off',
						'muted' => 'off',
						'preload' => 'off',

						'classCSS' => '',
					),
					'svg' => array(
						'name' => 'svg',
						'icon' => 'scrollyicon-extension',
						'svg' =>  BESTBUG_SM_URL . 'assets/images/svg.svg',
						'classCSS' => '',
					),
					'shape' => array(
						'name' => 'shape',
						'icon' => 'scrollyicon-crop_din',
						'classCSS' => '',
					),
				);
				
				$settings = array(
					'init' => $props,
					'scroll' => $props,
					'shortcode' =>$shortcode,
					'shortcodeSelected' => null,
					// General
					'general' => array(
						'title' => '',
						'name' => '',
						'duration' => '',
						'offset' => '',
						'pin' => 'off',
						'pushFollowers' => true,
						'triggerHook' => '0.5',
						'vertical' => 'on',
						'reverse' => true,
						'triggerElement' => '',
					),
					// Ease
					'ease' => array(
						'delay' => '',
						'duration' => '0.5',
						'ease' => '',
					),
					// Class
					'class' => array(
						'classToggleEnable' => 'off',
						'classCSS' => 'bounce',
						'customClassCSS' => '',
					),
				
					// Misc
					'misc' => array(
						'drawSVG' => 'off',
						'unableFill' => 'false',
						'stroke' => '',
						'strokeWidth' => '',

						'imageSequence' => 'off',
						'textDance' => 'false',
						'textDanceStyle'=> 'wave_from',
						'textDanceSpeed'=> '0.01',
						'scrollToPlay' => 'off',
						'timeLapse' => 'off',
						'imageSequenceRepeat' => '',
						'selector' => '',
						'container' => '',
						'disableMobile' => 'off',
						'disableDesktop' => 'off',
						'clickTo' => '',
					),
				
					// bezier
					'bezier' => array(
						// array(
						// 	'x' => 510,
						// 	'y' => 60,
						// ),
						// array(
						// 	'x' => 620,
						// 	'y' => -60,
						// ),
						// array(
						// 	'x' => 500,
						// 	'y' => -100,
						// ),
						// array(
						// 	'x' => 380,
						// 	'y' => 20,
						// ),
						// array(
						// 	'x' => 500,
						// 	'y' => 60,
						// ),
						// array(
						// 	'x' => 580,
						// 	'y' => 20,
						// ),
						// array(
						// 	'x' => 620,
						// 	'y' => 15,
						// ),
					),
				);
				wp_localize_script( 'bb-scene-editor', 'BB_SCENE_SETTINGS', $settings );
				wp_localize_script( 'bb-scene-editor', 'adminUrl', admin_url('admin.php?page=bbsm-all-scenes') );
				$purchase_code= get_option( BESTBUG_SCROLMAGIC_PREFIX.'purchase_code' );
				if (empty($purchase_code)) {
					$purchase_code = 'false';
				}
				wp_localize_script( 'bb-scene-editor', 'purchaseCode', $purchase_code );

				$settings_edit = array();
				if(isset($_GET['idScene']) && !empty($_GET['idScene']) && is_numeric($_GET['idScene'])) {
					$scene_settings = get_post($_GET['idScene']);
					$settings_edit = (array)json_decode(base64_decode($scene_settings->post_content));
					$settings_edit['scene_id'] = $scene_settings->ID;
				}
				
				wp_localize_script( 'bb-scene-editor', 'BB_SCENE_EDIT_SETTINGS', $settings_edit );
				wp_localize_script( 'bb-scene-editor', 'settings_slug', admin_url( 'admin.php?page=bbsm-options#bbTabActive=product_license'));
			}
		}

		public function enqueueScripts() {
		
		}
		
		function update_scene(){

			if( isset( $_POST['data'] ) && !empty( $_POST['data'] ) ) {
				$settings = $_POST['data'];

				foreach ($settings['init'] as $key => $init) {
					if($init == '') {
						unset($settings['init'][$key]);
					}
				}
				foreach ($settings['scroll'] as $key => $scroll) {
					if($scroll == '') {
						unset($settings['scroll'][$key]);
					}
				}
				
				$name = sanitize_title( esc_html($settings['general']['name']) );
				if(empty($name)) {
					$name = sanitize_title( esc_html($settings['general']['title']) );
				}
				$settings['general']['name'] = $name;

				$scene = array(
					'post_title' => esc_html($settings['general']['title']),
					'post_content' => base64_encode(json_encode($settings)),
					'post_type' => 'bbsm_scene',
					'post_status' => 'publish',
					'post_name' => $name
				);

				if(isset($settings['scene_id']) && !empty($settings['scene_id'])) {
					$scene['ID'] = esc_html($settings['scene_id']);
				}
				
				$error = true;

				$scene_ID = wp_insert_post( $scene, $error );

				if( !$scene_ID ) {
					echo json_encode(array(
						'msg' => esc_html__('Failed'),
						'status' => 'error',
					));
				} else {
					$post = get_post($scene_ID);
					
					echo json_encode(array(
						'msg' => esc_html__('Saved'),
						'status' => 'ok',
						'name' => $post->post_name,
						'scene_id' => $scene_ID,
					));
					
				}
			}

			wp_die();

		}
	
		public function delete(){
			if(isset($_POST['id'])) {
				$del = wp_delete_post( $_POST['id'], true );
				if($del) {
					echo json_encode(array(
						'status' => 'notice',
						'title' => esc_html('Deleted', 'bestbug'),
						'message' => esc_html('Scene is deleted!', 'bestbug'),
					));
					exit;
				}
			}
			echo json_encode(array(
				'status' => 'error',
				'title' => esc_html('Error', 'bestbug'),
				'message' => esc_html('Can not delete!', 'bestbug'),
			));
			exit;
		}

		public function delete_checked(){
			global $wpdb;

			$queried_object = $wpdb->get_results ("
	    		SELECT * FROM $wpdb->posts WHERE post_status = 'publish' and post_type = 'post'",OBJECT_K);

			if(isset($_POST['ids'])) {
				$arr_ids = explode(",", $_POST['ids']);

				foreach($arr_ids as $ids){
					foreach($queried_object as $post){
						if( isset($post->ID) == $ids ) {
							$del = wp_delete_post( $ids, true );
						}
					}
				}
				exit;
			}

			echo json_encode(array(
				'status' => 'error',
				'title' => esc_html('Error', 'bestbug'),
				'message' => esc_html('Can not delete!', 'bestbug'),
			));
			exit;
		}
		
		public function duplicate(){
			if(!isset($_POST['id']) || empty($_POST['id'])) {
				return;
			}
			$post = get_post($_POST['id']);

			if($post) {
				
				$scene = array(
					'post_title' => esc_html($post->post_title),
					'post_content' => $post->post_content,
					'post_type' => BESTBUG_SCROLLMAGIC_POSTTYPE,
					'post_status' => 'publish',
				);
				
				$scene_ID = wp_insert_post( $scene );
				
				if( !$scene_ID ) {
					$this->notice = esc_html__( 'Irks! An error has occurred.', 'bestbug' );
					add_action( 'admin_notices', array( $this, 'error_notice' ) );
				} else {
					
					$post = get_post($scene_ID);
					if($post) {
						$settings = (array)json_decode(base64_decode($post->post_content));
						$settings["general"]->name = $post->post_name;
						$scene = array(
							'ID'           => $scene_ID,
							'post_content' => base64_encode(json_encode($settings)),
						);
					  	wp_update_post( $scene );
					}
					
					echo json_encode(array(
						'status' => 'notice',
						'title' => esc_html('Copied', 'bestbug'),
						'message' => esc_html('Scene is copied!', 'bestbug'),
						'row' => array(
							'id' => $post->ID,
							'title' => $post->post_title,
							'name' => $post->post_name,
						),
					));
					exit;
				}
				
			} 
			echo json_encode(array(
				'status' => 'error',
				'title' => esc_html('Error', 'bestbug'),
				'message' => esc_html('Can not copy!', 'bestbug'),
			));
			exit;
			
		}
		
		public function all_scenes(){
			$menu = array(
				'page_title' => esc_html('All Scenes', 'bestbug'),
				'menu_title' => esc_html('Scroll Magic', 'bestbug'),
				'capability' => 'manage_options',
				'menu_slug' => BESTBUG_SM_SLUG,
				'icon' => BESTBUG_SM_URL . '/assets/admin/img/visual_composer.png',
				'position' =>  76,
			);
			$this->page_title = $menu['page_title'];
			add_menu_page(
				$menu['page_title'],
				$menu['menu_title'],
				$menu['capability'],
				$menu['menu_slug'],
				array(&$this, 'view'),
				$menu['icon'],
				$menu['position']
			);
			add_submenu_page(
				BESTBUG_SM_SLUG,
				esc_html__('All Scenes' , 'bestbug'),
				esc_html__('All Scenes' , 'bestbug'),
				$menu['capability'],
				$menu['menu_slug'],
				array(&$this, 'view')
		    );
			add_submenu_page(
				BESTBUG_SM_SLUG,
				esc_html('Add Scene', 'bestbug'),
				esc_html('Add Scene', 'bestbug'),
				'manage_options',
				BESTBUG_SCENE_ADD,
				array(&$this, 'add_scenes' )
			);
		}
		
		public function view() {
			
			$this->scenes = get_posts(array(
				'numberposts' => -1,
				'post_type' => BESTBUG_SCROLLMAGIC_POSTTYPE,
			));
			
			BestBug_Helper::begin_wrap_html($this->page_title);
			include 'templates/scenes.view.php';
			BestBug_Helper::end_wrap_html();
		}
		
		public function subform(){
			?>
			<div class="bb-row">
			    <div class="bb-col">
			        <a href="<?php echo admin_url( 'admin.php?page=' . BESTBUG_SCENE_ADD ) ?>" class="button success"><span class="dashicons dashicons-plus-alt"></span><?php esc_html_e('Add Scene', 'bestbug') ?></a>
			    </div>
				<div class="bb-col">
					<div class="bb_remove_all"><a class="button danger delete_checked_ids"><span class="dashicons dashicons-trash"></span><?php esc_html_e('Delete Scene(s)', 'bestbug') ?></a>	
						<input type="hidden" name="ids_checked_remove" id="ids_checked_remove" value="">
					</div>
				</div>
			</div>
			<?php
		} 
        
        public function add_scenes() {
			include 'templates/add_scene.view.php';
		}
        
    }
	
	new BestBug_ScrollMagic_Builder();
}

