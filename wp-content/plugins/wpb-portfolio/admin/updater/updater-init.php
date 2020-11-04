<?php

/**
 * WppBean Auto updater init
 */

if ( ! defined( 'ABSPATH' ) ) exit;

final class WPB_FP_Plugin_Updater_Init {

	private static $instance;
	public $prefix 				= 'wpb_fp_';
	public $textdomain 			= WPB_FP_TEXTDOMAIN;
	public $license_page_slug 	= 'wpb-filterable-portfolio-license';
	public $store_url 			= 'https://wpbean.com';
	public $version 			= WPB_FP_VERSION;
	public $item_name 			= 'Responsive Filterable Portfolio WordPress Plugin';

	public static function get_instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WPB_FP_Plugin_Updater_Init ) ) {
			self::$instance = new WPB_FP_Plugin_Updater_Init;
			self::$instance->hooks();
		}

		return self::$instance;
	}

	public function hooks() {
		add_action( 'admin_menu', array( $this, 'wpb_license_menu') );
		add_action( 'admin_init', array( $this, 'wpb_register_option') );
		add_action( 'admin_init', array( $this, 'wpb_activate_license') );
		add_action( 'admin_init', array( $this, 'wpb_deactivate_license') );
		add_action( 'admin_notices', array( $this, 'wpb_admin_notices') );
	}

	public function __construct() {
		self::$instance = $this;
	}


	/**
	 * Add to Admin menu
	 */

	function wpb_license_menu() {
		add_submenu_page( 
	        'edit.php?post_type=wpb_fp_portfolio', 
	        esc_html__( 'License', $this->textdomain ),
	        esc_html__( 'License', $this->textdomain ),
	        'manage_options',
	        $this->license_page_slug,
	        array( $this, 'wpb_license_page' )
	    );
	}
	

	function wpb_license_page() {
		$license = get_option( $this->prefix.'license_key' );
		$status  = get_option( $this->prefix.'license_status' );
		?>
		<div class="wrap">
			<h2><?php esc_html_e( $this->item_name . ' license activation', $this->textdomain ); ?></h2>
			<form method="post" action="options.php">

				<?php settings_fields( $this->prefix.'license'); ?>

				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php esc_html_e( 'License Key', $this->textdomain ); ?>
							</th>
							<td>
								<input id="<?php echo $this->prefix; ?>license_key" name="<?php echo $this->prefix; ?>license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
								<p class="description"><?php esc_html_e('Enter your license key here. Required for getting automatic updates.', $this->textdomain); ?></p>
							</td>
						</tr>
						<?php if( false !== $license ) { ?>
							<tr valign="top">
								<th scope="row" valign="top">
									<?php esc_html_e( 'Activate License', $this->textdomain ); ?>
								</th>
								<td>
									<?php if( $status !== false && $status == 'valid' ) { ?>
										<span style="color:green;"><span class="dashicons dashicons-yes"></span><?php esc_html_e(' Active', $this->textdomain); ?></span>
										<?php wp_nonce_field( $this->prefix.'nonce', $this->prefix.'nonce' ); ?>
										<input type="submit" class="button-secondary" name="<?php echo $this->prefix; ?>license_deactivate" value="<?php esc_html_e('Deactivate License', $this->textdomain); ?>"/>
									<?php } else {
										wp_nonce_field( $this->prefix.'nonce', $this->prefix.'nonce' ); ?>
										<input type="submit" class="button-secondary" name="<?php echo $this->prefix; ?>license_activate" value="<?php esc_html_e('Activate License', $this->textdomain); ?>"/>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php submit_button(); ?>

			</form>
		<?php
	}

	function wpb_register_option() {
		register_setting( $this->prefix.'license', $this->prefix.'license_key', 'wpb_sanitize_license' );
	}
	

	function wpb_sanitize_license( $new ) {
		$old = get_option( $this->prefix.'license_key' );
		if( $old && $old != $new ) {
			delete_option( $this->prefix.'license_status' );
		}
		return $new;
	}



	/************************************
	* this illustrates how to activate
	* a license key
	*************************************/

	function wpb_activate_license() {

		// listen for our activate button to be clicked
		if( isset( $_POST[$this->prefix.'license_activate'] ) ) {

			// run a quick security check
		 	if( ! check_admin_referer( $this->prefix.'nonce', $this->prefix.'nonce' ) )
				return; // get out if we didn't click the Activate button

			// retrieve the license from the database
			$license = trim( get_option( $this->prefix.'license_key' ) );


			// data to send in our API request
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => $license,
				'item_name'  => urlencode( $this->item_name ),
				'url'        => home_url()
			);

			// Call the custom API.
			$response = wp_remote_post( $this->store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

				if ( is_wp_error( $response ) ) {
					$message = $response->get_error_message();
				} else {
					$message = esc_html__( 'An error occurred, please try again.', $this->textdomain );
				}

			} else {

				$license_data = json_decode( wp_remote_retrieve_body( $response ) );

				if ( false === $license_data->success ) {

					switch( $license_data->error ) {

						case 'expired' :

							$message = sprintf(
								esc_html__( 'Your license key expired on %s.', $this->textdomain ),
								date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
							);
							break;

						case 'revoked' :

							$message = esc_html__( 'Your license key has been disabled.', $this->textdomain );
							break;

						case 'missing' :

							$message = esc_html__( 'Invalid license.', $this->textdomain );
							break;

						case 'invalid' :
						case 'site_inactive' :

							$message = esc_html__( 'Your license is not active for this URL.', $this->textdomain );
							break;

						case 'item_name_mismatch' :

							$message = sprintf( esc_html__( 'This appears to be an invalid license key for %s.', $this->textdomain ), $this->item_name );
							break;

						case 'no_activations_left':

							$message = esc_html__( 'Your license key has reached its activation limit.', $this->textdomain );
							break;

						default :

							$message = esc_html__( 'An error occurred, please try again.', $this->textdomain );
							break;
					}

				}

			}

			// Check if anything passed on a message constituting a failure
			if ( ! empty( $message ) ) {
				$base_url = admin_url( 'admin.php?page=' . $this->license_page_slug );
				$redirect = add_query_arg( array( $this->prefix.'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

				wp_redirect( $redirect );
				exit();
			}

			// $license_data->license will be either "valid" or "invalid"

			update_option( $this->prefix.'license_status', $license_data->license );
			wp_redirect( admin_url( 'admin.php?page=' . $this->license_page_slug ) );
			exit();
		}
	}


	/***********************************************
	* Illustrates how to deactivate a license key.
	* This will decrease the site count
	***********************************************/

	function wpb_deactivate_license() {

		// listen for our activate button to be clicked
		if( isset( $_POST[$this->prefix.'license_deactivate'] ) ) {

			// run a quick security check
		 	if( ! check_admin_referer( $this->prefix.'nonce', $this->prefix.'nonce' ) )
				return; // get out if we didn't click the Activate button

			// retrieve the license from the database
			$license = trim( get_option( $this->prefix.'license_key' ) );


			// data to send in our API request
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $license,
				'item_name'  => urlencode( $this->item_name ),
				'url'        => home_url()
			);

			// Call the custom API.
			$response = wp_remote_post( $this->store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

				if ( is_wp_error( $response ) ) {
					$message = $response->get_error_message();
				} else {
					$message = esc_html__( 'An error occurred, please try again.', $this->textdomain );
				}

				$base_url = admin_url( 'admin.php?page=' . $this->license_page_slug );
				$redirect = add_query_arg( array( $this->prefix.'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

				wp_redirect( $redirect );
				exit();
			}

			// decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			if( $license_data->license == 'deactivated' ) {
				delete_option( $this->prefix.'license_status' );
			}

			wp_redirect( admin_url( 'admin.php?page=' . $this->license_page_slug ) );
			exit();

		}
	}


	/************************************
	* this illustrates how to check if
	* a license key is still valid
	* the updater does this for you,
	* so this is only needed if you
	* want to do something custom
	*************************************/

	function wpb_check_license() {

		global $wp_version;

		$license = trim( get_option( $this->prefix.'license_key' ) );

		$api_params = array(
			'edd_action' => 'check_license',
			'license' => $license,
			'item_name' => urlencode( $this->item_name ),
			'url'       => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( $this->store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		if( $license_data->license == 'valid' ) {
			echo 'valid'; exit;
			// this license is still valid
		} else {
			echo 'invalid'; exit;
			// this license is no longer valid
		}
	}

	/**
	 * This is a means of catching errors from the activation method above and displaying it to the customer
	 */
	function wpb_admin_notices() {
		if ( isset( $_GET[$this->prefix.'sl_activation'] ) && ! empty( $_GET['message'] ) ) {

			switch( $_GET[$this->prefix.'sl_activation'] ) {

				case 'false':
					$message = urldecode( $_GET['message'] );
					?>
					<div class="error">
						<p><?php echo $message; ?></p>
					</div>
					<?php
					break;

				case 'true':
				default:
					// Developers can put a custom success message here for when activation is successful if they way.
					break;

			}
		}
	}
}


/**
 * init the updater class
 */

function wpb_fp_updater_init() {
	return WPB_FP_Plugin_Updater_Init::get_instance();
}
add_action( 'init', 'wpb_fp_updater_init' );