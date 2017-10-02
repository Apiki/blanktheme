<?php

namespace Blanktheme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Blanktheme\Core;

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
		$theme_options = Container::make( 'theme_options', esc_html__( 'Theme Options', 'blanktheme' ) )
			->set_page_parent( 'themes.php' )
			->add_tab(
				esc_html__( 'General', 'blanktheme' ),
				apply_filters( Core::SLUG . '_settings_general', array() )
			);

		do_action( Core::SLUG . '_settings', $theme_options );
	}

	public function get_general_tab( $fields )
	{
		return array_merge(
			$fields,
			array(
				Field::make( 'header_scripts', 'header_scripts', esc_html__( 'Header scripts', 'blanktheme' ) ),
				Field::make( 'textarea', 'body_scripts', esc_html__( 'Body scripts', 'blanktheme' ) )
					->help_text( esc_html__( 'If you need to add scripts to your body, you should enter them here.', 'blanktheme' ) ),
				Field::make( 'footer_scripts', 'footer_scripts', esc_html__( 'Footer scripts', 'blanktheme' ) ),
			)
		);
	}
}
