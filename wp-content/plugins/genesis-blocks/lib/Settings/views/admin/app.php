<?php
/**
 * App view for the settings page.
 *
 * The React application from js/src/app.js mounts at #root.
 *
 * @package Genesis\Blocks\Settings
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

?>

<div class="wrap genesis-blocks-settings-page">
	<div class="intro-wrap">
		<div class="intro">
			<img src="<?php echo esc_url( $this->context['url'] . 'lib/Settings/assets/images/genesis-planet-icon.svg' ); ?>" alt="<?php esc_html_e( 'Genesis Blocks', 'genesis-blocks' ); ?>" />
			<h1><?php echo esc_html( $this->page_title ); ?></h1>
		</div>
	</div>
	<div id="root"></div>
</div>
