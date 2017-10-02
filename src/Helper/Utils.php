<?php

namespace Blanktheme\Helper;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\API\Helper;

class Utils extends Helper\Utils
{
	/**
	 * Template URL
	 *
	 * @var string
	 */
	private static $template_url;

	/**
	 * Template Directory Path
	 *
	 * @var string
	 */
	private static $template_directory;

	/**
	 * Site URL this project
	 *
	 * @var string
	 */
	private static $site_url;

	/**
	 * Site Name this project
	 *
	 * @var string
	 */
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

	public static function get_social_share()
	{
		return array(
			array(
				'url'   => self::get_social_link( 'facebook' ),
				'class' => 'facebook',
				'icon'  => 'icon-g-facebook',
				'title' => esc_attr__( 'Share on Facebook', 'blanktheme' ),
			),
			array(
				'url'   => self::get_social_link( 'linkedin' ),
				'class' => 'linkedin',
				'icon'  => 'icon-g-linkedin',
				'title' => esc_attr__( 'Share on Linkedin', 'blanktheme' ),
				'size'  => array( 550, 497 ),
			),
			array(
				'url'   => self::get_social_link( 'google_plus' ),
				'class' => 'google-plus',
				'icon'  => 'icon-g-google-plus',
				'title' => esc_attr__( 'Share on Google +', 'blanktheme' ),
				'size'  => array( 400, 455 ),
			),
			array(
				'url'   => self::get_social_link( 'whatsapp' ),
				'class' => 'whatsapp',
				'icon'  => 'icon-g-whatsapp',
				'title' => esc_attr__( 'Share on WhatsApp', 'blanktheme' ),
			),
			array(
				'url'   => self::get_social_link( 'twitter' ),
				'class' => 'twitter',
				'icon'  => 'icon-g-twitter',
				'title' => esc_attr__( 'Share on Twitter', 'blanktheme' ),
				'size'  => array( 400, 240 ),
			),
			array(
				'url'   => self::get_social_link( 'pinterest' ),
				'class' => 'pinterest',
				'icon'  => 'icon-g-pinterest',
				'title' => esc_attr__( 'Share on Pinterest', 'blanktheme' ),
				'size'  => array( 765, 639 ),
			),
		);
	}

	public static function get_social_link( $method, $post_id = false )
	{
		if ( $post_id ) {
			$post = get_post( $post_id );
			setup_postdata( $post );
		}

		$title           = get_the_title();
		$url             = get_the_permalink();
		$media           = get_the_post_thumbnail_url( null, 'full' );
		$title_encoded   = rawurlencode( $title );
		$url_encoded     = rawurlencode( $url );
		$media_encoded   = rawurlencode( $media );
		$twitter_status  = rawurlencode( sprintf( '%s %s', $title, $url ) );
		/* translators: %s: post permalink */
		$whatsapp_status = rawurlencode( sprintf( __( 'I thought you’d like this article %s', 'blanktheme' ), $url ) );
		/* translators: %s: post permalink */
		$email_body      = rawurlencode( sprintf( __( 'Read more: %s', 'blanktheme' ), $url ) );

		$methods = array(
			'pinterest'   => "https://pinterest.com/pin/create/link/?url={$url_encoded}&media={$media_encoded}&description={$title_encoded}",
			'facebook'    => "https://www.facebook.com/sharer/sharer.php?u={$url_encoded}",
			'email'       => "mailto:?subject={$title_encoded}&body={$email_body}",
			'google_plus' => "https://plus.google.com/share?url={$url_encoded}",
			'twitter'     => "https://twitter.com/home?status={$twitter_status}",
			'whatsapp'    => "whatsapp://send?text={$whatsapp_status}",
			'reddit'      => "https://www.reddit.com/submit?url={$url_encoded}&title={$title_encoded}",
			'linkedin'    => "https://www.linkedin.com/shareArticle?mini=true&url={$url_encoded}&title={$title_encoded}&summary=&source=",
		);

		wp_reset_postdata();

		return $methods[ $method ];
	}
}
