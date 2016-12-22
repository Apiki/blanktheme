<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="theme-color" content="<?php esc_attr( carbon_get_theme_option( 'theme_color' ) ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title(); ?></title>
	<?php wp_site_icon(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header id="header">
		<div class="container">
			<div>

			</div>

			<div>
				<div class="branding">
					<a href="#" title="branding">ghost</a>
				</div>
			</div>

			<div>

			</div>
		</div>
	</header>
