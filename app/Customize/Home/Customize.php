<?php

namespace Creativity\Customize\Home;
use Creativity\Customize\Customizable;
use WP_Customize_Manager;
use Creativity\Tools\Collection;
use Creativity\Tools\Mod;
use Creativity\Template\Footer;
use Backdrop\Customize\Controls\RadioImage;

class Customize extends Customizable {

	/**
	 * Registers customizer panels.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {
        $manager->add_panel( 'home_panel', [
			'title'    => esc_html__( 'Home Section', 'creativity' ),
			'priority' => 5,
		] ); 
    }

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
        
		$manager->add_section( 'header_section', array(
			'title'    => esc_html__( 'Header Section', 'creativity' ),
			'panel'    => 'home_panel',
			'priority' => 5,
		) );

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

	/**
	 * Registers customizer settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

		$manager->add_setting( 'custom_image', array(
			'default'	        => get_theme_file_uri( '/public/images/header-image.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$manager->add_setting( 'custom_avatar', array(
			'default'           => get_theme_file_uri( '/public/images/avatar.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$displays = [
			'home_display' => [
				'default' 			=> false,
				'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
			],
			'portfolio_display' => [
				'default'   		=> false,
				'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
			],
			'blog_display' => [
				'default'           => false,
				'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
			]
		];

		foreach ( $displays as $item => $args ) {
			$manager->add_setting( $item, $args );
		}

		$manager->add_setting( 'custom_home_title', array(
			'default' => esc_html__( 'Our Mission Goes Here', 'creativity' ),
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$manager->add_setting( 'custom_home_description', array(
			'default' => esc_html__( 'Your description goes here!', 'creativity' ),
			'sanitize_callback' => 'sanitize_textarea_field'
		) );

		$manager->add_setting( 'custom_portfolio_title', array(
			'default' => esc_html__( 'Portfolio', 'creativity' ),
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$manager->add_setting( 'custom_portfolio_description', array(
			'default' => esc_html__( 'Some of my recent works!', 'creativity' ),
			'sanitize_callback' => 'sanitize_text_field'
		) );
	}

	/**
	 * Registers customizer controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

		$displays = [
			'home_display' => [
				'label' => esc_html__( 'Enable Header', 'creativity' ),
				'type' => 'checkbox',
				'section' => 'header_section',
				'settings' => 'home_display',
			],
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

		$manager->add_control('custom_home_title', array(
			'label' => esc_html__('Title', 'creativity'),
			'section' => 'header_section',
			'priority' => 10,
			'settings' => 'custom_home_title',
		));

		$manager->add_control('custom_home_description', array(
			'label' => esc_html__('Description', 'creativity'),
			'section' => 'header_section',
			'type' => 'textarea',
			'priority' => 10,
			'settings' => 'custom_home_description',
		));

		$manager->add_control('custom_portfolio_title', array(
			'label' => esc_html__('Title', 'creativity'),
			'section' => 'custom_portfolio',
			'priority' => 10,
			'settings' => 'custom_portfolio_title',
		));

		$manager->add_control('custom_portfolio_description', array(
			'label' => esc_html__('Description', 'creativity'),
			'section' => 'custom_portfolio',
			'priority' => 10,
			'settings' => 'custom_portfolio_description',
		));
	}

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

	}
}