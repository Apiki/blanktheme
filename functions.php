<?php

namespace Apiki\Theme;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

class App
{
	const SLUG = 'gb-blank-theme';

	public static function uses( $location, $class_name = 'index' )
	{
		include "includes/{$location}/{$class_name}.php";
	}
}

App::uses( 'Config', 'core' );

$core = new Core();
