<?php

namespace GB\Theme;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

class Core extends Loader
{
	const SLUG = 'gb-theme';

	public function initialize()
	{
		$this->load_controllers(
			array(
				'Menus',
				'Images',
				'Supports',
				'Sidebars',
				'Settings',
			)
		);
	}

	public function after_setup_theme()
	{
		$this->define_content_width( 768 );
	}

	public function install()
	{
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
			get_theme_file_uri( 'assets/javascripts/built.js' ),
			array( 'jquery' ),
			filemtime( get_theme_file_path( 'assets/javascripts/built.js' ) ),
			true
		);

		wp_localize_script(
			self::SLUG . '-theme-script',
			'SiteGlobalVars',
			$this->get_global_vars()
		);

		/* html5.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-html5',
			get_theme_file_uri( 'assets/javascripts/support/html5.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/javascripts/support/html5.min.js' ) )
		);

		wp_script_add_data( self::SLUG . '-support-html5', 'conditional', 'lt IE 9' );

		/* augment.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-augment',
			get_theme_file_uri( 'assets/javascripts/support/augment.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/javascripts/support/augment.min.js' ) )
		);

		wp_script_add_data( self::SLUG . '-support-augment', 'conditional', 'lt IE 9' );

		/* selectivizr.min.js */
		wp_enqueue_script(
			self::SLUG . '-support-selectivizr',
			get_theme_file_uri( 'assets/javascripts/support/selectivizr.min.js' ),
			array(),
			filemtime( get_theme_file_path( 'assets/javascripts/support/selectivizr.min.js' ) )
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
}
