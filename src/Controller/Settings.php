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
		add_filter( Core::SLUG . '_settings_general', array( &$this, 'get_general_tab' ) );
	}

	public function register_settings()
	{
		$theme_options = Container::make( 'theme_options', esc_html__( 'Theme Options', Core::SLUG ) )
			->set_page_parent( 'themes.php' )
			->add_tab(
				esc_html__( 'General', Core::SLUG ),
				apply_filters( Core::SLUG . '_settings_general', array() )
			);

		do_action( 'like_app_settings', $theme_options );
	}

	public function get_general_tab( $fields )
	{
		return array_merge(
			$fields,
			array(
				Field::make( 'header_scripts', 'header_scripts', esc_html__( 'Header scripts', Core::SLUG ) ),
				Field::make( 'textarea', 'body_scripts', esc_html__( 'Body scripts', Core::SLUG ) )
					->help_text( esc_html__( 'If you need to add scripts to your body, you should enter them here.', Core::SLUG ) ),
				Field::make( 'footer_scripts', 'footer_scripts', esc_html__( 'Footer scripts', Core::SLUG ) ),
			)
		);
	}
}
