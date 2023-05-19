<?php
/**
 * Default theme setup.
 *
 * This is where all the add_theme_support(); will happen.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity;

/**
 * Set up theme support.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

add_action( 'after_setup_theme', function() {

	// Set the theme content width.
	$GLOBALS['content_width'] = 640;

	// Load theme translations.
	load_theme_textdomain( 'creativity', get_parent_theme_file_path( 'public/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Outputs HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );
}, 5 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary' => esc_html__( 'Primary Navigation', 'creativity' )
	] );

}, 5 );
