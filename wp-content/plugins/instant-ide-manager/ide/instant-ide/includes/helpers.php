<?php
/**
 * This file houses the general helper functions used
 * throughout the Instant IDE plugin.
 *
 * @package Instant IDE
 */
 
/**
 * Build Yes/No drop-down list.
 *
 * @since 1.0.0
 * @return Yes/No array.
 */
function instant_ide_yes_no_array() {
	
	$instant_ide_yes_no_array = array(
		'select' => 'select',
		'Yes' => 'yes',
		'No' => 'no',
	);
	
	return $instant_ide_yes_no_array;
	
}

/**
 * Build Path Change Action drop-down list.
 *
 * @since 1.6.0
 * @return Path Change Action array.
 */
function instant_ide_path_change_action_array() {
	
	$instant_ide_path_change_action_array = array(
		'select' => 'select',
		'Auto-Reload' => 'auto-reload',
		'Confirm Reload' => 'confirm-reload',
	);
	
	return $instant_ide_path_change_action_array;
	
}

/**
 * Build Save State drop-down list.
 *
 * @since 1.6.0
 * @return Save State array.
 */
function instant_ide_save_state_array() {
	
	$instant_ide_save_state_array = array(
		'select' => 'select',
		'Enabled' => 'enabled',
		'Disabled' => 'disabled',
		'Reset State' => 'reset-state',
	);
	
	return $instant_ide_save_state_array;
	
}

/**
 * Build tab-size drop-down list.
 *
 * @since 1.6.0
 * @return tab-size array.
 */
function instant_ide_tab_size_array() {
	
	$instant_ide_tab_size_array = array(
		'select' => 'select',
		'2 Spaces' => '2',
		'4 Spaces' => '4',
	);
	
	return $instant_ide_tab_size_array;
	
}

/**
 * Build font-size drop-down list.
 *
 * @since 1.5.0
 * @return font-size array.
 */
function instant_ide_font_size_array() {
	
	$instant_ide_font_size_array = array(
		'select' => 'select',
		'10px' => '10',
		'11px' => '11',
		'12px' => '12',
		'13px' => '13',
		'14px' => '14',
		'15px' => '15',
		'16px' => '16',
		'17px' => '17',
		'18px' => '18',
		'19px' => '19',
		'20px' => '20',
	);
	
	return $instant_ide_font_size_array;
	
}

/**
 * Build font-family drop-down list.
 *
 * @since 1.5.0
 * @return font-family array.
 */
function instant_ide_font_family_array() {
	
	$instant_ide_font_family_array = array(
		'select' => 'select',
		'Droid Sans Mono' => 'dsm',
		'Monaco' => 'monaco',
		'monospace' => 'monospace',
	);
	
	return $instant_ide_font_family_array;
	
}

/**
 * Build Active File Editor drop-down list.
 *
 * @since 1.0.0
 * @return Active File Editor array.
 */
function instant_ide_active_file_editor_array() {
	
	$instant_ide_active_file_editor_array = array(
		'select' => 'select',
		'Ace Editor' => 'ace',
		'Monaco Editor' => 'monaco',
	);
	
	return $instant_ide_active_file_editor_array;
	
}

/**
 * Build Ace Editor Key Bindings drop-down list.
 *
 * @since 1.2.2
 * @return Ace Editor Key Bindings array.
 */
function instant_ide_ace_editor_key_bindings_array() {
	
	$instant_ide_ace_editor_key_bindings_array = array(
		'select' => 'select',
		'Default' => 'ace',
		'Sublime' => 'sublime',
		'VS Code' => 'vscode',
		'Emacs' => 'emacs',
		'Vim' => 'vim',
	);
	
	return $instant_ide_ace_editor_key_bindings_array;
	
}

/**
 * Build Ace Editor Themes drop-down list.
 *
 * @since 1.0.0
 * @return Ace Editor Themes array.
 */
function instant_ide_monaco_editor_themes_array() {
	
	$instant_ide_monaco_editor_themes_array = array(
		'select' => 'select',
		'VS Light' => 'vs',
		'VS Dark' => 'vs-dark',
		'VS Dark (HC)' => 'hc-black',
		'Tomorrow Night iIDE' => 'tomorrow-night-iide',
	);
	
	return $instant_ide_monaco_editor_themes_array;
	
}

