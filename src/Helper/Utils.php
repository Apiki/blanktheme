<?php

namespace Blanktheme\Helper;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\API\Helper;

class Utils extends Helper\Utils
{
	public static function pagination( $obj_query = null, $args = array() )
	{
		global $wp_query;

		if ( is_null( $obj_query ) ) {
			$obj_query = $wp_query;
		}

		$total_pages  = $obj_query->max_num_pages;
		$current_page = get_query_var( 'paged' );
		$big          = 999999999;

		if ( 1 === $total_pages ) {
			return;
		}

		$defaults = array(
			// need an unlikely integer cause the url can contains a number
			'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, $current_page ),
			'total'     => $total_pages,
			'prev_next' => true,
			'end_size'  => 1,
			'mid_size'  => 2,
			'type'      => 'list',
		);

		echo paginate_links( wp_parse_args( $args, $defaults ) );
	}
}
