<?php
/**
 * Genesis Blocks migration admin notice.
 *
 * @package Genesis\Blocks\Migration
 * @since   1.1.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration;

/**
 * Admin represents the migration admin notice.
 *
 * @since 1.1.0
 */
class AdminNotice {

	/**
	 * Adds actions.
	 *
	 * @since 1.1.0
	 */
	public function init() {
		add_action( 'admin_notices', [ $this, 'admin_notice' ] );
	}

	/**
	 * Adds the Migrate admin notice.
	 *
	 * @since 1.1.0
	 */
	public function admin_notice() {
		// If the get_current_screen function doesn't exist, we're not even in wp-admin.
		if ( ! function_exists( 'get_current_screen' ) ) {
			return;
		}

		$current_screen = get_current_screen();

		// Don't show the notice if we are already on the migrate page.
		if ( 'genesis-blocks_page_genesis-blocks-migrate' === $current_screen->base ) {
			return;
		}

		if ( ! get_option( 'genesis_blocks_migrate_from_atomic_blocks' ) ) {
			return;
		}

		$migration_url = admin_url( 'admin.php?page=genesis-blocks-migrate' );
		?>
			<div class="notice notice-info ab-notice-migration">
				<p><?php echo esc_html__( 'Welcome to Genesis Blocks! Would you like to migrate your Atomic Blocks content to Genesis Blocks?', 'genesis-blocks' ); ?></p>
				<p><a href="<?php echo esc_url( $migration_url ); ?>" class="button"><?php echo esc_html__( 'Migrate now', 'genesis-blocks' ); ?></a></p>
			</div>
		<?php
	}
}