/**
 * Build Ace Editor Themes drop-down list.
 *
 * @since 1.0.0
 * @return Ace Editor Themes array.
 */
function instant_ide_ace_editor_themes_array() {
	
	$instant_ide_ace_editor_themes_array = array(
		'select' => 'select',
		'Ambiance' => 'ambiance',
		'Chaos' => 'chaos',
		'Chrome' => 'chrome',
		'Clouds' => 'clouds',
		'Clouds Midnight' => 'clouds_midnight',
		'Cobalt' => 'cobalt',
		'Crimson Editor' => 'crimson_editor',
		'Dawn' => 'dawn',
		'Dracula' => 'dracula',
		'Dreamweaver' => 'dreamweaver',
		'Eclipse' => 'eclipse',
		'GitHub' => 'github',
		'Gob' => 'gob',
		'GruvBox' => 'gruvbox',
		'Idle Fingers' => 'idle_fingers',
		'iPlastic' => 'iplastic',
		'Katzenmilch' => 'katzenmilch',
		'KR Theme' => 'kr_theme',
		'Kurior' => 'kurior',
		'Merbivore' => 'merbivore',
		'Merbivore Soft' => 'merbivore_soft',
		'Mono Industrial' => 'mono_industrial',
		'Monokai' => 'monokai',
		'Nord Dark' => 'nord_dark',
		'Pastel On Dark' => 'pastel_on_dark',
		'Solarized Dark' => 'solarized_dark',
		'Solarized Light' => 'solarized_light',
		'SQL Server' => 'sqlserver',
		'Terminal' => 'terminal',
		'Textmate' => 'textmate',
		'Tomorrow' => 'tomorrow',
		'Tomorrow Night' => 'tomorrow_night',
		'Tomorrow Night Blue' => 'tomorrow_night_blue',
		'Tomorrow Night Bright' => 'tomorrow_night_bright',
		'Tomorrow Night Eighties' => 'tomorrow_night_eighties',
		'Twilight' => 'twilight',
		'Vibrant Ink' => 'vibrant_ink',
		'Xcode' => 'xcode',
	);
	
	return $instant_ide_ace_editor_themes_array;
	
}

/**
 * Build the Instant IDE select menu options.
 *
 * @since 1.0.0
 */
function instant_ide_build_select_menu_options( $options_array = array(), $selected = '' ) {
	
	foreach( $options_array as $key => $value ) {
		
		$option = '<option value="' . $value . '"';
			
		if ( $value == $selected )
			$option .= ' selected="selected"';

		$option .= '>' . $key . '</option>';
		
		echo $option;
		
	}
	
}

/**
 * Convert megabyte values into bytes.
 *
 * @since 1.6.0
 * @return bytes value from megabyte value input.
 */
function instant_ide_mb_to_bytes( $val ) {
	
    $val = trim( $val );
    $last = strtolower( $val[strlen( $val ) - 1] );
    $int_val = intval( $val );
    switch( $last ) {
        case 'g':
            $int_val *= 1024;
        case 'm':
            $int_val *= 1024;
        case 'k':
            $int_val *= 1024;
    }

    return $int_val;
	
}

/**
 * Return proper size/unit info (used for image size info).
 *
 * @since 1.0.0
 * @return proper size/unit info.
 */
function instant_ide_format_size_units( $bytes ) {
	
	if ( $bytes >= 1073741824 )
		$bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
	elseif ( $bytes >= 1048576 )
		$bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
	elseif ( $bytes >= 1024 )
		$bytes = number_format( $bytes / 1024, 2 ) . ' KB';
	elseif ( $bytes > 1 )
		$bytes = $bytes . ' bytes';
	elseif ( $bytes == 1 )
		$bytes = $bytes . ' byte';
	else
		$bytes = '0 bytes';
	
	return $bytes;
	
}

/**
 * Scan a specified directory and return an array of the total size (in bytes)
 * and number of files and directories inside it.
 *
 * @since 1.6.0
 * @return an array of the total size (in bytes) and number of files and directories inside it.
 */
