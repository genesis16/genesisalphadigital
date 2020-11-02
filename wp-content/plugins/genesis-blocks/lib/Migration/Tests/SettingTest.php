<?php
/**
 * Module Unit tests.
 *
 * @since 1.1.0
 * @package Genesis\Blocks\Migration\Tests
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration\Tests;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Genesis\Blocks\Migration\Setting;

/**
 * Class SettingTest
 *
 * @package Genesis\Blocks\Tests
 */
final class SettingTest extends TestCase {

	use MockeryPHPUnitIntegration;

	/**
	 * The instance to test.
	 *
	 * @since 1.1.0
	 * @var Setting
	 */
	protected $instance;

	/**
	 * Sets up tests.
	 *
	 * @since 1.1.0
	 */
	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->instance = new Setting();
	}

	/**
	 * Tears down tests.
	 *
	 * @since 1.1.0
	 */
	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Tests migrate on success.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Setting::migrate()
	 */
	public function test_migrate_success(): void {
		$option_value = '123456789';

		Functions\expect( 'get_option' )
			->once()
			->andReturn( $option_value );

		Functions\expect( 'get_option' )
			->once();

		Functions\expect( 'update_option' )
			->once()
			->with(
				Setting::NEW_NAME,
				$option_value
			)
			->andReturn( true );

		Functions\expect( 'delete_option' )
			->once()
			->with( Setting::PREVIOUS_NAME )
			->andReturn( true );

		$this->instance->migrate();
	}

	/**
	 * Tests migrate when there is no option.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Setting::migrate()
	 */
	public function test_migrate_no_option_to_migrate(): void {
		$option_value = '';

		Functions\expect( 'get_option' )
			->once()
			->andReturn( $option_value );

		Functions\expect( 'update_option' )
			->never();

		$this->assertTrue( $this->instance->migrate() );
	}

	/**
	 * Tests migrate when it doesn't update the option.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Setting::migrate()
	 */
	public function test_migrate_not_updated(): void {
		$option_value = '123456789';

		Functions\expect( 'get_option' )
			->once()
			->andReturn( $option_value );

		Functions\expect( 'get_option' )
			->once();

		Functions\expect( 'update_option' )
			->once()
			->with(
				Setting::NEW_NAME,
				$option_value
			)
			->andReturn( false );

		Functions\expect( 'delete_option' )
			->never();

		$this->assertFalse( $this->instance->migrate() );
	}

	/**
	 * Tests migrate when it doesn't delete the old option.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Setting::migrate()
	 */
	public function test_migrate_not_deleted(): void {
		$option_value = '123456789';

		Functions\expect( 'get_option' )
			->once()
			->andReturn( $option_value );

		Functions\expect( 'get_option' )
			->once();

		Functions\expect( 'update_option' )
			->once()
			->with(
				Setting::NEW_NAME,
				$option_value
			)
			->andReturn( true );

		Functions\expect( 'delete_option' )
			->once()
			->andReturn( false );

		$this->assertFalse( $this->instance->migrate() );
	}
}
