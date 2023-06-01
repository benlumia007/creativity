<?php
/**
 * Default content/default template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */
?>
<section id="content" class="site-content">
	<main id="main" class="content-area">
		<?php if ( have_posts() ) : ?>
			<?php Backdrop\Template\View\display( 'content/entry/archive/portfolio' ); ?>
		<?php endif; ?>
	</main>
</section>
