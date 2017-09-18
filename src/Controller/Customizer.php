<?php

namespace GB\Theme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Kirki;
use GB\Theme\Core;
use GB\Theme\Helper\Utils;

class Customizer
{
	public function __construct()
	{
		add_action( 'customize_controls_print_styles', array( &$this, 'change_preview_width' ) );
		add_action( 'init', array( &$this, 'kirki_init' ) );
	}

	public function change_preview_width()
	{
		?>
		<style>
			.wp-customizer .preview-mobile .wp-full-overlay-main {
				margin-left: -189.5px;
				width: 379px;
				height: 720px;
			}

			.wp-customizer .preview-tablet .wp-full-overlay-main {
				margin-left: -384px;
				width: 768px;
				height: 720px;
			}
		</style>
	<?php
	}

	public function kirki_init()
	{
		Kirki::add_config(
			Core::SLUG,
			array(
				'capability'  => 'edit_theme_options',
				'option_type' => 'theme_mod',
			)
		);

		Kirki::add_field(
			Core::SLUG,
			array(
				'type'        => 'image',
				'settings'    => 'logo',
				'label'       => __( 'Logo', 'gb-theme' ),
				'section'     => 'title_tagline',
				'description' => __( 'The logo image of the site will be used in the header and footer. Suggested size <strong>90</strong> pixels in height by <strong>30</strong> pixels in width.', 'gb-theme' ),
			)
		);

		$this->handle_colors();
	}

	public function handle_colors()
	{
		Kirki::add_field(
			Core::SLUG,
			array(
				'type'     => 'color',
				'settings' => 'theme_color',
				'label'    => __( 'Android Chrome theme color', 'gb-theme' ),
				'section'  => 'colors',
			)
		);
	}
}
