<?php
/**
 * Default custom home template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014-2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
$home_display = get_theme_mod( 'home_display' );
$portfolio_display = get_theme_mod( 'portfolio_display' );
$blog_display      = get_theme_mod( 'blog_display' );

if ( 0 != $home_display && isset( $home_display ) ) {
	Backdrop\View\display( 'content/section/header' );
}

if ( 0 != $portfolio_display && isset( $portfolio_display ) ) {
Backdrop\View\display( 'content/section/portfolio' );
}

if ( 0 != $blog_display && isset( $blog_display ) ) {
Backdrop\View\display( 'content/section/blog' );
}
