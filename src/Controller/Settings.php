<?php

namespace GB\Theme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Core;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Settings
{
	public function __construct()
	{
		add_action( 'carbon_register_fields', array( &$this, 'register_settings' ) );
		add_filter( Core::SLUG . 'settings_general', array( &$this, 'get_general_tab' ) );
		add_filter( Core::SLUG . 'settings_home_page', array( &$this, 'get_home_page_tab' ) );
	}

	public function register_settings()
	{
		Container::make( 'theme_options', __( 'Theme Options', Core::SLUG ) )
			->set_page_parent( 'themes.php' )
			->add_tab(
				__( 'General', Core::SLUG ),
				apply_filters( Core::SLUG . 'settings_general', array() )
			)
			->add_tab(
				__( 'Home page', Core::SLUG ),
				apply_filters( Core::SLUG . 'settings_home_page', array() )
			);
	}

	public function get_general_tab( $fields )
	{
		return array_merge(
			$fields,
			array(
				Field::make( 'image', Core::SLUG . '_logo', __( 'Logo', Core::SLUG ) ),
				Field::make( 'text', Core::SLUG . '_copyright', __( 'Copyright', Core::SLUG ) ),
				Field::make( 'header_scripts', Core::SLUG . '_header_scripts', __( 'Header scripts', Core::SLUG ) ),
				Field::make( 'footer_scripts', Core::SLUG . '_footer_scripts', __( 'Footer scripts', Core::SLUG ) ),
			)
		);
	}

	public function get_home_page_tab( $fields )
	{
		return $fields;
	}
}
