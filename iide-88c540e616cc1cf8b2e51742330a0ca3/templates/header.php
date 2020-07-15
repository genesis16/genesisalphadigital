<?php
/*
 * Build the header template file.
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="iide-ajax-token" content="<?php echo $_SESSION['iide_ajax_token'] ?>">
    
    <title>Instant IDE - <?php echo PLATFORM_URL ?></title>
    
    <link rel="shortcut icon" href="<?php echo IIDE_URL; ?>assets/css/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="<?php echo IIDE_URL; ?>assets/css/style.css?ver=<?php echo IIDE_VERSION; ?>">
    <link rel="stylesheet" href="<?php echo IIDE_URL; ?>assets/js/contextMenu/jquery.contextMenu.min.css?ver=<?php echo IIDE_VERSION; ?>">
    <link rel="stylesheet" href="<?php echo IIDE_URL; ?>assets/js/splitter/jquery.splitter.css?ver=<?php echo IIDE_VERSION; ?>">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<?php // Leave without indentation so the following script tags will remain properly indented in the page source.
$reload_delay = file_exists( PLATFORM_DIR_DEV_PATH . '/package.json' ) ? 1500 : 0;
?>
    <script type="text/javascript">
        var iide_active_editor = '<?php echo IIDE_ACTIVE_EDITOR; ?>';
        var iide_dev_path = '<?php echo IIDE_DEV_PATH; ?>';
        var iide_paths_li = '<?php echo IIDE_PATHS_LI; ?>';
        var iide_platform_url = '<?php echo PLATFORM_URL; ?>';
        var iide_platform_url_dev_path = '<?php echo PLATFORM_URL_DEV_PATH; ?>';
        var iide_url = '<?php echo IIDE_URL; ?>';
        var ini_file_size = '<?php echo instant_ide_mb_to_bytes( ini_get( 'post_max_size' ) ); ?>';
        var iide_reload_delay = '<?php echo $reload_delay; ?>';
    </script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/clipboard.min.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/ResizeSensor.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/file-editor.min.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/contextMenu/jquery.contextMenu.min.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/splitter/jquery.splitter.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <?php if ( IIDE_ACTIVE_EDITOR == 'ace' ) { ?>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/ace/ace.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/ace/ext-language_tools.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo IIDE_URL; ?>assets/js/sweetalert2.all.min.js?ver=<?php echo IIDE_VERSION; ?>"></script>
    <?php
    if ( ! empty( $_GET['sitePreview'] ) ) {
    	?><script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#sub-menu-site-preview-open').click();
			});
    	</script><?php
    }
    ?>
</head>

<body class="instant-ide-loading instant-ide-<?php echo IIDE_ACTIVE_EDITOR; ?>-editor-active instant-ide-theme-dark">
    
<?php
