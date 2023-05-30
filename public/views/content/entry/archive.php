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
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<?php the_post_thumbnail( 'creativity-large' ); ?>
		</picture>
	<?php } ?>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Backdrop\Theme\Entry\display_date(); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>