function instant_ide_get_dir_size_count( $dir, $value = array( 'size' => 0, 'count' => 0 ) ) {
    
    foreach( glob( rtrim( $dir, '/' ) . '/*', GLOB_NOSORT ) as $file ) {
        
        $value['count']++;
        if ( is_dir( $file ) )
            $value = instant_ide_get_dir_size_count( $file, $value );
        else
            $value['size'] += filesize( $file );
        
    }
    
    return $value;
    
}

/**
 * Rebuild the multi-image file upload array to be
 * better suited for feeding into the image upload script.
 *
 * @since 1.0.0
 * @return a more usable image upload file array.
 */
function instant_ide_rearray_multi_image_upload( $file_post ) {

	$file_array = array();
	$file_count = count( $file_post['name'] );
	$file_keys = array_keys( $file_post );
	
	for ( $i=0; $i<$file_count; $i++ ) {
		
		foreach ( $file_keys as $key ) {
			
			$file_array[$i][$key] = $file_post[$key][$i];
			
		}
		
	}
	
	return $file_array;
	
}

/**
 * Return either the Parent Theme or Active/Child Theme folder name.
 *
 * @since 1.0.0
 * @return specified theme folder name.
 */
function instant_ide_get_platform_folder_name() {
	
	$platform_dir_explode = explode( '/', PLATFORM_DIR_DEV_PATH );
	$platform_folder_name = array_pop( $platform_dir_explode );
	
	return $platform_folder_name;
	
}

/**
 * Compare src and dest files based on filemtime and copy src to dest if they are different.
 *
 * @since 1.2.0
 */
function instant_ide_file_sync( $src_dir, $dest_dir, $sync_type ) {
	
	if ( basename( $src_dir ) === basename( $dest_dir ) ) {
	
		if ( $sync_type == 'sync' ) {
			
			instant_ide_delete_dir( $dest_dir );
			instant_ide_copy_dir( $src_dir, $dest_dir );
			
		} else {
			
			foreach( glob( $src_dir . '*' ) as $src_file )
				copy( $src_file, $dest_dir . basename( $src_file ) );
			
		}
	
	} else {
		
		error_log( '[' . date( "F j, Y, g:i a e O" ) . '] instant_ide_file_sync function failed. $src_dir name and $dest_dir name must be the same.' . PHP_EOL, 3, IIDE_DIR . '/iide_errors.log' );
		
	}
		
}

/**
 * Check to see if build files exist in the appropriate directories
 * and if so, then return either the build file path or rel path.
 * If build file is not found then false is returned.
 *
 * @since 1.5.0
 * @return path or false based on whether or not build file is found.
 */
function instant_ide_build_file_check( $build_file, $file_path, $rel_path = false ) {
	
	if ( substr( $file_path, 0, strlen( '/wp-content/themes' ) ) === '/wp-content/themes' ||
	    substr( $file_path, 0, strlen( '/wp-content/plugins' ) ) === '/wp-content/plugins' ||
	    substr( $file_path, 0, strlen( '/wp-content/uploads' ) ) === '/wp-content/uploads' ) {
	        
        $path_array = explode( '/', substr( $file_path, 1 ) );
        $new_path = '';
        $count = 0;
        foreach( $path_array as $key ) {
            
            if ( $count < 3 )
                $new_path .= '/' . $key;
            
            $count++;
        
        }
        
        if ( file_exists( PLATFORM_DIR . $new_path . '/' . $build_file ) )
            return false == $rel_path ? PLATFORM_DIR . $new_path . '/' . $build_file : PLATFORM_DIR . $new_path;
        else
            return false;
	    
	} else {
	    
	    return false;
	    
	}
	
}

/**
 * Check if directory exists and try and create it if it does not.
 *
 * @since 1.0.0
 * @return true or false based on the findings of the function.
 */
function instant_ide_dir_check( $dir, $check_only = false ) {
	
	if ( ! is_dir( $dir ) && $check_only == false ) {
		
		mkdir( $dir );
		@chmod( $dir, 0755 );
		
	}
	
	if ( is_dir( $dir ) )
		return true;
	else
		return false;
		
}

/**
 * Scan a specified directory and return the names of the directories inside it.
 *
 * @since 1.0.0
 * @return the names of directories inside a specified directory.
 */
