<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Helper\Utils;
use GB\Theme\Model\Menu;
use GB\Theme\Core;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="theme-color" content="<?php echo esc_attr( carbon_get_theme_option( 'theme_color' ) ); ?>">
		<?php wp_site_icon(); ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header class="header">
			<a href="<?php echo esc_url( Utils::get_site_url() ); ?>" class="branding" title="<?php echo esc_attr( Utils::get_site_name() ); ?>">
				<img src="<?php echo esc_url( Utils::get_template_url() ); ?>/assets/images/branding.png" alt="<?php echo esc_attr( Utils::get_site_name() ); ?>">
			</a>

			<div class="box-search">
				<?php get_search_form(); ?>
			</div>

			<?php
				wp_nav_menu(
					array(
						'theme_location' => Menu::HEADER,
						'container'      => '',
						'menu_class'     => 'menu',
						'fallback_cb'    => '',
					)
				);
			?>
		</header>
