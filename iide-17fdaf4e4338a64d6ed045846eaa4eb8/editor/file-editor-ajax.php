<?php
/**
 * Builds the File Editor Ajax functionality.
 *
 * @package Instant IDE
 */
 
// Include files.
require_once( dirname( __DIR__ ) . '/dev-path.php' );
require_once( dirname( __DIR__ ) . '/iide-constants.php' );
require_once( IIDE_DIR . '/session.php' );
require_once( IIDE_DIR . '/includes/helpers.php' );
require_once( IIDE_DIR . '/editor/file-editor-functions.php' );
require_once( IIDE_DIR . '/includes/lessphp/lessc.inc.php' );
require_once( IIDE_DIR . '/includes/scssphp/scss.inc.php' );

use Leafo\ScssPhp\Compiler;

if ( isset( $_SERVER['HTTP_IIDE_AJAX_TOKEN'] ) ) {

	if ( $_SERVER['HTTP_IIDE_AJAX_TOKEN'] !== $_SESSION['iide_ajax_token'] )
		exit( json_encode( ['error' => 'Wrong CSRF token.'] ) );
	
	if ( isset( $_POST['action'] ) ) {
	    
    	if ( $_POST['action'] == 'instant_ide_file_tree_right_click_menu_action' )
    		instant_ide_file_tree_right_click_menu_action();
    	elseif ( $_POST['action'] == 'instant_ide_active_editor_write' )
    		instant_ide_active_editor_write();
    	elseif ( $_POST['action'] == 'instant_ide_one_click_install' )
    		instant_ide_one_click_install();
    	elseif ( $_POST['action'] == 'instant_ide_dev_path_write' )
    		instant_ide_dev_path_write();
    	elseif ( $_POST['action'] == 'instant_ide_paths_li_write' )
    		instant_ide_paths_li_write();
    	elseif ( $_POST['action'] == 'instant_ide_save_state_write' )
    		instant_ide_save_state_write();
    	elseif ( $_POST['action'] == 'instant_ide_save_state_get' )
    		instant_ide_save_state_get();
    	elseif ( $_POST['action'] == 'instant_ide_dir_status_write' )
    		instant_ide_dir_status_write();
    	elseif ( $_POST['action'] == 'instant_ide_file_tree_file_open' )
    		instant_ide_file_tree_file_open();
    	elseif ( $_POST['action'] == 'instant_ide_file_tree_folder_open' )
    		instant_ide_file_tree_folder_open();
    	elseif ( $_POST['action'] == 'instant_ide_file_tree_upload_action' )
    		instant_ide_file_tree_upload_action();
    	elseif ( $_POST['action'] == 'instant_ide_file_tree_find_action' )
    		instant_ide_file_tree_find_action();
    	elseif ( $_POST['action'] == 'instant_ide_file_tree_get_file_properties' )
    		instant_ide_file_tree_get_file_properties();
	    
	}
	
	if ( isset( $_POST['save_action'] ) && $_POST['save_action'] == 'file-editor-save' ) {
    		
		instant_ide_write_file( $path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['file_rel_path'], $code = $_POST['iide']['file'], $stripslashes = false );
		
		if ( false !== instant_ide_build_file_check( 'cobalt-less.json', $_POST['file_full_path'] ) )
			instant_ide_less_php_init();
		else if ( false !== instant_ide_build_file_check( 'cobalt-scss.json', $_POST['file_full_path'] ) )
			instant_ide_scss_php_init();
		
		instant_ide_file_editor_save();
	    
	}

} else {

	exit( json_encode( ['error' => 'No CSRF token.'] ) );

}

/**
 * Use ajax to manage file tree right-click events.
 *
 * @since 1.0.0
 */