function instant_ide_get_dir_names( $dir ) {
	
	if ( ! is_dir( $dir ) )
		return;
	
	$directories = scandir( $dir );
	$directory_array = array();
	
	foreach( $directories as $directory ) {
		
	    if ( $directory === '.' or $directory === '..' )
	    	continue;
	
	    if ( is_dir( $dir . '/' . $directory ) )
			$directory_array[] = $directory;
			
	}
	
	return $directory_array;
	
}

/**
 * Scan a specified directory and return the names of the files inside it.
 *
 * @since 1.5.0
 * @return the names of files inside a specified directory.
 */
function instant_ide_get_file_names( $dir ) {
	
	if ( ! is_dir( $dir ) )
		return;
		
	$files = glob( $dir . '/*' );
	
    foreach( $files as $file ) {
        
        if ( is_file( $file ) )
            $file_list[] = basename( $file );

    }
	
	return $file_list;
	
}

/**
 * Get the hashed console file name.
 *
 * @since 1.0.0
 * @return the hashed console file name.
 */
function instant_ide_get_console_file( $source ) {
	
	if ( is_dir( $source ) ) {

		$files = scandir( $source );
		$console_file = '';
		foreach( $files as $file ) {
			
			if ( substr( $file, 0, 8 ) == 'console-' )
				$console_file = $file;
			
		}
		
		return $console_file;
		
	} else {
		
		return false;
		
	}
	
}

// Global find array value to enable recursive find function to work properly.
$iide_finds = array();

/**
 * Recursively "find in files".
 *
 * @since 1.5.0
 * @return an array of file name, value, and line number search info.
 */
function instant_ide_recursive_find( $dir, $find_value, $replace_value = false, $match_case = true, $whole_word = false ) {
	
	if ( ! is_dir( $dir ) )
		return;

	global $iide_finds;
	
	$handle = opendir( $dir );
	while ( false !== ( $file = readdir( $handle ) ) ) {
	    
	    $reject_ext = array( 'zip', 'pdf', 'png', 'jpg', 'jpeg', 'bmp', 'gif' );
	    
	    if ( in_array( pathinfo( $file, PATHINFO_EXTENSION ), $reject_ext ) )
	        continue;
		
		if ( is_dir( $dir . '/' . $file ) ) {
			
			if ( ( $file != '.' ) && ( $file != '..' ) )
				instant_ide_recursive_find( $dir . '/' . $file, $find_value, $replace_value, $match_case, $whole_word );

		} else {
		    
			$file_path = str_replace( PLATFORM_DIR_DEV_PATH, '', $dir . '/' . $file );
			$file_contents = file_get_contents( $dir . '/' . $file );
			$found = instant_ide_get_line_of_text( $file_contents, $find_value, $match_case, $whole_word );
			$found = array_filter( $found );
			if ( ! empty( $found ) ) {
				
				if ( false !== $replace_value ) {

					$replaced_file_contents = str_replace( $find_value, $replace_value, $file_contents );
					instant_ide_write_file( $dir . '/' . $file, $replaced_file_contents, $stripslashes = false );

				}
				$new_find = array(
					$file_path => $found,
				);
				$iide_finds = array_merge( $iide_finds, $new_find );

			}
			
		}
	}
	closedir( $handle );

	return $iide_finds;
	
}

/**
 * Recursively copy all files and folders from one location to another.
 *
 * @since 1.0.0
 */
function instant_ide_copy_dir( $source, $destination ) {
	
	if ( is_dir( $source ) ) {
		
		if ( ! is_dir( $destination ) )
			@mkdir( $destination, 0755, true );

		$handle = opendir( $source );
		while ( false !== ( $readdirectory = readdir( $handle ) ) ) {
			
			if ( $readdirectory == '.' || $readdirectory == '..' )
				continue;

			$pathdir = $source . '/' . $readdirectory; 
			if ( is_dir( $pathdir ) ) {
				
				instant_ide_copy_dir( $pathdir, $destination . '/' . $readdirectory );
				continue;
				
			}
			copy( $pathdir, $destination . '/' . $readdirectory );
			
		}
		closedir( $handle );
		
	} else {
		
		copy( $source, $destination );
		
	}
	
}

/**
 * Recursively delete specific folders.
 *
 * @since 1.0.0
 */
