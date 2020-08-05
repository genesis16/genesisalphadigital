# Instant IDE Change Log

https://cobaltapps.com/downloads/instant-ide-manager-plugin/

## [1.7.2] - 2020-07-18
### Changed
- Adjusted iide-constants.php code by adding NOT EMPTY checks on certain server constants to account for scenarios where iIDE is run from a command line.

## [1.7.1] - 2020-07-09
### Changed
- Replaced Community Forum "Help" links with the Cobalt Apps YouTube Channel and Cobalt Apps Support links.
- Updated Font Awesome style link to latest version.

## [1.7.0] - 2020-06-11
### Added
- Added Grav CMS to folder dropdown "Install" feature.
- Added "VS Code" to Ace Editor Keybindings option.
- Added "Nord Dark" Ace Editor theme.

### Changed
- Changed directory opening functionality from double click to single click.
- Updated Monaco Editor to latest version.
- Updated Ace Editor to latest version.

## [1.6.1] - 2019-07-31
### Changed
- Refined Instant IDE popup window styles.
- Tweaked console styles to allow for selecting console text for copy/paste.

### Fixed
- Fixed bug where renaming a selected file or folder can result in losing its selected status.
- Fixed bug where renaming a folder can result in similarly named open folders closing.
- Fixed bug where deleting folders can result in save state information not updating properly.
- Fixed bug where the open file reload feature was inconsistent.

## [1.6.0] - 2019-06-26
### Added
- Added "Properties" option to file/folder context menu for file/folder size and permissions info.
- Added tab size option to options (i.e.. 2 Spaces vs 4 Spaces).
- Added ability to unzip .gz (gZip) files.
- Added ability to compile SCSS/LESS code in /wp-content/uploads/ sub-directories (in addition to already being able to do so in themes/plugins sub-directories).
- Added iIDE Options, Window Resize Positions, and Site Preview URL to Save State.
- Added back/forward icons for Site Preview for better web browsing functionality.
- Added tablet view icons for both tablet and mobile in Site Preview.
- Added live-updating Site Preview dimensions.
- Added error handling for cases when files are being uploaded that exceed the server's set upload size limits.

### Changed
- Made it so the Site Preview window iFrame goes below 1300px when dragging it to a narrower size.
- Made it so that deleting a file/folder removed it as active in save state.

### Fixed
- Fixed issue where a renamed folder took several seconds to show up in the file tree.
- Fixed bug where double clicking a folder disabled the file-tree auto-refresh functionality.
- Fixed bug where the "File Changed" icon indicator would display on BOTH active tabs (when split editors were enabled), even when only one had changed (this happened only when Ace Editor was enabled).
- Fixed bug where an open file in iIDE that was deleted outside of iIDE would remain in iIDE as a "ghost" tab that could not be deleted.
- Fixed popup message typo in both iIDE and iIDE Manager.

## [1.5.0] - 2019-05-08
### Added
- Added real-time file tree refresh.
- Added Find & Replace in folder functionality.
- Added ability to dynamically drag/resize the different iIDE windows/panels.
- Added complete save state functionality, allowing you to retain the state of file tree, open files/tabs, console, site-preview, etc.. upon iIDE update and page refresh.
- Added new options, including Editor Font Size, Editor Font Family, and Save State On/Off.
- Added file tree icons to file tabs to make it even easier to quickly identify the type of file being edited.
- Added a file tab context menu option that reloads the file (closes it and then automatically reloads it).
- Added a file tab context menu option that moves tab/file back and forth between Split View panels.
- Added a file tree file context menu option that (Open Alt) that opens file in second Split View panel.
- Added FontAwesome icons to the various iIDE context menus.
- Added new Ace Editor Theme called "Dracula".
- Added ability to open .pdf files (they open in a new tab).
- Added title attribute to file editor tabs that reveal the file's relative path on hover.
- Added dark theme styling for Ace Editor search form when iIDE Dark Theme is enabled.
- Added dark theme styling for context menus.

### Changed
- Completely updated the file tree icons for a more current and cleaner look and feel.
- Made it so ALL of iIDE functionality is now available not matter what DEV Path you have set (including SCSS/LESS compiling).
- Made it so that folders now load as fast as the server and your browser allow, instead of using a set timeout period, resulting in greater speed and efficiency.
- Made it so that refreshing the Site Preview iFrame now reloads to the current page instead of going back to the homepage each time.
- Moved the dual editor (split view) option icon into the file editor context menu (gear icon).
- Updated contextMenu script to latest version.
- Updated all of the Editor Theme Option screenshots.

### Removed
- Removed iIDE window sm/md/lg size options because dynamic drag/resize functionality has been added.

### Fixed
- Fixed bug where the "SQL Server" Ace Editor Theme did not work due to incorrect file naming.

## [1.3.0] - 2019-03-27
### Added
- Added split view editor layout feature to make it so you can now view/work on two files at the same time.
- Added "Paths" menu item with 5 WP default paths and up to 5 custom paths for more efficient DEV Path switching.
- Added DEV Path Change Popup option to allow for automatic reloading of Instant IDE for more efficient DEV Path switching.
- Added "Help" menu item and popup with my account, community, docs, and support buttons.
- Added File > "Snippets" menu item which slides down a new "Snippets" box (in addition to Console > Snippets).
- Added ability to close popup menus by clicking outside them.
- Added functionality where SASS/LESS saves backup CSS file to empty SASS/LESS file first before regular compiling begins (this prevents initial wiping of CSS file).

### Changed
- Improved the sortable editor tab functionality so moving a tab now results in that tab becoming active.
- Updated the sweetalert2 script (the JS script responsible for the various popup messages) to the latest release.
- Tweaked popup menu close icons and styles.

