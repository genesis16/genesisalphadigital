<?php
/*
 * Build the File Editor functions.
 */
 
/**
 * Build the file editor menu.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_menu() {

?>
    <div id="instant-ide-file-editor-menu">
        <ul>
            <li>
                <span class="menu-heading-text">
                    <img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Instant IDE
                </span>
                <ul class="sub-menu">
                	<li id="sub-menu-add-users">Add Users</li>
                	<li id="sub-menu-delete-users">Delete Users</li>
                	<li id="sub-menu-visit-home">Visit Site Home</li>
                    <li id="sub-menu-logout">Logout</li>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text">File</span>
                <ul class="sub-menu">
                	<li id="sub-menu-open">Open Selected File</li>
    	            <li id="sub-menu-save">Save (cmd/ctrl+s)</li>
    	            <li id="sub-menu-file-snippets" class="sub-menu-snippets">Snippets</li>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text">Console</span>
                <ul class="sub-menu">
    	            <li id="sub-menu-console-open">Open</li>
    	            <li id="sub-menu-console-close">Close</li>
    	            <li id="sub-menu-console-restart">Restart</li>
    	            <li id="sub-menu-console-snippets" class="sub-menu-snippets">Snippets</li>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text">Site Preview</span>
                <ul class="sub-menu">
    	            <li id="sub-menu-site-preview-open">Open</li>
    	            <li id="sub-menu-site-preview-close">Close</li>
    	            <li id="sub-menu-site-preview-restart">Restart</li>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text">Paths</span>
                <ul class="sub-menu sub-menu-paths">
                	<?php if ( file_exists( PLATFORM_DIR . '/wp-content' ) ) { ?>
                	<li id="sub-menu-paths-root" menu-dev-path="/wp-content/themes">WordPress: Themes</li>
                	<li id="sub-menu-paths-root" menu-dev-path="/wp-content/plugins">WordPress: Plugins</li>
                	<li id="sub-menu-paths-root" menu-dev-path="/wp-content/uploads">WordPress: Uploads</li>
                	<li id="sub-menu-paths-root" menu-dev-path="/wp-content">WordPress: WP Content</li>
    	            <li id="sub-menu-paths-root" menu-dev-path="">WordPress: Root</li>
    	            <?php } else { ?>
    	            <li id="sub-menu-paths-root" menu-dev-path="">Site Root</li>
    	            <?php } ?>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text">Options</span>
                <ul class="sub-menu">
    	            <li id="sub-menu-options-open">Open</li>
    	            <li id="sub-menu-options-close">Close</li>
    	            <li id="sub-menu-options-reset">Reset</li>
                </ul>
            </li>
            <li>
                <span class="menu-heading-text menu-heading-help menu-item-popup">Help</span>
            </li>
        </ul>
        <img class="instant-ide-ajax-save-spinner" src="<?php echo IIDE_URL; ?>assets/css/images/ajax-save-in-progress.gif" />
        <span class="instant-ide-saved"></span>
        <span class="instant-ide-version-display"><?php echo IIDE_VERSION; ?></span>
        <span class="instant-ide-site-preview-icons-container" style="display:none;">
        	<span id="instant-ide-site-preview-icons-url-view">
            	<span id="instant-ide-site-preview-icons-back"><i class="fas fa-arrow-left" aria-hidden="true" title="Back"></i></span>
            	<span id="instant-ide-site-preview-icons-forward"><i class="fas fa-arrow-right" aria-hidden="true" title="Forward"></i></span>
            	<span id="instant-ide-site-preview-icons-refresh"><i class="fas fa-sync-alt" aria-hidden="true" title="Refresh"></i></span>
        	    <span id="instant-ide-site-preview-icons-url-view-url"></span></span>
        	<span id="instant-ide-site-preview-icons-desktop"><i class="fas fa-desktop" aria-hidden="true" title="100x100"></i></span>
        	<span id="instant-ide-site-preview-icons-tablet"><i class="fas fa-tablet-alt" aria-hidden="true" title="720x1080"></i></span>
        	<span id="instant-ide-site-preview-icons-tablet-landscape"><i class="fas fa-tablet-alt fa-rotate-90" aria-hidden="true" title="1080x720"></i></span>
        	<span id="instant-ide-site-preview-icons-mobile"><i class="fas fa-mobile-alt" aria-hidden="true" title="320x480"></i></span>
        	<span id="instant-ide-site-preview-icons-mobile-landscape"><i class="fas fa-mobile-alt fa-rotate-90" aria-hidden="true" title="480x320"></i></span>
        	<span id="instant-ide-site-preview-icons-popout"><i class="fas fa-external-link-alt" aria-hidden="true" title="Open In New Window"></i></span>
        	<span id="instant-ide-site-preview-size-indicator"></span>
        </span>
        <span class="instant-ide-build-tool-icons-container" style="display:none;">
        	<i class="fab fa-npm" style="display:none;"></i>
        	<i class="fab fa-gulp" style="display:none;"></i>
        	<i class="fab fa-sass" style="display:none;"></i>
        	<i class="fab fa-less" style="display:none;"></i>
        </span>
    </div>
<?php
	
}

/**
 * Build the file editor upload form overlay.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_upload_form() {

?>
    <div id="instant-ide-file-editor-upload-form-overlay" style="display:none;"></div>
    <div id="instant-ide-file-editor-upload-form-container" class="instant-ide-menu-popup-container" style="display:none;">
        <form id="instant-ide-file-editor-upload-form" action="/" method="POST">
            <i class="fas fa-window-close" aria-hidden="true"></i>
            <div id="instant-ide-file-upload-wrap">
                <p>Select file to upload: <input type="file" id="instant-ide-file-upload" name="uploads[]" multiple=""/></p>
            </div>
            <button id="instant-ide-upload-button" type="submit">Upload</button>
            <img class="instant-ide-ajax-save-spinner" src="<?php echo IIDE_URL; ?>assets/css/images/ajax-save-in-progress.gif" />
            <div id="instant-ide-file-upload-progress"></div>
        </form>
    </div>
<?php
	
}

/**
 * Build the file editor download form overlay.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_download_form() {
    
    ?><a id="instant-ide-file-editor-download-link" href="" style="display:none;" download></a><?php
	
}

/**
 * Build the file editor image view overlay.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_image_view() {

?>
    <div id="instant-ide-file-editor-image-view-overlay" style="display:none;"></div>
    <div id="instant-ide-file-editor-image-view-container" class="instant-ide-menu-popup-container" style="display:none;">
        <div id="instant-ide-file-editor-image-view">
            <h3><code id="instant-ide-image-view-info-name"></code></h3>
			<p id="instant-ide-file-editor-image-view-info">
				<span>
				    Width: <code id="instant-ide-image-view-info-width"></code>
				    Height: <code id="instant-ide-image-view-info-height"></code>
				</span>
				<span>
				    File Size: <code id="instant-ide-image-view-info-size"></code>
				</span>
				<span>
				    <a id="instant-ide-image-view-info-link" href="" target="_blank"><i class="fas fa-link" aria-hidden="true"></i></a>
				</span>
			</p>
			<div id="instant-ide-image-file-preview">
				<img src="">
			</div>
        </div>
    </div>
<?php
	
}

/**
 * Build the file editor file snippets slide-down.
 *
 * @since 1.2.0
 */
