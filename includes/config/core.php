<?php

namespace Apiki\Theme;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

App::uses( 'autoload', 'vendor' );
App::uses( 'loader', 'config' );
App::uses( 'utils', 'helper' );

App::uses( 'menus', 'Controller' );
App::uses( 'images', 'Controller' );
App::uses( 'supports', 'Controller' );
App::uses( 'sidebars', 'Controller' );

class Core extends Loader
{
	public function initialize()
	{
		$this->load_controllers(
			array(
				'Menus',
				'Images',
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
		$this->create_template_pages();
	}

	public function enqueue_scripts()
	{
		wp_enqueue_script(
			App::SLUG . '-theme-script',
			get_theme_file_uri( 'assets/javascripts/built.js' ),
			array( 'jquery' ),
			filemtime( get_theme_file_path( 'assets/javascripts/built.js' ) ),
			true
		);

		wp_localize_script(
			App::SLUG . '-theme-script',
			'SiteGlobalVars',
			$this->get_global_vars()
		);
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