<?php
/**
 * Default scripts functions
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity;

use function Backdrop\Mix\asset;
use Creativity\Template\ErrorPage;
use Creativity\Settings\Options;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */

add_action( 'wp_enqueue_scripts', function() {

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'creativity-screen', asset( 'assets/css/screen.css' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'creativity-app', asset( 'assets/js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'generosity-navigation', asset( 'assets/js/navigation.js' ), null, null, true );
	wp_localize_script( 'generosity-navigation', 'creativityScreenReaderText', [
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'creativity' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'creativity' ) . '</span>',
	] );

	// Loads ClassicPress' comment-reply script where appropriate.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_action('wp_enqueue_scripts', function() {

	$custom_image = esc_url( get_theme_mod( 'custom_image', get_theme_file_uri( '/public/images/header-image.jpg' ) ) );
	$avatar_image = esc_url( get_theme_mod( 'custom_avatar', get_theme_file_uri( '/public/images/avatar.jpg' ) ) );

	$custom_css = "
			.header-image {
				background: url({$custom_image});
				background-size: cover !important;
				box-sizing: border-box;
				padding: 8rem 0;
			}

			.header-image .header-image-title {
				color: #ffffff;
				font-size: 3rem;
				margin: 0;
				padding: 0;
				text-align: center;
			}

			.header-image .header-description {
				line-height: 1.8rem;
				color: #ffffff;
				margin: 0 auto;
				max-width: 768px;
				text-align: center;
			}

			.header-image .header-image-metadata {
				color: #ffffff;
				font-family: Tangerine;
				font-size: 1.8rem;
				text-align: center;
			}
		";
	wp_add_inline_style( 'creativity-screen', $custom_css );
}
);

/**
 * Adds error data for the 404 content template. Passes in the `ErrorPage` object
 * as the `$error` variable.
 *
 * @since  1.0.0
 * @access public
 * @param  Backdrop\Tools\Collection  $data
 * @return Backdrop\Tools\Collection
 */
add_filter( 'backdrop/template/view/content/data', function( $data ) {

	if ( is_404() ) {
		$data->add( 'error', new ErrorPage() );
	}

	return $data;

} );

/**
 * Filters the post states on the manage pages screen. Adds a "404 Page" state
 * to show users which page has been assigned as their 404 page.
 *
 * @since  1.0.0
 * @access public
 * @param  array    $states
 * @param  \WP_Post $post
 * @return array
 */
add_filter( 'display_post_states', function( $states, $post ) {

	if ( 'page' === $post->post_type && $post->ID === absint( Options::get( 'error_page' ) ) ) {
		$states['creativity_error_404'] = __( '404 Page', 'creativity' );
	}

	return $states;

}, 10, 2 );