function instant_ide_file_editor_file_snippets() {

?>
    <div id="instant-ide-file-editor-file-snippets-container" class="instant-ide-file-editor-snippets-container" style="display:none;">
        <div id="instant-ide-file-editor-file-snippets" class="instant-ide-file-editor-snippets">
            <i class="fas fa-angle-double-up instant-ide-file-editor-snippets-close" aria-hidden="true"></i>
            <h3>File Copy/Paste Snippets</h3>
			<div id="instant-ide-file-snippets-list" class="instant-ide-snippets-list">
				<span>Cobalt SASS Config File:</span>
				<code id="cobalt-sass-config-file">cobalt-scss.json</code><button class="snippet-copy-button" data-clipboard-target="#cobalt-sass-config-file"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<textarea id="cobalt-sass-config" rows="5"><?php echo instant_ide_file_editor_file_snippets_code( 'cobalt-sass-config' ); ?></textarea><button class="snippet-copy-button" data-clipboard-target="#cobalt-sass-config"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Cobalt LESS Config File:</span>
				<code id="cobalt-less-config-file">cobalt-less.json</code><button class="snippet-copy-button" data-clipboard-target="#cobalt-less-config-file"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<textarea id="cobalt-less-config" rows="5"><?php echo instant_ide_file_editor_file_snippets_code( 'cobalt-less-config' ); ?></textarea><button class="snippet-copy-button" data-clipboard-target="#cobalt-less-config"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Gulp Config File:</span>
				<code id="gulpfile-babel-config-file">gulpfile.babel.js</code><button class="snippet-copy-button" data-clipboard-target="#gulpfile-babel-config-file"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<textarea id="gulpfile-babel-config" rows="5"><?php echo instant_ide_file_editor_file_snippets_code( 'gulpfile-babel-config' ); ?></textarea><button class="snippet-copy-button" data-clipboard-target="#gulpfile-babel-config"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Babel Config File:</span>
				<code id="babel-rc-config-file">.babelrc</code><button class="snippet-copy-button" data-clipboard-target="#babel-rc-config-file"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<textarea id="babel-rc-config" rows="5"><?php echo instant_ide_file_editor_file_snippets_code( 'babel-rc-config' ); ?></textarea><button class="snippet-copy-button" data-clipboard-target="#babel-rc-config"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
			</div>
        </div>
    </div>
<?php
	
}

