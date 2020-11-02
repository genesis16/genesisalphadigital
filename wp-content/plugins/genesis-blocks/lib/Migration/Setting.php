<?php
/**
 * Genesis Blocks setting migration.
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
 * Migrates the setting.
 *
 * @since 1.1.0
 */
class Setting {
	/**
	 * The previous setting name.
	 *
	 * @var string
	 */
	const PREVIOUS_NAME = 'atomic_blocks_mailchimp_api_key';

	/**
	 * The new setting name to migrate to.
	 *
	 * @var string
	 */
	const NEW_NAME = 'genesis_blocks_mailchimp_api_key';

	/**
	 * Migrates the setting.
	 *
	 * @since 1.1.0
	 * @return bool Whether the migration succeeded.
	 */
	public function migrate(): bool {
		$option_value_to_migrate = get_option( self::PREVIOUS_NAME );

		if ( empty( $option_value_to_migrate ) ) {
			return true;
		}

		$new_option_initial_value = get_option( self::NEW_NAME );
		$was_updated              = update_option( self::NEW_NAME, $option_value_to_migrate );

		// update_option will return false if it's already set to that value.
		if ( ! $was_updated && $new_option_initial_value !== $option_value_to_migrate ) {
			return false;
		}

		return delete_option( self::PREVIOUS_NAME );
	}
}
