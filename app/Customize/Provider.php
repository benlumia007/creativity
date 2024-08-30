<?php
/**
 * Backdrop Core ( src/Tools/ServiceProvider.php )
 *
 * @package   Backdrop Core
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

/**
 * Define namespace
 */
namespace Creativity\Customize;

use Backdrop\Core\ServiceProvider;

use Creativity\Customize\Footer;
use Creativity\Customize\Layout;

use function Backdrop\Theme\is_plugin_or_class_active;

class Provider extends ServiceProvider {

    /**
     * Registration callback that adds a single instance of the customize
     * object to the container.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function register(): void {

        $this->app->singleton( Component::class, function() {

            $components = [
                Footer\Customize::class,
                Layout\Customize::class
            ];

            if ( is_plugin_or_class_active( 'backdrop-custom-portfolio/backdrop-custom-portfolio.php' ) ) {
                $components[] = Home\Customize::class;
            }

            return new Component( $components );
		} );
    }

    /**
     * Boots the customize component by firing its hooks in the `boot()` method.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot(): void {

        $this->app->resolve( Component::class )->boot();
    }
}