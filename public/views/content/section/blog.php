<?php
/**
 * Camaraderie ( home-portfolio.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<section id="portfolio" class="section-blog">
	<div class="content-area">
		<header class="blog-header">
			<h1 class="blog-title"><?php esc_html_e( 'Blog', 'creativity' ); ?></h1>
			<span class="blog-description"><?php esc_html_e( 'Latest News', 'creativity' ); ?></span>
		</header>
		<div class="blog-content">
			<ul class="blog-items">
				<?php
				$posts_per_page = get_theme_mod( 'custom_portfolio_items', 9 );
				$query          = new WP_Query( array(
					'post_type'      => 'post',
					'posts_per_page' => 2,
				) );

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						if ( has_post_thumbnail() ) {
							?>
							<li class="blog-item">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php the_post_thumbnail( 'creativity-large' ); ?>
								</a>
								<header class="entry-header">
									<?php Backdrop\Theme\Entry\display_title(); ?>
									<span class="entry-metadata"><?php Backdrop\Theme\Entry\display_date(); ?></span>
								</header>
								<div class="entry-excerpt">
									<?php the_excerpt(); ?>
								</div>
							</li>
							<?php
						}
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</ul>
		</div>
	</div>
</section>