/**
 * Build an array of File Snippets.
 *
 * @since 1.2.0
 * @return an array of File Snippets.
 */
function instant_ide_file_editor_file_snippets_code( $snippet ) {
	
	$cobalt_sass_config = '{
    "Primary Styles" : {
        "Import Path": "/scss/",
        "Formatter": "Expanded",
        "PreCSS File Path": "/scss/style.scss",
        "CSS File Path": "/style.css",
        "PreCSS Images Path": "/scss/images/",
        "CSS Images Path": "/images/",
        "Images Sync Type": "update"
    }
}';

	$cobalt_less_config = '{
    "Primary Styles" : {
        "Import Path": "/less/",
        "Formatter": "Expanded",
        "PreCSS File Path": "/less/style.less",
        "CSS File Path": "/style.css",
        "PreCSS Images Path": "/less/images/",
        "CSS Images Path": "/images/",
        "Images Sync Type": "update"
    }
}';

	$gulpfile_babel_config = "import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import zip from 'gulp-zip';
import info from './package.json';
import wpPot from 'gulp-wp-pot';
const PRODUCTION = yargs.argv.prod;

export const styles = () => {
  return src('src/scss/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
}

export const scripts = () => {
  return src('src/js/scripts.js')
    .pipe(named())
    .pipe(webpack({
      module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: '[name].js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest('dist/js'));
}

export const images = () => {
  return src('src/scss/images/**/*.{jpg,jpeg,png,svg,gif,ico}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/css/images'));
}

export const copy = () => {
  return src(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'])
    .pipe(dest('dist'));
}

export const clean = () => del(['dist']);
export const clean_images = () => del(['dist/css/images']);

export const watchForChanges = () => {
  watch('src/scss/partials/**/*.scss', styles);
  watch('src/scss/images/**/*.{jpg,jpeg,png,svg,gif,ico}', series(clean_images, images));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], copy);
  watch('src/js/**/*.js', scripts);
}

export const compress = () => {
return src([
  '**/*',
  '!node_modules{,/**}',
  '!bundled{,/**}',
  '!src{,/**}',
  '!.babelrc',
  '!.gitignore',
  '!gulpfile.babel.js',
  '!package.json',
  '!package-lock.json',
  ])
  .pipe(zip(`\${info.name}.zip`))
  .pipe(dest('bundled'));
};

export const pot = () => {
  return src('**/*.php')
  .pipe(
      wpPot({
        domain: '_themename',
        package: info.name
      })
    )
  .pipe(dest(`languages/\${info.name}.pot`));
};

export const dev = series(clean, parallel(styles, images, copy, scripts), watchForChanges);
export const build = series(clean, parallel(styles, images, copy, scripts), pot, compress);
export default dev;";

	$babel_rc_config = '{
  "presets": ["@babel/preset-env"]
}';
	
	$snippets = array(
					'cobalt-sass-config' => $cobalt_sass_config,
					'cobalt-less-config' => $cobalt_less_config,
					'gulpfile-babel-config' => $gulpfile_babel_config,
					'babel-rc-config' => $babel_rc_config,
				);
				
	return $snippets[$snippet];
	
}

