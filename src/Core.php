<?php

namespace Blanktheme;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

class Core extends Loader
{
	const SLUG = 'blanktheme';

	public function initialize()
	{
		add_action( $this::SLUG . '_start_body', array( &$this, 'enqueue_body_scripts' ) );

		$this->load_controllers(
			array(
				'Customizer',
				'Images',
				'Menus',
				'Settings',
				'Sidebars',
				'Supports',
			)
		);
	}

	public function after_setup_theme()
	{
		$this->define_content_width( 768 );
	}

	public function install()
	{
		$this->load_controllers( array(), true );

		$this->create_template_pages();
	}

	public function enqueue_scripts()
	{
		/* style.css */
		wp_enqueue_style(
			self::SLUG . '-theme-style',
			get_theme_file_uri( 'style.css' ),
			array(),
			filemtime( get_theme_file_path( 'style.css' ) )
		);

		/* built.js */
		wp_enqueue_script(
			self::SLUG . '-theme-script',
			get_theme_file_uri( 'built.js' ),
			array( 'jquery' ),
			filemtime( get_theme_file_path( 'built.js' ) ),
			true
		);

		wp_localize_script(
			self::SLUG . '-theme-script',
			'SiteGlobalVars',
			$this->get_global_vars()
		);

		/* html5shiv.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-html5',
			get_theme_file_uri( 'assets/support/html5shiv.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/support/html5shiv.min.js' ) )
		);

		wp_script_add_data( self::SLUG . '-support-html5', 'conditional', 'lt IE 9' );

		/* augment.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-augment',
			get_theme_file_uri( 'assets/support/augment.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/support/augment.min.js' ) )
		);

		wp_script_add_data( self::SLUG . '-support-augment', 'conditional', 'lt IE 9' );

		/* selectivizr.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-selectivizr',
			get_theme_file_uri( 'assets/support/selectivizr.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/support/selectivizr.min.js' ) )
		);

		wp_script_add_data( self::SLUG . '-support-selectivizr', 'conditional', 'lt IE 9' );
	}

	public function get_required_plugins()
	{
		return array(
			array(
				'name'               => 'WP Awesome Login',
				'slug'               => 'wp-awesome-login',
				'source'             => '',
				'required'           => false,
				'version'            => '0.2.0',
				'force_activation'   => false,
				'force_deactivation' => false,
			),
		);
	}

	public function get_global_vars()
	{
		return array(
			'urlAjax' => admin_url( 'admin-ajax.php' ),
		);
	}

	public function enqueue_body_scripts()
	{
		echo carbon_get_theme_option( 'body_scripts' );
	}
}