function instant_ide_delete_dir( $dir ) {
	
	if ( ! is_dir( $dir ) )
		return;
	
	$handle = opendir( $dir );
	while ( false !== ( $file = readdir( $handle ) ) ) {
		
		if ( is_dir( $dir . '/' . $file ) ) {
			
			if ( ( $file != '.' ) && ( $file != '..' ) )
				instant_ide_delete_dir( $dir . '/' . $file );

		} else {
			
			unlink( $dir . '/' . $file );
			
		}
	}
	closedir( $handle );
	rmdir( $dir );
	
}

/**
 * Delete a specified directory and all contents within it
 * and then add the root folder back in.
 *
 * @since 1.0.0
 */
function instant_ide_cleanup_dir( $dir ) {
	
	instant_ide_delete_dir( $dir );
	instant_ide_dir_check( $dir );
	
}

/**
 * Delete a specified directory and all contents within it and then
 * add the root folder back in, including a blank index.html file.
 *
 * @since 1.0.0
 */
function instant_ide_cleanup_html_dir( $dir ) {
	
	instant_ide_delete_dir( $dir );
	instant_ide_dir_check( $dir );
	instant_ide_write_file( $dir . 'index.html', '<!-- Empty File -->' );
	
}

/**
 * Return the entire line of text where a specified string exists.
 *
 * @since 1.0.0
 * @return entire line of text where specified string exists.
 */
function instant_ide_get_line_of_text( $file_contents, $string, $match_case = true, $whole_word = false ) {
	
	$escaped_string = instant_ide_preg_quote( $string );
	if ( 'false' !== $match_case && 'false' !== $whole_word )
	    $pattern = '/^.*\b' . $escaped_string . '\b.*$/m';
	elseif ( 'false' === $match_case && 'false' === $whole_word )
	    $pattern = '/^.*\w*' . $escaped_string . '\w*.*$/mi';
	elseif ( 'false' === $match_case && 'false' !== $whole_word )
	    $pattern = '/^.*\b' . $escaped_string . '\b.*$/mi';
	else
	    $pattern = '/^.*\w*' . $escaped_string . '\w*.*$/m';
	    
	$matches = array();
	preg_match_all( $pattern, $file_contents, $matches, PREG_OFFSET_CAPTURE );
	
	return $matches;
	
}

/**
 * Return the entire first line of text where a specified string exists.
 *
 * @since 1.6.0
 * @return entire first line of text where specified string exists.
 */
function instant_ide_get_first_line_of_text( $file_contents, $string ) {
	
	$escaped_string = instant_ide_preg_quote( $string );
	$pattern = '/^.*\b' . $escaped_string . '\b.*$/m';
	$matches = array();
	preg_match( $pattern, $file_contents, $matches );
	
	return $matches;
	
}

/**
 * Return the contents of a string with specified line replaced.
 *
 * @since 1.0.0
 * @return the contents of a string with specified line replaced.
 */
function instant_ide_replace_line_of_text( $content, $old_line, $new_line ) {

	$new_content = str_replace( $old_line, $new_line, $content );
	
	return $new_content;
	
}

/**
 * Return the contents of a string between two strings.
 *
 * @since 1.0.0
 * @return the contents of a string between two strings.
 */
function instant_ide_get_string_between( $string, $start, $end ) {
	
	$string = ' ' . $string;
	$ini = strrpos( $string, $start );
	if ( $ini == 0 )
		return '';
		
	$ini += strlen( $start );
	$len = strrpos( $string, $end, $ini ) - $ini;
	
	return substr( $string, $ini, $len );
	
}

/**
 * Sanatize strings of text.
 *
 * @since 1.0.0
 */
function instant_ide_sanatize_string( $string = '', $underscore = false ) {
	
    // Lower case everything.
    $string = strtolower( $string );
    
    // Make alphaunermic.
    $string = preg_replace( "/[^a-z0-9_\s-]/", "", $string );
    
    // Clean multiple dashes or whitespaces.
    $string = preg_replace( "/[\s-]+/", " ", $string );
    
    if ( false != $underscore ) {
    	
	    // Convert whitespaces and dashes to underscore.
	    $string = preg_replace( "/[\s-]/", "_", $string );
	    
    } else {
    	
	    // Convert whitespaces and underscore to dash.
	    $string = preg_replace( "/[\s_]/", "-", $string );
	    
	}
	
    return $string;
    
}

/**
 * Convert sanatized string into human readable text.
 *
 * @since 1.6.0
 */