function instant_ide_file_tree_right_click_menu_action() {
	
	if ( $_POST['context_menu_key'] == 'open_file' ) {
	    
		instant_ide_cleanup_dir( IIDE_DIR . '/tmp/' );
		
		$dir = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		$zip_file = $dir . $_POST['zip_file_name'];
		$zip_ext = substr( $_POST['zip_file_name'], strrpos( $_POST['zip_file_name'], '.' ) + 1 );
		$res = FALSE;
	    
	    if ( $zip_ext == 'gz' ) {
	        
	        instant_ide_gunzip_file( $zip_file );
	        
    	} else {
		    
    		$zip = new ZipArchive();
    		$res = $zip->open( $zip_file );
    		
	    }
		
		if ( FALSE !== $res || $zip_ext == 'gz' ) {
			
			if ( $zip_ext == 'zip' ) {
			    
    			$zip->extractTo( IIDE_DIR . '/tmp/' );
    			$zip->close();
			    
			}
			
			$scanned_dir = array_diff( scandir( IIDE_DIR . '/tmp/' ), array( '..', '.' ) );
			
			$unzipped_string = '';
			$first_pass = true;
				
			foreach( $scanned_dir as $file_dir ) {
				
				$new_file_name = $file_dir;
				$count = 1;
			
				if ( is_dir( IIDE_DIR . '/tmp/' . $new_file_name ) ) {
					
					$type = 'folder';
					
					while( file_exists( $dir . $new_file_name ) ) {
						
						$new_file_name = $new_file_name . '-' . $count;
						$count++;
						
					}
					
				} else {
					
					$type = 'file';
					$ext = strpos( $file_dir, '.' ) !== false ? '.' . substr( $file_dir, strrpos( $file_dir, '.' ) + 1 ) : '';
					$file_partial = rtrim( $new_file_name, $ext );
					
					while( file_exists( $dir . $new_file_name ) ) {
						
						$new_file_name = $file_partial . '-' . $count . $ext;
						$count++;
						
					}
					
				}
				
				if ( true == $first_pass ) {
					
					$unzipped_string .= $type . '|' . $new_file_name;
					$first_pass = false;
					
				} else {
					
					$unzipped_string .= ',' . $type . '|' . $new_file_name;
					
				}
					
				rename( IIDE_DIR . '/tmp/' . $file_dir, $dir . $new_file_name );
				
			}
			
			echo $unzipped_string;
				
			instant_ide_cleanup_dir( IIDE_DIR . '/tmp/' );
			
		} else {
			
			echo 'Unzip Error!';
			
		}
		
	} else if ( $_POST['context_menu_key'] == 'download_file' || $_POST['context_menu_key'] == 'download_folder' ) {
		
		instant_ide_cleanup_dir( IIDE_DIR . '/tmp/' );
		
		$dir = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		
		if ( substr( $_POST['file_name'], -4 ) != '.zip' ) {
		
			$zip_file = IIDE_DIR . '/tmp/' . $_POST['file_name'] . '.zip';
			
			// Get real path for our folder
			$rootPath = realpath( $dir );
			
			// Initialize archive object
			$zip = new ZipArchive();
			
			if ( $_POST['context_menu_key'] == 'download_folder' ) {
				
				$zip->open( $zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE );
				
				// Create recursive directory iterator
				/** @var SplFileInfo[] $files */
				$files = new RecursiveIteratorIterator(
				    new RecursiveDirectoryIterator( $rootPath ),
				    RecursiveIteratorIterator::LEAVES_ONLY
				);
				
				foreach( $files as $name => $file ) {
					
				    // Skip directories (they would be added automatically)
				    if ( ! $file->isDir() ) {
				    	
				        // Get real and relative path for current file
				        $filePath = $file->getRealPath();
				        $relativePath = substr( $filePath, strlen( $rootPath ) + 1 );
				
				        // Add current file to archive
				        $zip->addFile( $filePath, $_POST['file_name'] . '/' . $relativePath );
				        
				    }
				}
				
			} else {
				
				$zip->open( $zip_file, ZipArchive::CREATE );
				$zip->addFile( $dir, $_POST['file_name'] );
				
			}
			
			// Zip archive will be created only after closing object
			$zip->close();
		
		} else {
			
			instant_ide_copy_dir( $dir, IIDE_DIR . '/tmp/' . $_POST['file_name'] );
			
		}
		
		echo 'File Download Is Ready!';
		
	} elseif ( $_POST['context_menu_key'] == 'rename_file' ) {
		
		$file_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		$actual_rel_path = substr( $file_path, 0, strrpos( $file_path, '/' ) );
		$file_to_rename = $_POST['old_name'];
		$old_file_ext = substr( $file_to_rename, strrpos( $file_to_rename, '.' ) + 1 );
		$new_file_ext = substr( $_POST['new_name'], strrpos( $_POST['new_name'], '.' ) + 1 );
		
		if ( $_POST['file_open'] == 'true' ) {
			
			echo 'Rename Error: Cannot Rename Open Files|' . $file_to_rename;
		
		} else {
		
			if ( ! file_exists( $actual_rel_path . '/' . $_POST['new_name'] ) ) {
				
				rename( $file_path, $actual_rel_path . '/' . $_POST['new_name'] );
				echo 'File Renamed';
				
			} else {
				
				echo 'Rename Error: File Exists|' . $file_to_rename;

			}
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'rename_image' ) {
		
		$file_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		$actual_rel_path = substr( $file_path, 0, strrpos( $file_path, '/' ) );
		$file_to_rename = $_POST['old_name'];
		$old_file_ext = substr( $file_to_rename, strrpos( $file_to_rename, '.' ) + 1 );
		$new_file_ext = substr( $_POST['new_name'], strrpos( $_POST['new_name'], '.' ) + 1 );
		
		if ( $_POST['file_open'] == 'true' ) {
			
			echo 'Rename Error: Cannot Rename Open Files|' . $file_to_rename;
		
		} elseif ( $old_file_ext == $new_file_ext ) {
		
			if ( ! file_exists( $actual_rel_path . '/' . $_POST['new_name'] ) ) {
				
				rename( $file_path, $actual_rel_path . '/' . $_POST['new_name'] );
				echo 'File Renamed';
				
			} else {
				
				echo 'Rename Error: File Exists|' . $file_to_rename;

			}
			
		} else {
			
			echo 'Rename Error: Cannot Change Image Extensions|' . $file_to_rename;
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'delete_file' ) {
		
		if ( is_array( $_POST['rel_path'] ) ) {
			
			$files_exist = true;
			foreach( $_POST['rel_path'] as $rel_path ) {
				
				if ( ! file_exists( PLATFORM_DIR_DEV_PATH . '/' . $rel_path ) )
					$files_exist = false;
				
			}
			
			if ( $files_exist ) {
				
				foreach( $_POST['rel_path'] as $rel_path )
					unlink( PLATFORM_DIR_DEV_PATH . '/' . $rel_path );
					
				echo 'Files Deleted';
				
			} else {
			
				echo 'Delete Error: One Or More Files Do Not Exist';
			
			}
			
		} else {
			
			$file_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
			
			if ( file_exists( $file_path ) ) {
				
				unlink( $file_path );
				
				echo 'File Deleted';
				
			} else {
				
				echo 'Delete Error: File Does Not Exist';
				
			}
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'paste_file' || $_POST['context_menu_key'] == 'paste_folder' ) {
		
		$copy_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['copy_path'];
		$paste_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['paste_path'];
		$paste_action = $_POST['paste_action'];
		$paste_source = $_POST['paste_source'];
		$paste_name = $_POST['paste_name'];
		$new_file_name = $paste_name;
		$count = 1;
		
		if ( $_POST['context_menu_key'] == 'paste_folder' )
			$actual_rel_path = str_replace( '//', '/', $paste_path . '/' );
		else
			$actual_rel_path = $paste_path . '/';

		if ( $paste_source == 'file' ) {
			
			if ( $paste_action == 'copy' || $copy_path != ( $actual_rel_path . $new_file_name ) ) {
				
				$paste_ext = $_POST['paste_ext'];
				$file_partial = rtrim( $paste_name, '.' . $paste_ext );
				
				while( file_exists( $actual_rel_path . $new_file_name ) ) {
					
					$new_file_name = $file_partial . '-' . $count . '.' . $paste_ext;
					$count++;
					
				}
				
			}
			
			if ( copy( $copy_path, $actual_rel_path . $new_file_name ) )
				echo 'File Pasted|' . $new_file_name;
				
			if ( $paste_action == 'cut' && $copy_path != ( $actual_rel_path . $new_file_name ) )
				unlink( $copy_path );
			
		} elseif ( $paste_source == 'folder' ) {
			
			if ( $paste_action == 'copy' || $copy_path != ( $actual_rel_path . $new_file_name ) ) {
				
				while( true == instant_ide_dir_check( $actual_rel_path . $new_file_name, $check_only = true ) ) {
					
					$new_file_name = $paste_name . '-' . $count;
					$count++;
					
				}
				
			}
			
			instant_ide_copy_dir( $copy_path, $actual_rel_path . $new_file_name );
			
			if ( $paste_action == 'cut' && $copy_path == ( $actual_rel_path . $new_file_name ) )
				echo 'Paste Error|' . $new_file_name;
			else
				echo 'Folder Pasted|' . $new_file_name;
			
			if ( $paste_action == 'cut' && $copy_path != ( $actual_rel_path . $new_file_name ) )
				instant_ide_delete_dir( $copy_path );
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'duplicate_file' ) {
		
		$file_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		$file_name = $_POST['name'];
		$actual_rel_path = rtrim( $file_path, $file_name );
		$file_ext = $_POST['ext'];
		$file_partial = basename( $file_name, '.' . $file_ext );
		$new_file_name = $file_partial . '-1.' . $file_ext;
		$count = 1;
		
		while( file_exists( $actual_rel_path . $new_file_name ) ) {
			
			$new_file_name = $file_partial . '-' . $count . '.' . $file_ext;
			$count++;
			
		}
		
		if ( copy( $file_path, $actual_rel_path . $new_file_name ) )
			echo 'File Duplicate Created|' . $new_file_name;
		
	} elseif ( $_POST['context_menu_key'] == 'create_file' || $_POST['context_menu_key'] == 'folder_create_file' ) {
		
		$new_file_name = $_POST['file_name'];
			
		if ( $_POST['context_menu_key'] == 'create_file' )
			$new_file_path_extended = '';
		else
			$new_file_path_extended = $_POST['name'] . '/';
		
		$new_file_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'] . $new_file_path_extended .  $new_file_name;
		
		if ( file_exists( $new_file_path ) ) {
			
			echo 'Error: File Exists|' . $new_file_name;
			
		} else {
			
			instant_ide_write_file( $new_file_path, '' );
			echo 'File Created|' . $new_file_name;
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'rename_folder' ) {
		
		$folder_to_rename = $_POST['old_name'];
		
		if ( $_POST['new_name'] != '' ) {
			
			$folder_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
			$actual_rel_path = substr( $folder_path, 0, strrpos( $folder_path, '/' ) );

			if ( false == instant_ide_dir_check( $actual_rel_path . '/' . $_POST['new_name'], $check_only = true ) ) {
				
				rename( $folder_path, $actual_rel_path . '/' . $_POST['new_name'] );
				echo 'Folder Renamed';
				
			} else {
				
				echo 'Rename Error: Folder Exists|' . $folder_to_rename;

			}
			
		} else {
			
			echo 'Rename Error: Unsupported Folder Name|' . $folder_to_rename;
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'delete_folder' ) {
		
		$folder_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		
		if ( file_exists( $folder_path ) ) {
			
			instant_ide_delete_dir( $folder_path );
			
			echo 'Folder Deleted';
			
		} else {
			
			echo 'Delete Error: Folder Does Not Exist';
			
		}
		
	} elseif ( $_POST['context_menu_key'] == 'duplicate_folder' ) {
		
		$folder_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
		$folder_name = $_POST['name'];
		$actual_rel_path = rtrim( $folder_path, $folder_name );
		$new_folder_name = $folder_name . '-1';
		$count = 1;
		
		while( true == instant_ide_dir_check( $actual_rel_path . $new_folder_name, $check_only = true ) ) {
			
			$new_folder_name = $folder_name . '-' . $count;
			$count++;
			
		}
		
		instant_ide_copy_dir( $folder_path, $actual_rel_path . $new_folder_name );
		echo 'Folder Duplicate Created|' . $new_folder_name;
		
	} elseif ( $_POST['context_menu_key'] == 'create_folder' || $_POST['context_menu_key'] == 'folder_create_folder' ) {

		$new_folder_name = $_POST['folder_name'];
		
		if ( $_POST['context_menu_key'] == 'create_folder' )
			$new_folder_path_extended = '';
		else
			$new_folder_path_extended = $_POST['name'] . '/';
		
		$new_folder_path = PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'] . $new_folder_path_extended .  $new_folder_name;
		
		if ( file_exists( $new_folder_path ) ) {
			
			echo 'Error: Folder Exists|' . $new_folder_name;
			
		} else {
			
			instant_ide_dir_check( $new_folder_path );
			echo 'Folder Created|' . $new_folder_name;
			
		}
		
	}
	
	if ( false !== instant_ide_build_file_check( 'cobalt-less.json', $_POST['ftrc_file_full_path'] ) ) {
		
	    $less_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-less.json', $_POST['ftrc_file_full_path'] ) ), true );
		instant_ide_scss_less_images_sync( $less_presets, $_POST['ftrc_file_full_path'], 'less' );
		
	} elseif ( false !== instant_ide_build_file_check( 'cobalt-scss.json', $_POST['ftrc_file_full_path'] ) ) {
		
	    $scss_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-scss.json', $_POST['ftrc_file_full_path'] ) ), true );
		instant_ide_scss_less_images_sync( $scss_presets, $_POST['ftrc_file_full_path'], 'scss' );
		
	}
	
	exit();
	
}

/**
 * Use ajax to write the updated active file edtor constant.
 *
 * @since 1.0.0
 */
function instant_ide_active_editor_write() {

	$code = "<?php
// Define the current active file editor.
define( 'IIDE_ACTIVE_EDITOR', '" . $_POST['active_editor'] . "' );
";
	
	instant_ide_write_file( IIDE_DIR . '/active-editor.php', $code );
	
	echo 'Active Editor Constant Has Been Updated!';
	exit();
	
}

/**
 * Use ajax to perform a one-click install to the specified directory.
 *
 * @since 1.0.4
 */
function instant_ide_one_click_install() {

	instant_ide_cleanup_dir( IIDE_DIR . '/tmp/' );
	
	$app = $_POST['context_menu_key'];
	
	if ( $app == 'install_wordpress' ) {
		
		$app_name = 'wordpress';
		$app_nicename = 'WordPress';
		file_put_contents( IIDE_DIR . '/tmp/wordpress.zip', fopen( 'https://wordpress.org/latest.zip', 'rb' ) );
		
	} elseif ( $app == 'install_october' ) {
		
		$app_name = 'october';
		$app_nicename = 'October';
		file_put_contents( IIDE_DIR . '/tmp/october.zip', fopen( 'https://octobercms.com/download', 'rb' ) );
		
	} elseif ( $app == 'install_grav' ) {
		
		$app_name = 'grav';
		$app_nicename = 'Grav';
		file_put_contents( IIDE_DIR . '/tmp/grav.zip', fopen( 'https://getgrav.org/download/core/grav/latest', 'rb' ) );
		
	} elseif ( $app == 'install_grav_admin' ) {
		
		$app_name = 'grav_admin';
		$app_nicename = 'Grav Admin';
		file_put_contents( IIDE_DIR . '/tmp/grav_admin.zip', fopen( 'https://getgrav.org/download/core/grav-admin/latest', 'rb' ) );
		
	}
	
	if ( file_exists( IIDE_DIR . '/tmp/' . $app_name . '.zip' ) ) {
		
		// Initialize archive object
		$zip = new ZipArchive();
		
		$res = $zip->open( IIDE_DIR . '/tmp/' . $app_name . '.zip' );
		
		if ( $res === TRUE ) {
			
			$zip->extractTo( IIDE_DIR . '/tmp/' );
			$zip->close();
			
			if ( glob( IIDE_DIR . '/tmp/' . $app_name . '*' ) ) {
				
				$files = scandir( IIDE_DIR . '/tmp' );
				$app_file = '';
				foreach( $files as $file ) {
					
					if ( strpos( $file, '.zip' ) !== false )
						unlink( IIDE_DIR . '/tmp/' . $file );
					elseif ( strpos( $file, $app_name ) !== false )
						$app_file = $file;
					
				}
				
				// Get array of directories in /tmp/ dir
				$app_dir_name_array = glob( IIDE_DIR . '/tmp/*' , GLOB_ONLYDIR );
				// Get the first string of the $app_dir_name_array to obtain the actual app dir name
				$app_dir_name = basename( $app_dir_name_array[0] );
				
				if ( $app_name != 'wordpress' && $app_name != 'grav' )
					instant_ide_copy_dir( IIDE_DIR . '/tmp/' . $app_dir_name . '/' . $app_file, PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'] );
				else
					instant_ide_copy_dir( IIDE_DIR . '/tmp/' . $app_file, PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'] );
				
				echo $app_nicename . ' Install Successful!';
				
			} else {
				
				echo 'Install Error: ' . $app_nicename . ' ZIP File Could Not Be Unzipped';
				
			}
			
		} else {
			
			echo 'Install Error: ' . $app_nicename . ' ZIP File Could Not Be Unzipped';
			
		}
	
	} else {
		
		echo 'Install Error: ' . $app_nicename . ' Could Not Be Installed';
		
	}
	
	instant_ide_cleanup_dir( IIDE_DIR . '/tmp/' );
	
	exit();
	
}

/**
 * Use ajax to write the updated dev path to the appropriate file.
 *
 * @since 1.0.0
 */
function instant_ide_dev_path_write() {

	$code = "<?php
// Define the relative path for development.
define( 'IIDE_DEV_PATH', '" . $_POST['dev_path'] . "' );
";
	
	instant_ide_write_file( IIDE_DIR . '/dev-path.php', $code );
	
	echo 'Dev Path Has Been Updated!';
	exit();
	
}

/**
 * Use ajax to write the updated paths li to the appropriate file.
 *
 * @since 1.5.0
 */
function instant_ide_paths_li_write() {
    
    $code = "<?php
// Define the Paths list-item code.
define( 'IIDE_PATHS_LI', '" . preg_replace( "/\s+/", " ", preg_replace( "/[\r\n]*/", "", $_POST['paths_li'] ) ) . "' );
";

	instant_ide_write_file( IIDE_DIR . '/paths-li.php', $code );
	
	echo 'Paths Li Has Been Updated!';
	exit();
	
}

/**
 * Use ajax to write the updated save state values to the appropriate file.
 *
 * @since 1.5.0
 */
function instant_ide_save_state_write() {

	$save_state_content = $_POST['save_state_content'];
	
	instant_ide_write_file( IIDE_DIR . '/save-state.json', $save_state_content );
	
	echo 'Save State Has Been Updated!';
	exit();
	
}

/**
 * Use ajax to get the save-state.json file content and pass it on to JS.
 *
 * @since 1.5.0
 */
function instant_ide_save_state_get() {

	instant_ide_cleanup_html_dir( IIDE_DIR . '/tmp/' );
	$save_state_content = file_get_contents( IIDE_DIR . '/save-state.json' );

	echo $save_state_content;
	exit();
	
}

/**
 * Use ajax to write the updated dir status information to the appropriate file.
 *
 * @since 1.5.0
 */
function instant_ide_dir_status_write() {

	$dir_status = $_POST['dir_status'];

	if ( $_POST['status_type'] == 'open' ) {

		$code = "<?php
// Define the current open directories.
define( 'IIDE_OPEN_DIRS', '" . $dir_status . "' );
";
		
		instant_ide_write_file( IIDE_DIR . '/open-dirs.php', $code );

	} elseif ( $_POST['status_type'] == 'opened' ) {

		$code = "<?php
// Define the current opened directories.
define( 'IIDE_OPENED_DIRS', '" . $dir_status . "' );
";
		
		instant_ide_write_file( IIDE_DIR . '/opened-dirs.php', $code );

	}
	
	echo $dir_status == '' ? 'EMPTY' : $dir_status;
	exit();
	
}

/**
 * Use ajax to update a specific theme file based on the posted values.
 *
 * @since 1.0.0
 */
function instant_ide_file_tree_file_open() {

	$handle_pre = file_get_contents( PLATFORM_DIR_DEV_PATH . '/' . $_POST['file_rel_path'] );
	$handle = $handle_pre === '' ? 'iide_empty_file' : $handle_pre;
	
	echo $handle;
	exit();
	
}

/**
 * Use ajax to open a specific folder based on the posted values.
 *
 * @since 1.0.0
 */
function instant_ide_file_tree_folder_open() {

	echo instant_ide_file_tree( PLATFORM_DIR_DEV_PATH . '/' . $_POST['folder_rel_path'] ) == '' ? 'Folder Empty' : instant_ide_file_tree( PLATFORM_DIR_DEV_PATH . '/' . $_POST['folder_rel_path'] );
	exit();
	
}

/**
 * Use ajax to upload files.
 *
 * @since 1.0.0
 */
function instant_ide_file_tree_upload_action() {

	if ( isset( $_FILES['uploads']['error'] ) ) {
		
		$upload_error = false;
		
		foreach( $_FILES['uploads']['error'] as $key => $error ) {
			
			if ( $error == UPLOAD_ERR_OK ) {

				if ( file_exists( PLATFORM_DIR_DEV_PATH . '/' . $_REQUEST['rel_path'] . '/' . $_FILES['uploads']['name'][$key] ) )
					unlink( PLATFORM_DIR_DEV_PATH . '/' . $_REQUEST['rel_path'] . '/' . $_FILES['uploads']['name'][$key] );
					
				move_uploaded_file( $_FILES['uploads']['tmp_name'][$key], PLATFORM_DIR_DEV_PATH . '/' . $_REQUEST['rel_path'] . '/' . $_FILES['uploads']['name'][$key] );
				
			} else {
				
				$upload_error = true;
				
			}
			
		}
		
		if ( $upload_error )
			echo 'File Upload Failed';
		else
			echo 'Files Uploaded!';
		
	} else {
		
		echo 'Upload Error: No Files Selected';
		
	}
	
	if ( false !== instant_ide_build_file_check( 'cobalt-less.json', $_POST['ftrc_file_full_path'] ) ) {
		
	    $less_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-less.json', $_POST['ftrc_file_full_path'] ) ), true );
		instant_ide_scss_less_images_sync( $less_presets, $_POST['ftrc_file_full_path'], 'less' );
		
	} elseif ( false !== instant_ide_build_file_check( 'cobalt-scss.json', $_POST['ftrc_file_full_path'] ) ) {
		
	    $scss_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-scss.json', $_POST['ftrc_file_full_path'] ) ), true );
		instant_ide_scss_less_images_sync( $scss_presets, $_POST['ftrc_file_full_path'], 'scss' );
		
	}
	
	exit();
	
}

/**
 * Find and Replace files inside specific folders.
 *
 * @since 1.5.0
 */
function instant_ide_file_tree_find_action() {

	$folder = $_POST['rel_path'] == '' ? PLATFORM_DIR_DEV_PATH : PLATFORM_DIR_DEV_PATH . '/' . $_POST['rel_path'];
	$folder_rel_path = $_POST['rel_path'] == '' ? '/' : str_replace( PLATFORM_DIR_DEV_PATH, '', $folder );
	$find_value = $_POST['find_value'];
	$find_replace_type = $_POST['find_replace_type'];
	$replace_value = $_POST['replace_value'];
	$match_case_value = $_POST['match_case_value'];
	$whole_word_value = $_POST['whole_word_value'];
	$find_replace_value = $find_replace_type == 'replace' ? $replace_value : false;
	
	if ( $find_value != '' )
	    $finds = instant_ide_recursive_find( $folder, $find_value, $find_replace_value, $match_case_value, $whole_word_value );
	else
	    $finds = 'Empty Form';

	if ( ! empty( $finds ) && $finds != 'Empty Form' ) {

		$code = '';
		$found_in_files_count = 0;
		$finds_count = 0;
		$replaced_files_array = array();
		foreach( $finds as $key => $value ) {

			if ( $find_replace_type == 'replace' )
				array_push( $replaced_files_array, $key );

			$found_in_files_count = $found_in_files_count + 1;
			$file_name = basename( $key );
			$parent_id = '#iideft-directory' . substr( str_replace( '/', '-', str_replace( $file_name, '', $key ) ), 0, -1 );
			$parent_id = $parent_id === '#iideft-directory' ? '#iideft-root-directory' : $parent_id;

			$code .= '<p class="instant-ide-find-result-page" data-parent-id="' . $parent_id . '" data-file-name="' . $file_name . '" data-click-count="0">' . $key . '</p>';

			foreach( $value as $key2 => $value2) {

				foreach( $value2 as $key3 ) {

					$finds_count = $finds_count + 1;
					$content = file_get_contents( PLATFORM_DIR_DEV_PATH . $key );
                    list( $before ) = $key3[1] > 0 ? str_split( $content, $key3[1] ) : '';
                    $line_number = strlen( $before ) - strlen( str_replace( "\n", "", $before ) ) + 1;
					$code .= '<p class="instant-ide-find-result" data-parent-id="' . $parent_id . '" data-file-name="' . $file_name . '" data-click-count="0"><span class="instant-ide-find-result-line-number">' . $line_number . ':</span> <code>' . htmlspecialchars( substr( $key3[0], 0, 200 ) ) . '</code></p>';

				}

			}

		}
		$code_header = '<p class="instant-ide-find-result-heading">Searching for "' . $find_value . '" in ' . $folder_rel_path . ' (Found ' . $finds_count . ' matches in ' . $found_in_files_count . ' files)</p>';
		
		if ( $find_replace_type == 'replace' )
		    echo 'Replace Successful ' . implode( ',', $replaced_files_array );
		elseif ( $find_replace_type == 'replace check' )
		    echo 'You are about to replace ' . $finds_count . ' instances of "' . $find_value . '" with "' . $replace_value . '" in ' . $found_in_files_count . ' files. Continue?';
		else
		    echo $code_header . $code;
		    
	} elseif ( $finds == 'Empty Form' ) {
	    
        echo 'Form Error: Form Is Empty';
    
	} else {
		
		echo 'Find Error: No Files Found';
		
	}
	
	exit();
	
}

/**
 * Echo file size and permission information.
 *
 * @since 1.6.0
 */
function instant_ide_file_tree_get_file_properties() {
    
    if ( $_POST['file_type'] == 'folder' ) {
        
        $folder_size_count_array = instant_ide_get_dir_size_count( PLATFORM_DIR . $_POST['file_path'] );
        echo 'Size: (' . instant_ide_format_size_units( $folder_size_count_array['size'] ) . ') Permissions: (' . decoct( fileperms( PLATFORM_DIR . $_POST['file_path'] ) & 0777 ) . ')';
        
    } else {
        
        echo 'Size: (' . instant_ide_format_size_units( filesize( PLATFORM_DIR . $_POST['file_path'] ) ) . ') Permissions: (' . decoct( fileperms( PLATFORM_DIR . $_POST['file_path'] ) & 0777 ) . ')';
        
    }
	
	exit();
	
}

/**
 * Use ajax to update a specific theme file based on the posted values.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_save() {
	
	if ( false !== instant_ide_build_file_check( 'cobalt-less.json', $_POST['file_full_path'] ) && true !== instant_ide_less_php_init() )
		echo instant_ide_less_php_init();
	else if ( false !== instant_ide_build_file_check( 'cobalt-scss.json', $_POST['file_full_path'] ) && true !== instant_ide_scss_php_init() )
		echo instant_ide_scss_php_init();
	else
		echo 'File Updated';
	
	exit();
	
}

/**
 * Initialize the less php functionality.
 *
 * @since 1.2.0
 */
function instant_ide_less_php_init() {
	
	// Execute the less php init function if the Cobalt LESS presets .json file exists.
	if ( false !== instant_ide_build_file_check( 'cobalt-less.json', $_POST['file_full_path'] ) ) {
		
	    $less_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-less.json', $_POST['file_full_path'] ) ), true );
	    $build_file_rel_path = instant_ide_build_file_check( 'cobalt-less.json', $_POST['file_full_path'], $rel_path = true );
	    
	    if ( is_array( $less_presets ) ) {
	
		    foreach( $less_presets as $key ) {
		    	
		    	if ( isset( $key['Import Path'] ) && isset( $key['Formatter'] ) && isset( $key['PreCSS File Path'] ) && isset( $key['CSS File Path'] ) && file_exists( $build_file_rel_path . $key['PreCSS File Path'] ) ) {
		    		
		    		$formatters = array( 'lessjs', 'compressed', 'classic' );
		    		
		    		if ( in_array( $key['Formatter'], $formatters ) )
		    			$less_php_formatter = $key['Formatter'];
		    		else
		    			$less_php_formatter = 'lessjs';
		    		
			        try {
			
						$less = new lessc;
						$less->setPreserveComments(true);
						$less->addImportDir( $build_file_rel_path . $key['Import Path'] );
						$less->setFormatter( $less_php_formatter );
						
						if ( 0 == filesize( $build_file_rel_path . $key['PreCSS File Path'] ) ) {
							
				            $css = file_get_contents( $build_file_rel_path . $key['CSS File Path'] );
				            file_put_contents( $build_file_rel_path . $key['PreCSS File Path'], $css );
							
						} else {
							
				            $lessIn = file_get_contents( $build_file_rel_path . $key['PreCSS File Path'] );
				            $cssOut = $less->compile( $lessIn );
				            file_put_contents( $build_file_rel_path . $key['CSS File Path'], $cssOut );
							
						}
			
			        } catch ( \Exception $e ) {
			
						if ( $_POST['site_preview_active'] === 'true' )
			            	return '<div id="instant-ide-less-php-error-message-container"><div id="instant-ide-less-php-error-message"><h1>LESS Compile Error:</h1>' . $e . '</div></div>';
			            else
			            	return 'LESS Compile Error: Open Site Preview to view full error message.';
			            	
						error_log( '[' . date( "F j, Y, g:i a e O" ) . '] lessphp: Unable to compile content' . PHP_EOL, 3, IIDE_DIR . '/iide_errors.log' );
			
			        }
		    		
		    	} else {
		    		
					if ( $_POST['site_preview_active'] === 'true' )
		            	return '<div id="instant-ide-less-php-error-message-container"><div id="instant-ide-less-php-error-message" style="text-align:center;"><h1>LESS Compile Error:</h1>Check cobalt-less.json file for correct configuration.</div></div>';
		            else
		            	return 'LESS Compile Error: Check cobalt-less.json file for correct configuration.';
		    		
		    	}
		
		    }
	    
		} else {
			
			if ( $_POST['site_preview_active'] === 'true' )
            	return '<div id="instant-ide-less-php-error-message-container"><div id="instant-ide-less-php-error-message" style="text-align:center;"><h1>LESS Compile Error:</h1>Check cobalt-less.json file for correct configuration.</div></div>';
            else
            	return 'LESS Compile Error: Check cobalt-less.json file for correct configuration.';
			
		}
		
	}
    
    return true;
    
}

/**
 * Initialize the scss php functionality.
 *
 * @since 1.2.0
 */
function instant_ide_scss_php_init() {
	
	// Execute the scss php init function if the Cobalt SCSS presets .json file exists.
	if ( false !== instant_ide_build_file_check( 'cobalt-scss.json', $_POST['file_full_path'] ) ) {
		
	    $scss_presets = json_decode( file_get_contents( instant_ide_build_file_check( 'cobalt-scss.json', $_POST['file_full_path'] ) ), true );
	    $build_file_rel_path = instant_ide_build_file_check( 'cobalt-scss.json', $_POST['file_full_path'], $rel_path = true );
	
		if ( is_array( $scss_presets ) ) {
			
		    foreach( $scss_presets as $key ) {
		    	
		    	if ( isset( $key['Import Path'] ) && isset( $key['Formatter'] ) && isset( $key['PreCSS File Path'] ) && isset( $key['CSS File Path'] ) && file_exists( $build_file_rel_path . $key['PreCSS File Path'] ) ) {
		    		
		    		$formatters = array( 'Expanded', 'Nested', 'Compressed', 'Compact', 'Crunched' );
		    		
		    		if ( in_array( $key['Formatter'], $formatters ) )
		    			$scss_php_formatter = $key['Formatter'];
		    		else
		    			$scss_php_formatter = 'Expanded';
		    		
			        try {
			
			            $scss = new Compiler();
			            $scss->addImportPath( $build_file_rel_path . $key['Import Path'] );
			            $scss->setFormatter( 'Leafo\ScssPhp\Formatter\\' . $scss_php_formatter );
						
						if ( 0 == filesize( $build_file_rel_path . $key['PreCSS File Path'] ) ) {
							
				            $css = file_get_contents( $build_file_rel_path . $key['CSS File Path'] );
				            file_put_contents( $build_file_rel_path . $key['PreCSS File Path'], $css );
							
						} else {
							
				            $scssIn = file_get_contents( $build_file_rel_path . $key['PreCSS File Path'] );
				            $cssOut = $scss->compile( $scssIn );
				            file_put_contents( $build_file_rel_path . $key['CSS File Path'], $cssOut );
							
						}
			
			        } catch ( \Exception $e ) {
			
						if ( $_POST['site_preview_active'] === 'true' )
			            	return '<div id="instant-ide-scss-php-error-message-container"><div id="instant-ide-scss-php-error-message"><h1>SCSS Compile Error:</h1>' . $e . '</div></div>';
			            else
			            	return 'SCSS Compile Error: Open Site Preview to view full error message.';
			            	
			            error_log( '[' . date( "F j, Y, g:i a e O" ) . '] scssphp: Unable to compile content' . PHP_EOL, 3, IIDE_DIR . '/iide_errors.log' );
			
			        }
		    		
		    	} else {
		    		
					if ( $_POST['site_preview_active'] === 'true' )
		            	return '<div id="instant-ide-scss-php-error-message-container"><div id="instant-ide-scss-php-error-message" style="text-align:center;"><h1>SCSS Compile Error:</h1>Check cobalt-scss.json file for correct configuration.</div></div>';
		            else
		            	return 'SCSS Compile Error: Check cobalt-scss.json file for correct configuration.';
		    		
		    	}
		
		    }
			
		} else {
			
			if ( $_POST['site_preview_active'] === 'true' )
            	return '<div id="instant-ide-scss-php-error-message-container"><div id="instant-ide-scss-php-error-message" style="text-align:center;"><h1>SCSS Compile Error:</h1>Check cobalt-scss.json file for correct configuration.</div></div>';
            else
            	return 'SCSS Compile Error: Check cobalt-scss.json file for correct configuration.';
			
		}
		
	}
    
    return true;
    
}

/**
 * Sync SCSS or LESS images with CSS images.
 *
 * @since 1.2.0
 */
function instant_ide_scss_less_images_sync( $presets, $file_full_path, $type ) {
    
    if ( is_array( $presets ) ) {
        
        $build_file_rel_path = instant_ide_build_file_check( 'cobalt-' . $type . '.json', $file_full_path, $rel_path = true );

	    foreach( $presets as $key ) {
	    	
            if ( isset( $key['PreCSS Images Path'] ) && is_dir( $build_file_rel_path . $key['PreCSS Images Path'] ) ) {
            	
            	if ( isset( $key['Images Sync Type'] ) && ( $key['Images Sync Type'] == 'sync' || $key['Images Sync Type'] == 'update' ) )
            		instant_ide_file_sync( $build_file_rel_path . $key['PreCSS Images Path'], $build_file_rel_path . $key['CSS Images Path'], $key['Images Sync Type'] );
            	
            }
	
	    }
    
	}
    
}
