<?php
/**
 * Powered By Text Class.
 *
 * A simple class for randomly displaying a "powered by..." line of text in the
 * theme footer.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity\Tools;

/**
 * Powered by class.
 *
 * @since  1.0.0
 * @access public
 */
class PoweredBy {

	/**
	 * Returns an array of all the powered by quotes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function all() {

		return apply_filters( 'creativity/poweredby/collection', [
			esc_html__( 'Powered by heart and soul.', 'creativity' ),
			esc_html__( 'Powered by crazy ideas and passion.', 'creativity' ),
			esc_html__( 'Powered by the thing that holds all things together in the universe.', 'creativity' ),
			esc_html__( 'Powered by love.', 'creativity' ),
			esc_html__( 'Powered by the vast and endless void.', 'creativity' ),
			esc_html__( 'Powered by the code of a maniac.', 'creativity' ),
			esc_html__( 'Powered by peace and understanding.', 'creativity' ),
			esc_html__( 'Powered by coffee.', 'creativity' ),
			esc_html__( 'Powered by sleepness nights.', 'creativity' ),
			esc_html__( 'Powered by the love of all things.', 'creativity' ),
			esc_html__( 'Powered by something greater than myself.', 'creativity' ),
			esc_html__( 'Powered by whispers from the future.', 'creativity' ),
			esc_html__( 'Powered by the fusion of technology and dreams.', 'creativity' ),
			esc_html__( 'Powered by the strength found in kindness.', 'creativity' ),
			esc_html__( 'Powered by the melodies of the unseen world.', 'creativity' ),
			esc_html__( 'Powered by the courage of the unheard voices.', 'creativity' ),
			esc_html__( 'Powered by the beauty of the human spirit.', 'creativity' ),
			esc_html__( 'Powered by the quest for eternal wisdom.', 'creativity' ),
			esc_html__( 'Powered by the energy of uncharted galaxies.', 'creativity' ),
			esc_html__( 'Powered by the magic hidden in plain sight.', 'creativity' ),
			esc_html__( 'Powered by the legacy of the ancients.', 'creativity' ),
			esc_html__( 'Powered by the dance between light and darkness.', 'creativity' ),
			esc_html__( 'Powered by the touch of the morning sun.', 'creativity' ),
			esc_html__( 'Powered by the secrets of the deep ocean.', 'creativity' ),
			esc_html__( 'Powered by the echoes of laughter and joy.', 'creativity' ),
			esc_html__( 'Powered by the relentless pursuit of truth.', 'creativity' ),
		] );
	}

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public static function display() {

		echo esc_html( static::render() );
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public static function render() {

		$collection = static::all();

		return $collection[ array_rand( $collection, 1 ) ];
	}
}