/**
 * Build the file editor console snippets slide-down.
 *
 * @since 1.2.0
 */
function instant_ide_file_editor_console_snippets() {

?>
    <div id="instant-ide-file-editor-console-snippets-container" class="instant-ide-file-editor-snippets-container" style="display:none;">
        <div id="instant-ide-file-editor-console-snippets" class="instant-ide-file-editor-snippets">
            <i class="fas fa-angle-double-up instant-ide-file-editor-snippets-close" aria-hidden="true"></i>
            <h3>Console Copy/Paste Snippets</h3>
			<div id="instant-ide-console-snippets-list" class="instant-ide-snippets-list">
				<span>Prepare First Time Gulp Setup file for execution:</span> <code id="chmod-gulp-first-time-setup">chmod +x gulp-first-time-setup.sh</code><button class="snippet-copy-button" data-clipboard-target="#chmod-gulp-first-time-setup"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Execute First Time Gulp Setup file:</span> <code id="run-gulp-first-time-setup">./gulp-first-time-setup.sh</code><button class="snippet-copy-button" data-clipboard-target="#run-gulp-first-time-setup"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Prepare Gulp Setup file for execution:</span> <code id="chmod-gulp-setup">chmod +x gulp-setup.sh</code><button class="snippet-copy-button" data-clipboard-target="#chmod-gulp-setup"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Execute Gulp Setup file:</span> <code id="run-gulp-setup">./gulp-setup.sh</code><button class="snippet-copy-button" data-clipboard-target="#run-gulp-setup"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Run Gulp file:</span> <code id="run-gulp">gulp</code><button class="snippet-copy-button" data-clipboard-target="#run-gulp"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>End Gulp process:</span> <code id="end-gulp">pkill gulp</code><button class="snippet-copy-button" data-clipboard-target="#end-gulp"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Run Gulp Build to build and zip final product:</span> <code id="run-gulp-build-production">gulp build --prod</code><button class="snippet-copy-button" data-clipboard-target="#run-gulp-build-production"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Make dist folder writable:</span> <code id="chown-dist-folder">sudo chown -R www-data:www-data dist</code><button class="snippet-copy-button" data-clipboard-target="#chown-dist-folder"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Make node_modules folder writable:</span> <code id="chown-node-modules-folder">sudo chown -R www-data:www-data node_modules</code><button class="snippet-copy-button" data-clipboard-target="#chown-node-modules-folder"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
				<span>Make package.json file writable:</span> <code id="chown-package-json-file">sudo chown -R www-data:www-data package.json</code><button class="snippet-copy-button" data-clipboard-target="#chown-package-json-file"><i title="Copy To Clipboard" class="fas fa-copy"></i></button>
			</div>
        </div>
    </div>
<?php
	
}

