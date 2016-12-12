<?php
namespace Apiki\Theme;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

App::uses( 'image', 'Model' );

class Images_Controller
{
	public function __construct()
	{
		add_action( 'after_setup_theme', array( &$this, 'add_image_sizes' ) );
	}

	public function add_image_sizes()
	{
		add_image_size( Image::SIZE_255_255, 255, 255, true );
		add_image_size( Image::SIZE_165_165, 165, 165, true );
	}
}