function instant_ide_unsanatize_string( $string = '', $ucfirst = false ) {
    
    ucwords( str_replace( '_', ' ', $string ) );
    
    // Replace underscores with spaces.
    $string = str_replace( '_', ' ', $string );
    
    // Replace dashes with spaces.
    $string = str_replace( '-', ' ', $string );
    
    // Uppercase first character of string ..OR.. of each word.
    if ( false != $ucfirst ) {
        
        // Only make first character of string uppercase.
        $string = ucfirst( $string );
        
    } else {
        
        // Make each word uppercase.
        $string = ucwords( $string );
        
    }
	
    return $string;
    
}

/**
 * Essentially provide the same functionality as the official PHP preg_quote function
 * but including ALL of the current special characters escaped, ensuring that no
 * matter which PHP version you're running all characters will be escaped.
 *
 * @since 1.5.0
 * @return a filtered string, ensuring that all current special characters that are included in preg_quote are escaped.
 */
function instant_ide_preg_quote( $string ) {
	
	$special_chars_array = array( '/', '.', '\\', '+', '*', '?', '[', '^', ']', '$', '(', ')', '{', '}', '=', '!', '<', '>', '|', ':', '-', '#' );
	$string_array = str_split( $string );
	$new_string = '';
	
    foreach( $string_array as $char ) {
        
        if ( in_array( $char, $special_chars_array ) )
            $new_string .= '\\' . $char;
        else
            $new_string .= $char;
        
    }
    
    return $new_string;
	
}

/**
 * Get the IP address of the current visitor.
 *
 * @since 1.0.0
 *
 */
function instant_ide_get_ip() {

	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		
		$ip = $_SERVER['HTTP_CLIENT_IP'];
		
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		
	} else {
		
		$ip = $_SERVER['REMOTE_ADDR'];
		if ( $ip == '::1' )
			$ip = '127.0.1.6';
		
	}
	
	return $ip;

}

/**
 * Write to a file or create it if it does not exist.
 *
 * @since 1.0.0
 */
function instant_ide_write_file( $path, $code, $stripslashes = true ) {
	
	$handle = @fopen( $path, 'w+' );
	
	if ( false == $stripslashes )
		@fwrite( $handle, $code );
	else
		@fwrite( $handle, stripslashes( $code ) );
		
	@fclose( $handle );
	
}

/**
 * Compress files using gzip.
 *
 * @since 1.6.1
 */
function instant_ide_gzip_file( $source, $level = 9 ) {

	$dest = $source . '.gz';
	$mode = 'wb' . $level;
	$error = false;

	if ( $fp_out = gzopen( $dest, $mode ) ) {

		if ( $fp_in = fopen( $source, 'rb' ) ) {

			while ( ! feof( $fp_in ) )
				gzwrite( $fp_out, fread( $fp_in, 1024 * 512 ) );

			fclose( $fp_in );

		} else {

			$error = true;

		}

		gzclose( $fp_out );

	} else {

		$error = true;

	}

	if ( $error )
		return false;
	else
		return $dest;

}

/**
 * Uncompress gzip files.
 *
 * @since 1.6.0
 */
function instant_ide_gunzip_file( $gz_file ) {
    
    if ( ! file_exists( $gz_file ) )
        return;
    
    // Raising this value may increase performance
    $buffer_size = 4096; // read 4kb at a time
    $gz_file_name = substr( $gz_file, strrpos( $gz_file, '/' ) + 1 );
    // Output gunzipped file to /tmp/ dir.
    $out_file_name = str_replace( '.gz', '', IIDE_DIR . '/tmp/' . $gz_file_name ); 
    
    // Open our files (in binary mode)
    $file = gzopen( $gz_file, 'rb' );
    $out_file = fopen( $out_file_name, 'wb' ); 
    
    // Keep repeating until the end of the input file
    while ( ! gzeof( $file) ) {
        
        // Read buffer-size bytes
        // Both fwrite and gzread and binary-safe
        fwrite( $out_file, gzread( $file, $buffer_size ) );
        
    }
    
    // Files are done, close files
    fclose( $out_file );
    gzclose( $file );
	
}

/**
 * Check that certain necessary Instant IDE files exist
 * and create them if they do not.
 *
 * @since 1.5.0
 */
