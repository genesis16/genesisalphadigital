<?php 
if(!defined('ABSPATH')) exit();

$settings_edit = array();
if(isset($_GET['idScene']) && !empty($_GET['idScene'])) {
	$scene_settings = get_post($_GET['idScene']);
	$settings_edit = (array)json_decode(base64_decode($scene_settings->post_content));
	$settings_edit['scene_id'] = $scene_settings->ID;
}

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
		'content' => 'Lorem Ipsum.',
		'font-family' => '',
		'font-weight' => '',
		'font-style' => '',
		'text-align' => '',
		'text-transform'=>'',
		'letter-spacing' => '',
		'line-height' => '',
		'text-decoration' => '',
		'text-color' => '',
		'class-CSS' => '',
	),
	'img' => array(
		'name' => 'image',
		'icon' => 'scrollyicon-photo_size_select_actual',
		'image' => '',
		'URL' => '',
		'target' => '',
		'alt' => '',
		'class-CSS' => '',
	),
	'button' => array(
		'name' => 'button',
		'icon' => 'scrollyicon-radio_button_checked',
		
		'title' => 'Click Here',
		'icon-button' => '',
		'URL' => '',
		'target' => '',
		'class-CSS' => '',
	),
	'sequence' => array(
		'name' => 'sequence',
		'icon' => 'scrollyicon-burst_mode',
		'images' => array(),
		'URL' => '',
		'target' => '',
		'alt' => '',
		'class-CSS' => '',
	),
	'video' => array(
		'name' => 'video',
		'icon' => 'scrollyicon-video_collection',
		'video' => '',
		'poster' => '',
		'attributes' => '',
		'class-CSS' => '',
	),
	'audio' => array(
		'name' => 'audio',
		'icon' => 'scrollyicon-audiotrack',
		'audio' => '',
		'attributes' => '',
		'class-CSS' => '',
	),
	'svg' => array(
		'name' => 'svg',
		'icon' => 'scrollyicon-extension',
		'svg' => '',
		'title' => '',
		'class-CSS' => '',
	),
	'shape' => array(
		'name' => 'shape',
		'icon' => 'scrollyicon-crop_din',
		'class-CSS' => '',
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
		'drawSVG' => 'on',
		'imageSequence' => 'on',
		'imageSequenceRepeat' => '',
		'selector' => '',
		'container' => '',
		'disableMobile' => 'off',
		'disableDesktop' => 'off',
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
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<?php echo ("
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/admin/css/admin.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/animate/animate.min.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/colorPicker/color_picker.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/jquery/jquery-ui.min.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/font-awesome/css/font-awesome.min.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/font-scrollmagic/style.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."assets/libs/perfecr-scroll/perfect-scrollbar.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore/assets/libs/codemirror/lib/codemirror.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/jquery.dataTables.min.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/jquery.tagsinput.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/select2.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/extend/vc-params/number.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/extend/vc-params/toggle.css"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/style.css?ver=1.3.1"."'>
			<link rel='stylesheet' href='". BESTBUG_SM_URL."bestbugcore//assets/admin/css/jquery.growl.css"."'>
		"); ?>
		<script type="text/javascript">
			var BB_TRANSLATION = <?php echo json_encode($translation); ?>;

			var BB_SCENE_SETTINGS =<?php echo json_encode($settings); ?>;

			var BB_SCENE_EDIT_SETTINGS = <?php echo json_encode($settings_edit); ?>;
			var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
			var adminUrl = "<?php echo admin_url('admin.php?page=bbsm-all-scenes'); ?>";
		</script>
	</head>
    <body  class="wpbb-scrollmagic-iframe-pages debug-<?php echo esc_attr($indicators) ?>" <?php body_class();  ?>>
       	<?php include 'add_scene.view.php';?>

        <footer>
        	
            <?php echo("
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/jquery/jquery.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/jquery/jquery-ui.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/jquery/widget.min.js'></script>
				<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/jquery/jquery.growl.js'></script>
				<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/perfecr-scroll/perfect-scrollbar.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/colorPicker/color-picker.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_CORE_URL."assets/admin/js/sweetalert.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/admin/js/admin.js'></script>
				<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/TweenMax/gsap.min.js'></script>
				<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/TweenMax/MotionPathPlugin.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/scrollmagic/ScrollMagic.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/scrollmagic/plugins/animation.gsap.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/scrollmagic/plugins/debug.addIndicators.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/reactjs/react.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/reactjs/react-dom.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."assets/libs/reactjs/browser.min.js'></script>
				<script type='text/babel' src='".BESTBUG_SM_URL."assets/admin/js/bb-scene-editor.jsx'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/sweetalert.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/libs/codemirror/lib/codemirror.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/libs/codemirror/mode/javascript/javascript.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/libs/codemirror/addon/selection/active-line.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/libs/codemirror/addon/edit/matchbrackets.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/jquery.dataTables.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/jquery.tagsinput.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/select2.min.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/jquery.growl.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/extend/vc-params/toggle.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/jquery.multi-select.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/jquery.quicksearch.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/admin/js/script.js'></script>
    			<script type='text/javascript' src='".BESTBUG_SM_URL."bestbugcore/assets/js/script.js'></script>

    			"); 
            ?>
        </footer>
	</body>
</html>			
