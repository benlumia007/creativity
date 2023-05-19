<?php
/**
 * Default index template
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

// Loads header/*.php templates
Backdrop\Template\View\display( 'header', Backdrop\Template\Hierarchy\hierarchy() );

// Loads content/*.php templates
Backdrop\Template\View\display( 'content', Backdrop\Template\Hierarchy\hierarchy() );

// Loads footer/*.php templates
Backdrop\Template\View\display( 'footer', Backdrop\Template\Hierarchy\hierarchy() );