/**
 * Build the file editor options overlay.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_options() {

?>
    <div id="instant-ide-file-editor-options-overlay" style="display:none;"></div>
    <div id="instant-ide-file-editor-options-container" class="instant-ide-menu-popup-container" style="display:none;">
        <div id="instant-ide-file-editor-options">
			<div id="instant-ide-file-editor-options-dev-path" class="instant-ide-option">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />DEV Path: </span>
                <input id="instant-ide-dev-path" type="text" name="dev_path">
			</div>
			<div id="instant-ide-file-editor-options-path-change-popup" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Path Change Action: </span>
                <div class="instant-ide-custom-select" style="width:140px;">
                    <select id="instant-ide-path-change-popup" class="instant-ide-settings-select-menu" name="instant-ide-path-change-popup" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_path_change_action_array(), 'auto-reload' ); ?>
                    </select>
                </div>
			</div>
			<div id="instant-ide-file-editor-options-save-state" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />iDE Save State: </span>
                <div class="instant-ide-custom-select" style="width:115px;">
                    <select id="instant-ide-save-state" class="instant-ide-settings-select-menu" name="instant-ide-save-state" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_save_state_array(), 'enabled' ); ?>
                    </select>
                </div>
			</div>
			<div id="instant-ide-file-editor-options-iide-theme" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Instant IDE Theme: </span>
                <input type="radio" name="iide_theme" value="light"> <span>Light</span>
                <input type="radio" name="iide_theme" value="dark"> <span>Dark</span>
			</div>
			<div id="instant-ide-file-editor-options-tab-size" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Editor Tab Size: </span>
                <div class="instant-ide-custom-select" style="width:100px;">
                    <select id="instant-ide-tab-size" class="instant-ide-settings-select-menu" name="instant-ide-tab-size" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_tab_size_array(), '4' ); ?>
                    </select>
                </div>
			</div>
			<div id="instant-ide-file-editor-options-font-size" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Editor Font Size: </span>
                <div class="instant-ide-custom-select" style="width:70px;">
                    <select id="instant-ide-font-size" class="instant-ide-settings-select-menu" name="instant-ide-font-size" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_font_size_array(), '14' ); ?>
                    </select>
                </div>
			</div>
			<div id="instant-ide-file-editor-options-font-family" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Editor Font Family: </span>
                <div class="instant-ide-custom-select" style="width:145px;">
                    <select id="instant-ide-font-family" class="instant-ide-settings-select-menu" name="instant-ide-font-family" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_font_family_array(), 'monospace' ); ?>
                    </select>
                </div>
			</div>
			<div id="instant-ide-file-editor-options-active-editor" class="instant-ide-option instant-ide-col-two">
				<span><img class="instant-ide-menu-logo" width="16" height="24" src="<?php echo IIDE_URL; ?>assets/css/images/instant-ide-menu-logo.png" />Active Editor: </span>
                <div class="instant-ide-custom-select" style="width:130px;">
                    <select id="instant-ide-active-editor" class="instant-ide-settings-select-menu" name="instant-ide-active-editor" size="1">
                        <?php instant_ide_build_select_menu_options( instant_ide_active_file_editor_array(), 'monaco' ); ?>
                    </select>
                </div>
			</div>
			<?php if ( IIDE_ACTIVE_EDITOR == 'monaco' ) { ?>
				<div id="instant-ide-file-editor-options-monaco-editor-theme" class="instant-ide-option instant-ide-col-two">
					<span><img class="monaco-editor-options-icon" width="17" height="17" src="<?php echo IIDE_URL; ?>assets/css/images/vs-logo.png" />Editor Theme: </span>
                    <div class="instant-ide-custom-select" style="width:185px;">
                        <select id="instant-ide-monaco-editor-theme" class="instant-ide-settings-select-menu" name="instant-ide-monaco-editor-theme" size="1">
                            <?php instant_ide_build_select_menu_options( instant_ide_monaco_editor_themes_array(), 'tomorrow-night-iide' ); ?>
                        </select>
                    </div>
				</div>
				<div id="instant-ide-monaco-editor-theme-preview" class="instant-ide-option">
					<img src="<?php echo IIDE_URL; ?>assets/css/images/monaco-themes/placeholder.png">
				</div>
			<?php } else  { ?>
				<div id="instant-ide-file-editor-options-ace-editor-key-bindings" class="instant-ide-option instant-ide-col-two">
					<span><img class="ace-editor-options-icon" width="26" height="17" src="<?php echo IIDE_URL; ?>assets/css/images/ace-editor-icon.png" />Editor Key Bindings: </span>
                    <div class="instant-ide-custom-select" style="width:90px;">
                        <select id="instant-ide-ace-editor-key-bindings" class="instant-ide-settings-select-menu" name="instant-ide-ace-editor-key-bindings" size="1">
                            <?php instant_ide_build_select_menu_options( instant_ide_ace_editor_key_bindings_array(), 'ace' ); ?>
                        </select>
                    </div>
				</div>
				<div id="instant-ide-file-editor-options-ace-editor-theme" class="instant-ide-option instant-ide-col-two">
					<span><img class="ace-editor-options-icon" width="26" height="17" src="<?php echo IIDE_URL; ?>assets/css/images/ace-editor-icon.png" />Editor Theme: </span>
                    <div class="instant-ide-custom-select" style="width:190px;">
                        <select id="instant-ide-ace-editor-theme" class="instant-ide-settings-select-menu" name="instant-ide-ace-editor-theme" size="1">
                            <?php instant_ide_build_select_menu_options( instant_ide_ace_editor_themes_array(), 'tomorrow-night-eighties' ); ?>
                        </select>
                    </div>
				</div>
				<div id="instant-ide-ace-editor-theme-preview" class="instant-ide-option">
					<img src="<?php echo IIDE_URL; ?>assets/css/images/ace-themes/placeholder.png">
				</div>
			<?php } ?>
        </div>
    </div>
<?php
	
}

/**
 * Build the file editor help overlay.
 *
 * @since 1.3.0
 */
