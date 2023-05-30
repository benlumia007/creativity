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

namespace Creativity\Customize\Home;
use Backdrop\Customize\Component as Customize;
use WP_Customize_Manager;

class Component implements Customize {

	public function boot() {
		add_action( 'customize_register', [ $this, 'panels' ] );
		add_action( 'customize_register', [ $this, 'sections' ] );
		add_action( 'customize_register', [ $this, 'settings' ] );
		add_action( 'customize_register', [ $this, 'controls' ] );
	}

	public function panels( WP_Customize_Manager $manager ) {

		$manager->add_panel( 'home_panel', [
			'title'    => esc_html__( 'Home Section', 'creativity' ),
			'priority' => 15,
		] );
	}

	public function sections( WP_Customize_Manager $manager ) {

		$manager->add_section( 'custom_portfolio', array(
			'title' => esc_html__( 'Portfolio Section', 'creativity' ),
			'panel' => 'home_panel',
			'priority' => 10
		) );

		$manager->add_section( 'custom_blog', array(
			'title' => esc_html__( 'Blog Section', 'creativity' ),
			'panel' => 'home_panel',
			'priority' => 15
		) );
	}

	public function settings( WP_Customize_Manager $manager ) {

		$manager->add_setting( 'custom_image', array(
			'default'	        => get_theme_file_uri( '/public/images/header-image.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$manager->add_setting( 'custom_avatar', array(
			'default'           => get_theme_file_uri( '/public/images/avatar.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$displays = [
			'portfolio_display' => [
				'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
			],
			'blog_display' => [
				'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
			]
		];

		foreach ( $displays as $item => $args ) {
			$manager->add_setting( $item, $args );
		}

	}

	public function controls( WP_Customize_Manager $manager ) {
		$displays = [
			'portfolio_display' => [
				'label' => esc_html__( 'Enable Portfolio', 'creativity' ),
				'type' => 'checkbox',
				'section' => 'custom_portfolio',
				'settings' => 'portfolio_display',
			],
			'blog_display' => [
				'label' => esc_html__( 'Enable Blog', 'creativity' ),
				'type' => 'checkbox',
				'section' => 'custom_blog',
				'settings' => 'blog_display',
			]
		];

		foreach ( $displays as $display => $args ) {
			$manager->add_control( $display, $args );
		}
	}
}
