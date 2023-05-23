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
<article id="post-0" class="page">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Not Found', 'creativity' ); ?></h1>
	</header>
	<div class="entry-content">
		<p><?php esc_html_e( 'It looks like you stumbled upon a page that does not exist. Perhaps rolling the dice with a search might help.', 'creativity' ) ?></p>

		<?php get_search_form() ?>
	</div>
</article>
