<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

include __DIR__ . '/vendor/autoload.php';

add_action( 'tgmpa_register', 'gb_theme_register_required_plugins' );

function gb_theme_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'GB Plugin API',
			'slug'               => 'gb-plugin-api',
			'source'             => plugins_url(),
			'required'           => true,
			'version'            => '0.0.1',
			'force_activation'   => false,
			'force_deactivation' => false,
		),
	);

	tgmpa( $plugins );
}

if ( ! class_exists( 'GB\API\Core' ) ) {
	return;
}

new GB\Theme\Core();
