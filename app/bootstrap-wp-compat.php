<?php
/**
 * WP and PHP compatibility.
 *
 * Functions used to gracefully fail when a theme doesn't meet the minimum WP or
 * PHP versions required. Note that only code that will work on PHP 5.2.4 should
 * go into this file. Otherwise, it'll break on sites not meeting the minimum
 * PHP requirement. Only call this file after initially checking that the site
 * doesn't meet either the WP or PHP requirement.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

use function Backdrop\Theme\is_classicpress;

# Add actions to fail at certain points in the load process.
add_action( 'after_switch_theme', 'creativity_switch_theme' );

/**
 * Switches to the previously active theme after the theme has been activated.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $old_name  Previous theme name/slug.
 * @return void
 */
function creativity_switch_theme( $old_name ) {

	switch_theme( $old_name ? $old_name : WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'creativity_upgrade_notice' );
}

/**
 * Outputs an admin notice with the compatibility issue.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function creativity_upgrade_notice() {

	printf( '<div class="error"><p>%s</p></div>', esc_html( creativity_compat_message() ) );
}

/**
 * Returns the compatibility messaged based on whether the WP or PHP minimum
 * requirement wasn't met.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function creativity_compat_message(): string {

	if ( version_compare( $GLOBALS['wp_version'], $GLOBALS['wp_version'], '==' ) ) {
		return sprintf(
			// Translators: 1 is the required WordPress version and 2 is the user's current version.
			__( 'You are trying to install Creativity on a WordPress install. This theme does not support WordPress. Please migrate to ClassicPress version %1$s or higher!', 'creativity' ),
			'1.5.0'
		);
	}
}
