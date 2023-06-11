<?php
/**
 * Boot the Framework
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

use function Backdrop\Theme\is_plugin_active;

/** ------------------------------------------------------------------------------------------
 * Create a new application.
 * -------------------------------------------------------------------------------------------
 *
 * This code creates the one true instance of the Backdrop Core Application, which can be access
 * via the `Backdrop\app()`function or the `Backdrop\App` static class after the application has
 * been booted.
 */

$creativity = Backdrop\booted() ? Backdrop\app() : new Backdrop\Core\Application();

/** ------------------------------------------------------------------------------------------
 * Register default service providers with the application.
 * -------------------------------------------------------------------------------------------
 *
 * Here are the default service providers that are essential for the theme to function before
 * booting the application. These service providers form the foundation for the theme.
 */

$creativity->provider( Backdrop\Fonts\Provider::class );
$creativity->provider( Backdrop\Mix\Manifest\Provider::class );
$creativity->provider( Backdrop\Template\Hierarchy\Provider::class );
$creativity->provider( Backdrop\Template\Manager\Provider::class );
$creativity->provider( Backdrop\Template\View\Provider::class );
$creativity->provider( Backdrop\Theme\Provider::class );

/** ------------------------------------------------------------------------------------------
 * Register additional service providers for the theme.
 * -------------------------------------------------------------------------------------------
 *
 * These are the additional providers that are crucial for the theme to operate before booting
 * the application. These service providers offer supplementary features to the theme.
 */

if ( function_exists( 'is_plugin_active' ) ) {
	if ( is_plugin_active( 'backdrop-custom-portfolio/backdrop-custom-portfolio.php' ) ) {
		$creativity->provider( Creativity\Customize\Home\Provider::class );
	}
}

$creativity->provider( Creativity\Customize\Layouts\Provider::class );

/** ------------------------------------------------------------------------------------------
 * Perform any actions.
 * -------------------------------------------------------------------------------------------
 *
 * This code creates an action hook that any child themes can utilize to integrate their own
 * bindings into the process before the app is booted. The action callback receives the
 * application instance as a parameter.
 */

do_action( 'creativity/bootstrap', $creativity );

/** ------------------------------------------------------------------------------------------
 * Boot the application.
 * -------------------------------------------------------------------------------------------
 *
 * The code invokes the `boot()` method of the application, which initiates the launch of the
 * application. Congratulations on a job well done!
 */

$creativity->boot();
