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
namespace Creativity\Customize\Layouts;

use Backdrop\Core\ServiceProvider;
use ReflectionException;

class Provider extends ServiceProvider {

	/**
	 * Binds the implementation of the attributes contract to the container.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->app->singleton( 'creativity/customize/layouts', Component::class );
	}

	/**
	 * Binds the implementation of the attributes contract to the container.
	 *
	 * @since  2.0.0
	 * @access public
	 * @throws ReflectionException
	 * @return void
	 */
	public function boot() {

		$this->app->resolve( 'creativity/customize/layouts' )->boot();
	}
}
