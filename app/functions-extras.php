<?php
/**
 * Default extras template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

/**
 * Changes the theme template path to the `public/views` folder.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
add_filter( 'backdrop/template/path', function() {

	return 'public/views';
} );

/**
 * Registers custom templates with ClassicPress.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $templates
 * @return void
 */
add_action( 'backdrop/templates/register', function( $templates ) {

	if ( class_exists( BSP\Portfolio\Provider::class ) ) {
		$templates->add( 'template-home.php', [
			'label' => esc_html__( 'Home', 'creativity' )
		] );
	}

	$templates->add( 'template-left-sidebar.php', [
		'label' => esc_html__( 'Left Sidebar', 'creativity' )
	] );

	$templates->add( 'template-right-sidebar.php', [
		'label' => esc_html__( 'Right Sidebar', 'creativity' )
	] );

	$templates->add( 'template-custom-sidebar.php', [
		'label' => esc_html__( 'Custom Sidebar', 'creativity' )
	] );
} );
