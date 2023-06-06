<?php
/**
 * Default functions template
 *
 * This file is used to bootstrap the theme.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

/** ------------------------------------------------------------------------------------------
 * Bootstrap the theme.
 * -------------------------------------------------------------------------------------------
 * Load the bootstrap files. Note that autoload should happen first so that any classes or
 * functions are available that we might need.
 */

require_once get_parent_theme_file_path( 'app/bootstrap-autoload.php' );
require_once get_parent_theme_file_path( 'app/framework.php' );

# ------------------------------------------------------------------------------
# Compatibility check.
# ------------------------------------------------------------------------------
#
# Check that the site meets the minimum requirements for the theme before
# proceeding if this is a theme for public release. If building for a client
# that meets these requirements, this code is unnecessary.

if ( true === Backdrop\Theme\is_classicpress() ) {
	if ( version_compare( classicpress_version(), '1.5.0', '<' ) || version_compare( PHP_VERSION, '7.1', '<' ) ) {

		require_once( get_parent_theme_file_path( 'app/bootstrap-compat.php' ) );
		return;
	}
} else {
	if ( version_compare( $GLOBALS['wp_version'], $GLOBALS['wp_version'], '==' ) ) {

		require_once get_parent_theme_file_path( 'app/bootstrap-wp-compat.php' );
	}
}


