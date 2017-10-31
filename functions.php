<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require( __DIR__ . '/vendor/autoload.php' );
}

add_action( 'tgmpa_register', 'blanktheme_register_required_plugins' );

function blanktheme_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'GB Plugin API',
			'slug'               => 'gb-plugin-api',
			'source'             => 'https://github.com/Apiki/gb-plugin-api/archive/master.zip',
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

new Blanktheme\Core();
