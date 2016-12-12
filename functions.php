<?php

namespace Apiki\Theme;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

class App
{
	const SLUG = 'blanktheme';

	public static function uses( $location, $class_name = 'index' )
	{
		$locations = array(
			'Controller',
			'View',
			'Helper',
			'Widget',
			'Vendor',
		);

		$extension = 'php';

		if ( in_array( $location, $locations, true ) ) {
			$extension = strtolower( $location ) . '.php';
		}

		include "includes/{$location}/{$class_name}.{$extension}";
	}
}

App::uses( 'core', 'config' );

$core = new Core();
