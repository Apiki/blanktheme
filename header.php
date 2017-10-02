<?php

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use Blanktheme\Core;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'theme_color' ) ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_site_icon(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

