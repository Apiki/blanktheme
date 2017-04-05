<?php

namespace GB\Theme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

class Supports
{
	public function __construct()
	{
		add_action( 'after_setup_theme', array( &$this, 'add_theme_supports' ) );
	}

	public function add_theme_supports()
	{
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
