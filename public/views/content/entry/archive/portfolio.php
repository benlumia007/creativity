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
	<div class="entry-content">
		<ul class="portfolio-items">
			<?php while (have_posts()) : the_post(); ?>
				<li class="portfolio-item">
					<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('camaraderie-large-thumbnails'); ?></a>
					<div class="wp-caption">
						<h2 class="wp-caption-text"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
						<span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); // phpcs:ignore ?></span>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
</article>
