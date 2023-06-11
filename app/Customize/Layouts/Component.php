<?php
/**
 * Home Customization
 *
 * @package   creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2014-2022. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes.com
 */

namespace Creativity\Customize\Layouts;
use Backdrop\Customize\Component as Customize;
use WP_Customize_Manager;

use Backdrop\Customize\Controls\RadioImage;

use function Backdrop\Mix\asset;

class Component implements Customize {

	public function boot() {
		add_action( 'customize_register', [ $this, 'panels' ] );
		add_action( 'customize_register', [ $this, 'sections' ] );
		add_action( 'customize_register', [ $this, 'settings' ] );
		add_action( 'customize_register', [ $this, 'controls' ] );
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	public function enqueue() {
		wp_enqueue_script( 'creativity-customize-controls', asset( 'assets/js/customize-controls.js' ), [ 'jquery' ], null, true );
		wp_enqueue_style(  'creativity-customize-controls', asset( 'assets/css/customize-controls.css' ), null, null );
	}

	public function panels( WP_Customize_Manager $manager ) {

		$manager->add_panel( 'theme_options', [
			'title'    => esc_html__( 'Theme Options', 'creativity' ),
			'priority' => 10,
		] );
	}

	public function sections( WP_Customize_Manager $manager ) {
		$common_section_args = [
			'panel'    => 'theme_options',
			'priority' => 5,
		];

		$manager->add_section( 'global_layout', array_merge( $common_section_args, [
			'title' => esc_html__( 'Global Layout', 'creativity' ),
		] ) );

		$manager->add_section( 'portfolio_layout', array_merge( $common_section_args, [
			'title' => esc_html__( 'Portfolio Layout', 'creativity' ),
		] ) );

		$manager->add_section( 'custom_layout', array_merge( $common_section_args, [
			'title' => esc_html__( 'Custom Layout', 'creativity' ),
		] ) );
	}

	public function settings( WP_Customize_Manager $manager ) {

		$layout_settings = [
			'default'           => 'left-sidebar',
			'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::layouts',
		];

		$manager->add_setting( 'global_layout',		$layout_settings );
		$manager->add_setting( 'portfolio_layout',	$layout_settings );
		$manager->add_setting( 'custom_layout',		$layout_settings );
	}

	public function controls( WP_Customize_Manager $manager ) {

		$args = [
			'type'        => 'radio-image',
			'choices'     => [
				'left-sidebar'  => get_theme_file_uri( '/public/images/2cl.png' ),
				'right-sidebar' => get_theme_file_uri( '/public/images/2cr.png' )
			]
		];

		$manager->add_control( new RadioImage( $manager, 'global_layout', array_merge( $args, [
			'description' => esc_html__( 'General Layout applies to all layouts that supports in this theme.', 'creativity' ),
			'section'  => 'global_layout',
			'settings' => 'global_layout',
		] ) ) );

		$manager->add_control( new RadioImage( $manager, 'portfolio_layout', array_merge( $args, [
			'description' => esc_html__( 'Portfolio Layout applies to Backdrop Custom Portfolio that supports in this theme.', 'creativity' ),
			'section'  => 'portfolio_layout',
			'settings' => 'portfolio_layout',
		] ) ) );

		$manager->add_control( new RadioImage( $manager, 'custom_layout', array_merge( $args, [
			'description' => esc_html__( 'Custom Layout applies to Custom Templates that supports in this theme.', 'creativity' ),
			'section'  => 'custom_layout',
			'settings' => 'custom_layout',
		] ) ) );
	}
}
