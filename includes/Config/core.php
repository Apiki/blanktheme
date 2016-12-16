<?php

namespace Apiki\Theme;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

App::uses( 'vendor', 'autoload' );
App::uses( 'Config', 'loader' );
App::uses( 'Helper', 'utils' );
App::uses( 'Controller', 'menus' );
App::uses( 'Controller', 'images' );
App::uses( 'Controller', 'supports' );
App::uses( 'Controller', 'sidebars' );

class Core extends Loader
{
	public function initialize()
	{
		$this->load_controllers(
			array(
				'Menus',
				'Images',
				'Supports',
				'Sidebars',
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
		return array();
	}

	public function get_global_vars()
	{
		return array(
			'urlAjax' => admin_url( 'admin-ajax.php' ),
		);
	}
}