function instant_ide_file_editor_help() {

?>
    <div id="instant-ide-help-overlay" style="display:none;"></div>
    <div id="instant-ide-help-container" class="instant-ide-menu-popup-container" style="display:none;">
        <div id="instant-ide-help-content">
            <h3>
                Instant IDE Support & Resources
            </h3>
            <div class="instant-ide-grid-wrap">
                <a href="https://docs.cobaltapps.com/collection/405-instant-ide" target="_blank">
                    <i class="fas fa-book"></i> Docs
                </a>
                <a href="https://cobaltapps.com/youtube/" target="_blank">
                    <i class="fab fa-youtube"></i> Tutorials
                </a>
                <a href="https://cobaltapps.com/my-account/" target="_blank">
                    <i class="fas fa-user-circle"></i> My Account
                </a>
                <a href="https://cobaltapps.com/my-account/#support-requests" target="_blank">
                    <i class="fas fa-life-ring"></i> Support
                </a>
            </div>
        </div>
    </div>
<?php
	
}

/**
 * Build a file tree based on a specified directory.
 *
 * @since 1.0.0
 * @return a file tree based on a specified directory.
 */
function instant_ide_file_tree( $directory ) {

	if ( substr( $directory, -1 ) == '/' )
		$directory = substr( $directory, 0, strlen( $directory ) - 1 );

	$code = instant_ide_file_tree_dir( $directory );
	
	return $code;
	
}

/**
 * Recursively list directories/files based on a specified directory.
 *
 * @since 1.0.0
 * @return a list directories/files based on a specified directory.
 */
