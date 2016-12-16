<?php
// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Apiki\Theme\Utils;
use Apiki\Theme\Menu;
?>

<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?php Utils::the_stylesheet_uri(); ?>">
		<link rel="shortcut icon" href="<?php echo esc_url( Utils::get_template_url() ); ?>/assets/images/favicon.ico" type="image/x-icon" />
		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( Utils::get_template_url() ); ?>/assets/javascripts/support/html5.min.js"></script>
			<script src="<?php echo esc_url( Utils::get_template_url() ); ?>/assets/javascripts/support/augment.min.js"></script>
			<script src="<?php echo esc_url( Utils::get_template_url() ); ?>/assets/javascripts/support/selectivizr.min.js"></script>
		<![endif]-->
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
