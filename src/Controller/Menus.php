<?php

namespace Blanktheme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Blanktheme\Model\Menu;
use Blanktheme\Core;

class Menus
{
	public function __construct()
	{
		add_action( 'after_setup_theme', array( &$this, 'register_menus' ) );
	}

	public function register_menus()
	{
		register_nav_menu( Menu::HEADER, __( 'Menu Header', 'blanktheme' ) );
	}
}