function instant_ide_file_tree_dir( $directory, $auto_open = false ) {
	
	// Get and sort directories and files.
	if ( ! is_dir( $directory ) )
		return '<ul id="instant-ide-dev-path-error"><li><strong style="color:red;">Error:</strong> The current DEV Path is not a valid directory.</li></ul>';

    require_once( dirname( __DIR__ ) . '/opened-dirs.php' );
    $opened_dirs = explode( ',', IIDE_OPENED_DIRS );
    require_once( dirname( __DIR__ ) . '/open-dirs.php' );
    $open_dirs = explode( ',', IIDE_OPEN_DIRS );
	
	$file = scandir( $directory );
	natcasesort( $file );
	$files = $dirs = array();
	foreach( $file as $this_file ) {
		
		if ( is_dir( $directory . '/' . $this_file ) && $directory . '/' . $this_file != PLATFORM_DIR . '/' . IIDE_DIR_NAME )
			$dirs[] = $this_file;
		elseif ( ! is_dir( $directory . '/' . $this_file ) )
			$files[] = $this_file;
		
	}
	$file = array_merge( $dirs, $files );
	$file_tree = '';
	
	if ( count( $file ) > 2 ) { // Use 2 instead of 0 to account for . and .. "directories"
	
		$platform_name = substr( instant_ide_get_platform_folder_name(), strrpos( instant_ide_get_platform_folder_name(), '/' ) );

		foreach( $file as $this_file ) {
		    
		    if ( $this_file != '.' && $this_file != '..' ) {
		        
		        if ( substr( $this_file, 0, 1 ) == '.' )
		            $hidden_class = ' iideft-hidden';
		        else
		            $hidden_class = '';
				
				if ( is_dir( $directory . '/' . $this_file ) ) {
                    
                    $dir_full_path = substr( $directory . '/' . $this_file, strlen( PLATFORM_DIR ) );
                    $dir_rel_path = substr( $directory . '/' . $this_file, strlen( PLATFORM_DIR_DEV_PATH ) );
                    $dir_unique_id = str_replace( array( '/', ' ', '.' ), '-', $dir_rel_path );
                    $opened_dir = false;
                    $open_dir = false;

                    foreach( $opened_dirs as $key ) {

                        if ( '/' . $key == $dir_rel_path )
                            $opened_dir = true;

                    }

                    foreach( $open_dirs as $key ) {

                        if ( '/' . $key == $dir_rel_path )
                            $open_dir = true;

                    }

                    if ( false != $auto_open ) {
                        $opened_dir = true;
                        $open_dir = true;
                    }

                    if ( false != $open_dir ) {

                        $open_dir_class = ' iideft-directory-open';
                        $open_dir_icon_class = 'fa fa-caret-down';
                        $open_dir_ul_display = '';

                    } else {

                        $open_dir_class = '';
                        $open_dir_icon_class = 'fas fa-caret-right';
                        $open_dir_ul_display = ' style="display: none;"';
                        
                    }

                    if ( false != $opened_dir )
					    $file_tree .= '<li id="iideft-directory' . $dir_unique_id . '" class="iideft-directory' . $hidden_class . '" data-file-name="' . $this_file . '" data-full-path="' . $dir_full_path . '" data-rel-path="' . $dir_rel_path . '"><i class="' . $open_dir_icon_class . ' iideft-directory-icon" aria-hidden="true"></i><a href="#" class="iideft-directory-opened' . $open_dir_class . '">' . htmlspecialchars( $this_file ) . '</a><ul' . $open_dir_ul_display . '>' . instant_ide_file_tree_dir( $directory . '/' . $this_file ) . '</ul></li>';
					else
					    $file_tree .= '<li id="iideft-directory' . $dir_unique_id . '" class="iideft-directory' . $hidden_class . '" data-file-name="' . $this_file . '" data-full-path="' . $dir_full_path . '" data-rel-path="' . $dir_rel_path . '"><i class="fas fa-caret-right iideft-directory-icon" aria-hidden="true"></i><a href="#">' . htmlspecialchars( $this_file ) . '</a><ul style="display: none;"></ul></li>';
					
				} else {

                    $supported_image_ext_array = array( 'gif', 'jpg', 'jpeg', 'png', 'svg', 'swf', 'psd', 'bmp', 'tiff', 'ico' );
					$file_ext = substr( $this_file, strrpos( $this_file, '.' ) + 1 );
					$ext = 'ext-' . $file_ext;
						
					if ( in_array( $file_ext, $supported_image_ext_array ) )
						$file_edit_class = 'iideft-file-image ';
					elseif ( $file_ext == 'zip' || $file_ext == 'gz' )
						$file_edit_class = 'iideft-file-zip ';
					elseif ( $file_ext == 'pdf' )
						$file_edit_class = 'iideft-file-pdf ';
					else
						$file_edit_class = 'iideft-file-edit ';

					$file_tree .= '<li class="iideft-file ' . $file_edit_class . strtolower( $ext ) . $hidden_class . '" data-file-name="' . $this_file . '"><a href=#><i class="iideft-file-icon" aria-hidden="true"></i>' . htmlspecialchars( $this_file ) . '</a></li>';
						
				}
				
			}
			
		}

	}
	
	/*$build_tool_files = array( 'package.json', 'gulpfile.js', 'gulpfile.babel.js', 'cobalt-scss.json', 'cobalt-less.json' );
	$dev_path_root_files = instant_ide_get_file_names( PLATFORM_DIR_DEV_PATH );
	$build_tools_data = '';
	
	foreach( $build_tool_files as $key ) {
		
		if ( in_array( $key, $dev_path_root_files ) )
			$build_tools_data .= $key . ' ';
		
	}
	
	return $file_tree . '<span class="iideft-available-build-tools" build-tools="' . $build_tools_data . '" style="display:none;"></span>';*/

	return $file_tree;
	
}

