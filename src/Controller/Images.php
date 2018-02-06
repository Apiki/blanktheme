<?php

namespace Blanktheme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Blanktheme\Model\Image;
use Blanktheme\Core;

class Images
{
	public function __construct()
	{
		add_action( 'after_setup_theme', array( &$this, 'add_image_sizes' ) );
		add_filter( 'image_size_names_choose', array( &$this, 'add_names' ) );
	}

	public function add_image_sizes()
	{
		add_image_size( Image::SIZE_255_255, 255, 255, true );
		add_image_size( Image::SIZE_165_165, 165, 165, true );
	}

	public function add_names( $sizes )
	{
		return array_merge(
			$sizes,
			array(
				Image::SIZE_255_255  => esc_html__( 'Card medium', 'blanktheme' ),
				Image::SIZE_165_165  => esc_html__( 'Card large', 'blanktheme' ),
			)
		);
	}
}