function instant_ide_setup_file_check() {
	
	if ( ! file_exists( IIDE_DIR . '/.htaccess' ) ) {
	    
        $htaccess_content = '
# deny all except those indicated here
#<Limit GET POST>
#	Order Allow,Deny
#	Allow from 12.345.67.890
#	Allow from 09.876.54.321
#</Limit>

# password protect iIDE directory
#AuthName "Admins Only"
#AuthUserFile /server/path/to/.htpasswd
#AuthGroupFile /dev/null
#AuthType basic
#Require valid-user

# force https
#RewriteEngine On
#RewriteCond %{HTTPS} off
#RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}

# whitelist the iIDE directory
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !/.*
</IfModule>

# disable indexing of directories
Options -Indexes';
        
        instant_ide_write_file( IIDE_DIR . '/.htaccess', $htaccess_content, $stripslashes = false );
	    
	}
    
    if ( ! file_exists( IIDE_DIR . '/active-editor.php' ) ) {
        
        $active_editor_content = "<?php
// Define the current active file editor.
define( 'IIDE_ACTIVE_EDITOR', 'monaco' );
";
    
        instant_ide_write_file( IIDE_DIR . '/active-editor.php', $active_editor_content, $stripslashes = false );
        
    }
    
    if ( ! file_exists( IIDE_DIR . '/dev-path.php' ) ) {
        
        $dev_path_content = "<?php
// Define the relative path for development.
define( 'IIDE_DEV_PATH', '' );
";
    
        instant_ide_write_file( IIDE_DIR . '/dev-path.php', $dev_path_content, $stripslashes = false );
        
    }

    if ( ! file_exists( IIDE_DIR . '/paths-li.php' ) ) {
        
        $paths_li_content = "<?php
// Define the Paths list-item code.
define( 'IIDE_PATHS_LI', '' );
";
    
        instant_ide_write_file( IIDE_DIR . '/paths-li.php', $paths_li_content, $stripslashes = false );
        
    }
    
    if ( ! file_exists( IIDE_DIR . '/open-dirs.php' ) ) {
        
        $open_dirs_content = "<?php
// Define the current open directories.
define( 'IIDE_OPEN_DIRS', '' );
";
    
        instant_ide_write_file( IIDE_DIR . '/open-dirs.php', $open_dirs_content, $stripslashes = false );
        
    }
    
    if ( ! file_exists( IIDE_DIR . '/opened-dirs.php' ) ) {
        
        $opened_dirs_content = "<?php
// Define the current opened directories.
define( 'IIDE_OPENED_DIRS', '' );
";
    
        instant_ide_write_file( IIDE_DIR . '/opened-dirs.php', $opened_dirs_content, $stripslashes = false );
        
    }

    if ( ! file_exists( IIDE_DIR . '/save-state.json' ) ) {
        
        $save_state_content = '{
    "iide_path_change_popup": "yes",
    "iide_save_state": "yes",
    "iide_editor_tab_size": "4",
    "iide_editor_font_size": "14",
    "iide_editor_font_family": "monospace",
    "iide_theme": "dark",
    "iide_ace_editor_kb_handler": "ace",
    "iide_monaco_editor_theme": "tomorrow-night-iide",
    "iide_ace_editor_theme": "tomorrow_night_eighties",
    "iide_word_wrap": "off",
    "iide_show_hidden_files": "false",
	"iide_editor_layout_state": "single",
	"iide_site_preview_state": "closed",
	"iide_console_state": "closed",
	"iide_find_window_dir_id": "",
	"iide_open_files": "",
	"iide_active_tab_one_state": "",
	"iide_active_tab_two_state": "",
	"iide_file_dblclicked_state": "",
	"iide_dirs_scroll_top": "",
	"iide_selected_folder_id": "",
	"iide_selected_file_parent_dir": "",
	"iide_selected_file": "",
	"iide_selected_file_dblclicked": "",
	"iide_splitter_tree_position": "20%",
	"iide_splitter_editor_position": "50%",
	"iide_splitter_console_position": "80%",
	"iide_site_preview_url": "' . PLATFORM_URL . '/"
}';
    
        instant_ide_write_file( IIDE_DIR . '/save-state.json', $save_state_content, $stripslashes = false );
        
    }
	
}
