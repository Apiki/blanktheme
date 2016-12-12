<?php

namespace Apiki\Theme;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\API;

class Utils extends API\Utils
{
	private static $template_url;
	private static $template_directory;
	private static $site_url;
	private static $site_name;

	public static function get_template_url()
	{
		if ( ! isset( self::$template_url ) ) {
			self::$template_url = get_stylesheet_directory_uri();
		}

		return self::$template_url;
	}

	public static function get_template_directory()
	{
		if ( ! isset( self::$template_directory ) ) {
			self::$template_directory = get_stylesheet_directory();
		}

		return self::$template_directory;
	}

	public static function get_site_url()
	{
		if ( ! isset( self::$site_url ) ) {
			self::$site_url = get_site_url();
		}

		return self::$site_url;
	}

	public static function get_site_name()
	{
		if ( ! isset( self::$site_name ) ) {
			self::$site_name = get_bloginfo();
		}

		return self::$site_name;
	}

	public static function the_stylesheet_uri()
	{
		echo get_stylesheet_uri() . '?v=' . filemtime( self::get_template_directory() . '/style.css' );
	}

	public static function pagination( $obj_query = null, $args = array() )
	{
		global $wp_query;

		if ( is_null( $obj_query ) ) {
			$obj_query = $wp_query;
		}

		$total_pages  = $obj_query->max_num_pages;
		$current_page = get_query_var( 'paged' );
		$big          = 999999999;

		if ( $total_pages == 1 ) {
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