### Fixed
- Fixed bug in build tools file check JS function where deleting root of dev path dir was breaking the UI JS.

## [1.2.2] - 2019-03-20
### Added
- Added the ability to change the default Ace Editor key bindings to Sublime, Emacs, and Vim.

## [1.2.1] - 2019-03-15
### Changed
- Refined the styling for the new Console Snippets menu to better accommodate the light theme styles.
- Changed the file attribute naming convention to prevent file name title popups from occurring when hovering over an open file.

## [1.2.0] - 2019-03-13
### Added
- Added SCSS PHP script to allow Instant IDE to compile .scss files without the need for tools like NodeJS and Gulp.
- Added LESS PHP script to allow Instant IDE to compile .less files without the need for tools like NodeJS and Gulp.
- Added build tool icons (e.g.. Gulp, SASS, LESS, etc..) to top of editor to indicate when ability to compile is currently enabled.
- Added Console Snippets feature to provide useful copy/paste examples when using the Console.

### Changed
- Updated Ace Editor script to latest version.
- Increased Ace Editor font size from 12px to 14px for better readability.
- Updated Font Awesome icons to version 5.

### Fixed
- Fixed folder download zipping so that root directory remains intact.

## [1.1.8] - 2019-02-25
### Added
- Added 1.5 second delay on Site Preview iFrame reload to better account for use of build tools like Gulp and Webpack.

### Changed
- Tweaked the console directory .htaccess file creation function to ensure that certain localhost setups do not throw 404 errors when trying to load the console itself.

### Removed
- Removed display: inline-block; from styles for selected list-items as this was causing other file manager styling issues.

### Fixed
- Fixed bug where empty files were unable to be opened.
- Fixed bug where unzip feature only resulted in one file or folder, even if multiples existed in the zip file.

## [1.1.7] - 2019-01-24
### Added
- Added current site URL to title tag to make it easier to identify multiple sites being edited in the same browser.

### Changed
- Updated both the Ace and Monaco Editors to their latest versions.

### Fixed
- Fixed file tree LI styling issue (added inline-block to CSS).
- Fixed bug where downloading a zip file resulted in a .zip.zip file extension.

## [1.1.6] - 2018-09-24
### Changed
- Removed the max-width editor style that was preventing the menu bar from displaying full width on wide displays.
- Increased the Ace Editor font size from 12px to 14px for better visibility.
- Removed obfuscated JS code from console template file that keeps getting flagged as malicious code.

## [1.1.5] - 2018-04-18
### Changed
- Changed obfuscated console script minification to more traditional minification to prevent triggering virus alerts from WP firewalls when iIDE Manager is installed.
- Wrapped HTTP_USER_AGENT in !empty() code to prevent potential PHP errors on certain server/firewall configurations.

## [1.1.4] - 2018-02-16
### Added
- Added custom PHP session handling to help ensure that iIDE sessions remain active for full duration of "Remember Me" cookie.

## [1.1.3] - 2018-01-26
### Added
- Added require_once for contstnat to top of logout file as some setups…

### Changed
- Tweaked the instant_ide_url function to more accurately detect the correct URL protocol.
- Required iIDE Constants file at the top of the logout.php file to prevent potential logout errors.

## [1.1.2] - 2018-01-20
### Added
- Added October CMS installation support.
- Added .yaml file support.

### Changed
- Refined the install CMS functionality.
- Made it so the Site Preview iFrame "Preview URL" acts more like an Address Bar so you can manually set the iFrame address.
- Refined the .htaccess file to whitelist iIDE folders.

### Fixed
- Fixed bug where Site Preview tablet and mobile icons were not functioning properly.

## [1.1.1] - 2018-01-17
### Added
- Add "Set As Dev Path" and "Reset Dev Path" folder context menu options.

### Changed
- Set Site Preview iFrame to a set min-width of 1300px and added horizontal scrolling.

### Fixed
- Fixed typo in Options popup regarding Monaco Editor theme select menu.

## [1.1.0] - 2018-01-01
### Added
- Added one-click WordPress install functionality.
- Added right-click "Preview Folder" feature.
- Added site preview url view feature.

### Changed
- Upgraded SweetAlert script (js-based message pop-up script) to SweetAlert2.
- Improved file/folder create/rename functionality by incorporating SweetAlert2 name input feature.
- Added Firefox-specific styles to place file-tree cog icon in more idea position for vertical scrollbar.

### Fixed
- Added constant defined check in footer code to prevent pre-install PHP errors.

## [1.0.3] - 2017-12-22
### Fixed
- Tweaked session cookie parameters so they remain compatible with sub-folder WordPress installs.

## [1.0.2] - 2017-12-18
### Added
- Added ability to unzip files through double-click event or right-click contextmenu event.
- Added "Delete zip file after unzip" conditional popup message.
- Added file upload progress bar.

### Changed
- Added 'zip' file-type to file browser list-items for more precise double-click events.

### Fixed
- Fixed "file edited" tab icon spacing so it does not get pushed down when displayed.
- Fixed bug where duplicated and pasted/dropped files are not always properly identified for double-click events.

## [1.0.1] - 2017-12-15
### Changed
- Tweaked file tree HTML and CSS to "fix" file tree cog icon in place.
- Changed jQuery UI draggable "delay" code over to "distance" for better accidental drag prevention.

## [1.0.0] - 2017-12-12
### Added
- Initial release.


## Template for future logs. ##

## [9.0.0] - 2032-01-28
### Added
- Add example text.

### Changed
- Improve example text.

### Removed
- Remove example text.

### Fixed
- Fix example text.
