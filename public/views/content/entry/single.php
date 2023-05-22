<?php
/**
 * Default page/default template
 *
 * @package   Succotash
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014-2022. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/inheritance
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-post-thumbnail">
		<?php the_post_thumbnail( 'creativity-large' ); ?>
	</div>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Backdrop\Theme\Entry\display_date(); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( [
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'creativity' ),
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'creativity' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">,</span> ',
		] );
		?>
	</div>
</article>