/**
 * Build the file editor console iFrame.
 *
 * @since 1.0.0
 */
function instant_ide_file_editor_console() {
	
	// Include the console configuration file.
	if ( file_exists( IIDE_DIR . '/console/includes/console-config.php' ) )
		require_once( IIDE_DIR . '/console/includes/console-config.php' );
    
    $console_file = instant_ide_get_console_file( IIDE_DIR . '/console' );
?>
    <div id="instant-ide-file-editor-console-container" class="instant-ide-console-find-window">
        <script type="text/javascript">
            var console_iframe = '<iframe id="instant-ide-file-editor-console" src="<?php echo IIDE_URL; ?>console/<?php echo $console_file; ?>?<?php echo IIDE_NL_CON_PASS; ?>"></iframe>';
        </script>
    </div>
<?php
	
}

/**
 * Build the site preview iFrame.
 *
 * @since 1.0.0
 */
function instant_ide_site_preview() {
    
?>
    <div id="instant-ide-site-preview-container"></div>
<?php
	
}

/**
 * Build the find window.
 *
 * @since 1.5.0
 */
function instant_ide_find_window() {

?>
    <div id="instant-ide-find-window-container" class="instant-ide-console-find-window">
        <div class="instant-ide-console-find-window-overlay"></div>
        <div id="instant-ide-find-window">
            <div id="instant-ide-find-window-form-container">
                <span id="instant-ide-find-directory"></span>
                <div id="instant-ide-find-window-regex-button-container">
                    <button id="instant-ide-find-window-match-case" class="instant-ide-find-window-regex-button instant-ide-find-window-regex-button-active" title="Match Case">Aa</button>
                    <button id="instant-ide-find-window-whole-word" class="instant-ide-find-window-regex-button" title="Whole Word">" "</button>
                </div>
                <form id="instant-ide-find-window-form" action="/" method="POST">
                    <div id="instant-ide-file-find-wrap">
                        <button id="instant-ide-find-button" type="submit">Find In Folder</button>
                        <input id="instant-ide-find-menu" type="text" name="find_menu">
                    </div>
                </form>
                <form id="instant-ide-replace-window-form" action="/" method="POST">
                    <div id="instant-ide-file-replace-wrap">
                        <input id="instant-ide-replace-menu" type="text" name="replace_menu">
                        <button id="instant-ide-replace-button" type="submit">Replace With</button>
                        <img class="instant-ide-ajax-save-spinner" src="<?php echo IIDE_URL; ?>assets/css/images/ajax-save-in-progress.gif" />
                    </div>
                </form>
                <i class="fas fa-window-close" aria-hidden="true"></i>
            </div>
            <div id="instant-ide-find-window-html"></div>
        </div>
    </div>
<?php
	
}
