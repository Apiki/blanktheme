<?php

namespace GB\Theme\Controller;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Model\Sidebar;

class Sidebars
{
	public function __construct()
	{
		add_action( 'widgets_init', array( &$this, 'register_sidebars' ) );
	}

	public function register_sidebars()
	{
		$available_sidebars = array(
			array(
				'name'          => 'Sidebar página inicial',
				'id'            => Sidebar::HOME,
				'description'   => 'Arraste aqui os widgets que deseja exibir na página inicial do site.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
		);

		array_map( 'register_sidebar', $available_sidebars );
	}
}
