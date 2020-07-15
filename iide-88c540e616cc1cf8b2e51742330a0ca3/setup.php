<?php
/**
 * Instant IDE initial setup file.
 */
 
// Prevent direct access.
if ( ! defined( 'IIDE_DIR' ) ) exit;

instant_ide_setup_file_check();

$console_config_content = htmlentities( file_get_contents( IIDE_DIR . '/console/includes/console-config-template.php' ) );

$old_nl_con_pass = instant_ide_get_line_of_text( $console_config_content, 'no_login_con_pass' );
$new_nl_con_pass = "define( 'IIDE_NL_CON_PASS', '" . uniqid() . "' );";
$console_config_content = instant_ide_replace_line_of_text( $console_config_content, $old_nl_con_pass[0], $new_nl_con_pass );

$old_con_user = instant_ide_get_line_of_text( $console_config_content, 'your_username' );
$new_con_user = "define( 'IIDE_CON_USER', '" . uniqid() . "' );";
$console_config_content = instant_ide_replace_line_of_text( $console_config_content, $old_con_user[0], $new_con_user );

$old_con_pass = instant_ide_get_line_of_text( $console_config_content, 'your_password' );
$new_con_pass = "define( 'IIDE_CON_PASS', '" . hash( 'sha256', uniqid() ) . "' );";
$console_config_content = instant_ide_replace_line_of_text( $console_config_content, $old_con_pass[0], $new_con_pass );

instant_ide_write_file( IIDE_DIR . '/console/includes/console-config.php', html_entity_decode( $console_config_content ) );

require_once( IIDE_DIR . '/console/includes/console-creator.php' );

$users_content = '<?php
$iIDE_USERS = array();
';

instant_ide_write_file( IIDE_DIR . '/data/users.php', $users_content, $stripslashes = false );

$logins_content = '<?php
$iIDE_FAILED_LOGINS = array();
';

instant_ide_write_file( IIDE_DIR . '/data/logins.php', $logins_content, $stripslashes = false );

$lockouts_content = '<?php
$iIDE_LOCKOUTS = array();
';

instant_ide_write_file( IIDE_DIR . '/data/lockouts.php', $lockouts_content, $stripslashes = false );

instant_ide_redirect_to( IIDE_URL );
